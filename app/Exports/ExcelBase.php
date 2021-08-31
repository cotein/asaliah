<?php

namespace App\Exports;

use App\Src\Traits\ZeroLeftTrait;
use App\Src\Traits\DateFormatTrait;

class ExcelBase
{
    use DateFormatTrait, ZeroLeftTrait;
    
    const ARGENTINA_FORMAT_CURRENCY = '_ $ * #,##0.00_ ;_ $ * -#,##0.00_ ;_ $ * "-"??_ ;_ @_ ';
    
    protected $lastRowNumber = 0;
    
    protected $firstRowNumber = 8;
    
    protected $lastColumnLetter;

    protected $row = 1;
    
    protected $startCell =  'B8';

    protected $headings = [];

    public function parseNumberToColumn($position=0)
    {
        $alphabet = range('A', 'Z');

        return collect($alphabet)->map(function($a, $index) use($position) {
            if ($index == $position) {
                return $a;
            }
        })->filter()->values()->toArray()[0];

    }

}
