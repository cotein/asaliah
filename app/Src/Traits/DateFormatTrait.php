<?php 
namespace App\Src\Traits;
use DateTime;
use Jenssegers\Date\Date;

trait DateFormatTrait
{
	public function __construct()
    {
        Date::setLocale('es');
	}
	
	public function LongDateToArgentinaFormat($fecha){
		return Date::createFromFormat('Y-m-d H:i:s', $fecha)->format('d-m-Y');
	}

	public function LongDateToShortDate($fecha){
		return Date::createFromFormat('Y-m-d H:i:s', $fecha)->format('Y-m-d');
	}

	public function ShortDateToArgentinaFormat($fecha){
		if (is_null($fecha)) {
			return 'Definir fecha';
		}
		return Date::createFromFormat('Y-m-d', $fecha)->format('d-m-Y');
	}

	public function LongDateToYyyymmddFormat($fecha){
		return Date::createFromFormat('Y-m-d H:i:s', $fecha)->format('Ymd');
	}

	public function ShortDateToYyyymmddFormat($fecha){
		return Date::createFromFormat('Y-m-d', $fecha)->format('Ymd');
	}

	public function ShortDateArgentinaTo_yyyy_mm_dd($fecha){
		return Date::createFromFormat('d/m/Y', $fecha)->format('Y-m-d');
	}

	public function ShortDateTo_yyyy_mm_dd($fecha){
		return Date::createFromFormat('d-m-Y', $fecha)->format('Y-m-d');
	}

	public function yyyymmddToDate($fecha){
		return Date::createFromFormat('yyyymmdd', $fecha)->format('d-m-Y');
	}

	public static function FirstDayMonth($year = null, $month = null, $format = 'Y-m-d')
	{
		if (is_null($year) && is_null($month)) {
			$first =  Date::now()->firstOfMonth();
			return Date::createFromFormat('Y-m-d H:i:s', $first)->format($format);
		}
		return Date::create($year, $month, 28, 0, 0, 0)->firstOfMonth()->format($format);
	}


	public static function LastDayMonth($year = null, $month = null, $format = 'Y-m-d')
	{
		if (is_null($year) && is_null($month)) {
			$last =  Date::now()->lastOfMonth();
			return Date::createFromFormat('Y-m-d H:i:s', $last)->format($format);
		}
		return Date::create($year, $month, 28, 0, 0, 0)->lastOfMonth()->format($format);
	}

	public function getActualYear()
	{
		$now = Date::now();
		return $now->year;
	}

	public function getActualMonth()
	{
		$now = Date::now();
		return $now->month;
	}

	public function TranslateMonthToNumber($month = null)
	{
		switch ($month) {
			case 'Enero':
				return 1;
				break;
			
			case 'Febrero':
				return 2;
				break;
			
			case 'Marzo':
				return 3;
				break;
			
			case 'Abril':
				return 4;
				break;
			
			case 'Mayo':
				return 5;
				break;
			
			case 'Junio':
				return 6;
				break;
			
			case 'Julio':
				return 7;
				break;
			
			case 'Agosto':
				return 8;
				break;
			
			case 'Septiembre':
				return 9;
				break;
			
			case 'Octubre':
				return 10;
				break;
			
			case 'Noviembre':
				return 11;
				break;
			
			case 'Diciembre':
				return 12;
				break;
		}
	}

	/**
	* Retorna un string
	*/
	public function createDate($date)
	{
		$d = new Date($date);
		return $d->year. '-' .$d->month. '-' .$d->day;
	}


	public function TimeForExpiration($date)
	{
		$d = Date::createFromFormat('Y-m-d H:i:s', $date);
		return $d->diffForHumans();
	}


	public function StartAlarm($date, $days)
	{
		$d = Date::createFromFormat('Y-m-d H:i:s', $date);
		
		$dt = $d->subDays($days);

		$day = ($dt->day < 10)?'0'.$dt->day:$dt->day;

		$month = ($dt->month < 10)?'0'.$dt->month:$dt->month;
		
		return $day. '-' .$month. '-' .$dt->year;
	}


	public function FirstDayActualMonth()
	{
		return Date::now()->firstOfMonth();
	}


	public function LastDayActualMonth()
	{
		return Date::now()->lastOfMonth();
	}

	public function now()
	{
		return Date::now()->format('Y-m-d');
	}


	public function ToDayArgentinaFormat()
	{
		return Date::now()->format('d-m-Y');
	}

	public function code($date=null)
	{
		if (is_null($date)) {
			return Date::now()->format('Ymd');
		}
		return Date::create($date)->format('Ymd');

	}

	public function Iso8601ToShortDate($date)
	{
		/**
		 * FORMAT ISO8601
		 * '2019-10-24T15:44:58.000-04:00'
		 */
		
		$d = substr($date, 0,9);
		return $this->ShortDateToArgentinaFormat($d);
	}

	public function LongDateToArgentinaLongDate($fecha){
		return Date::createFromFormat('Y-m-d H:i:s', $fecha)->format('d-m-Y H:i:s');
	}

	public function change_divider_slash($date)
	{
		if (strpos($date, '/')) {
			return Date::createFromFormat('d/m/Y', $date)->format('Y-m-d');
		}

		if (strpos($date, '-')) {
			return Date::createFromFormat('d-m-Y', $date)->format('Y-m-d');
		}

		return Date::createFromFormat('Ymd', $date)->format('Y-m-d');
	}

		
}

?> 


 