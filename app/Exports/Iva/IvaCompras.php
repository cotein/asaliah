<?php

namespace App\Exports\Iva;

use App\Src\Models\Tax;
use App\Exports\ExcelBase;
use Maatwebsite\Excel\Sheet;
use App\Src\Models\PurchaseInvoice;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithProperties;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class IvaCompras extends ExcelBase implements FromQuery, 
    WithHeadings, 
    ShouldAutoSize, 
    WithProperties, 
    WithEvents, 
    WithStyles,
    WithMapping,
    WithDrawings,
    WithCustomStartCell
{
    use Exportable;

    protected $from;

    protected $to;

    protected $taxes;

    public function __construct($from, $to)
    {
        $this->from = $from;

        $this->to = $to;

        $headings = [
            '#',
            'PROVEEDOR',
            'FECHA',
            'COMPROBANTE',
            'NUMERO',
            'NETO',
            'IVA 21%',
            'IVA 10,5%',
            'IVA 27%',
        ];

        $this->taxes = Tax::where('active', true)->get();

        $headings = collect($headings);

        $this->taxes->map(function($t) use($headings) {
            $headings->push($t->name);
        });

        $headings->push('TOTAL');

        $this->headings = $headings->toArray();

        $this->lastColumnLetter = $this->parseNumberToColumn($headings->count());

    }

    public function startCell(): string
    {
        return $this->startCell;
    }

    public function headings(): array
    {
        return [
            $this->headings
        ];
    }

    public function properties(): array
    {
        return [
            'creator'        => 'Creador coto',
            'title'          => 'Iva Compras',
            //'description'    => 'Latest Invoices',
            //'subject'        => 'Invoices',
            //'keywords'       => 'invoices,export,spreadsheet',
            //'category'       => 'Invoices',
            //'manager'        => 'Patrick Brouwers',
            'company'        => 'auth()->user()->company->name',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $this->lastRowNumber = $sheet->getHighestRow();
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {

                $event->sheet
                    ->getPageSetup()
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

                /**
                 * SET VALUES
                 */
                /* $event->sheet->setCellValue('E23','=SUM(E9:E21)');
                $event->sheet->setCellValue('F23', $this->lastRowNumber);
                $event->sheet->setCellValue('F24', $this->lastColumnLetter); */
                
                /**
                 * SET STYLES
                 */

                $range_total = range('G', $this->lastColumnLetter);

                $firstRowNumber = 0;
                $lastRowNumber = 0;

                collect($range_total)->map(function($r, $index) use($event, $firstRowNumber, $lastRowNumber){
                    
                    $firstRowNumber = $this->firstRowNumber + 1;
                    $lastRowNumber = $this->lastRowNumber +2;

                    $event->sheet->setCellValue($r . (string)$lastRowNumber,'=SUM('.$r.(string)$firstRowNumber .':'.$r.(string)$this->lastRowNumber.')');
                    $event->sheet->getStyle($r . (string)$firstRowNumber . ':' . $r . (string)$this->lastRowNumber )->getNumberFormat()->setFormatCode(self::ARGENTINA_FORMAT_CURRENCY);
                    $event->sheet->getStyle($r . (string)$lastRowNumber . ':' . $r . (string)$lastRowNumber )->getNumberFormat()->setFormatCode(self::ARGENTINA_FORMAT_CURRENCY);
                    $event->sheet->setCellValue('F' .  (string)$lastRowNumber  ,'TOTALES');
                    $event->sheet->getStyle('F' . (string)$lastRowNumber )->getFont()->setBold(true);
                    $event->sheet->getStyle('F' . (string)$lastRowNumber )->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
                    $event->sheet->getStyle('F' . (string)$lastRowNumber )->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);     

                    $event->sheet->getStyle($r . (string)$lastRowNumber )->getFont()->setBold(true);
                    $event->sheet->getStyle($r . (string)$lastRowNumber )->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
                    $event->sheet->getStyle($r . (string)$lastRowNumber )->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);     

                });
                
                $event->sheet->mergeCells('B2:' . $this->lastColumnLetter . '6');
               
                $event->sheet->getStyle('B8:' . $this->lastColumnLetter . '8')->getAlignment()->setHorizontal('center');
                $event->sheet->getStyle('B8:' . $this->lastColumnLetter . '8')->getFont()->setBold(true);
                $event->sheet->getStyle('B8:' . $this->lastColumnLetter . '8')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
                $event->sheet->getStyle('B8:' . $this->lastColumnLetter . '8')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
                $event->sheet->getStyle('B8:' . $this->lastColumnLetter . '8')->getFont()->setSize(9);
                $event->sheet->getStyle('B8:' . $this->lastColumnLetter . '8')->getAlignment()->setVertical('center');
                $event->sheet->getStyle('B2')->getAlignment()->setHorizontal('center');
                $event->sheet->getStyle('B2')->getAlignment()->setVertical('center');
                $event->sheet->setCellValue('B2','IVA COMPRAS');
                $event->sheet->getStyle('B2')->getFont()->setBold(true)->setName('Verdana')->setSize(16);
                $event->sheet->getStyle('D2')->getFont()->setBold(true);
                $event->sheet->getStyle('B' . $this->firstRowNumber . ':B' . $this->lastRowNumber)->getAlignment()->setHorizontal('center');
                $event->sheet->getStyle('D' . $this->firstRowNumber . ':D' . $this->lastRowNumber)->getAlignment()->setHorizontal('center');
                $event->sheet->getStyle('G' . $this->firstRowNumber . ':G' . $this->lastRowNumber )->getNumberFormat()->setFormatCode(self::ARGENTINA_FORMAT_CURRENCY);
                $event->sheet->getStyle('F' . $this->firstRowNumber . ':F' . $this->lastRowNumber)->getAlignment()->setHorizontal('center');

                
            },
        ];
    }

    public function map($invoice): array
    {
        $row = [
            $this->row++,
            $invoice->provider->name,
            $this->ShortDateToArgentinaFormat($invoice->invoice_date),
            $invoice->voucher->name,
            $this->zeroLeft($invoice->ptovta, 4) . '-' . $this->zeroLeft($invoice->number, 8),
            $invoice->neto(),
            $invoice->iva21(),
            $invoice->iva27(),
            $invoice->iva105(),
        ];

        $row = collect($row);
        $this->taxes->map(function($t) use($row, $invoice) {

            return $invoice->taxes->filter(function($tax) use($t, $row) {
                if ($t->id == $tax->tax_id) {
                    
                    return $tax->tax_import;
                }
            });
            
        })->map(function($i) use($row) {
            if ($i->isNotEmpty()){
                collect($i)->map(function($ii) use($row, $i){
                    
                    $row->push($ii->tax_import);
                    
                });
            }else{
                $row->push(0);
            }
        });

        $row->push($invoice->total);

        return $row->toArray();
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Logo de la empresa');
        $drawing->setPath(public_path('/images/logos/logo.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('B2');

        return $drawing;
    }

    public function query()
    {
        return  PurchaseInvoice::query()
            ->whereBetween('imputation_date', [$this->from . ' 00:00:00', $this->to . ' 23:59:59'])
            ->orderBy('invoice_date');
        
    }
}
