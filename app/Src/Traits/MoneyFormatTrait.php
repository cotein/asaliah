<?php 
namespace App\Src\Traits;

use App\Src\Traits\MoneyFormatTrait;

trait MoneyFormatTrait
{
	/**
	 * 
	 * @param  [type] $importe [description]
	 * @return [type]          [description]
	 */
	public function CurrencyToMySqlFormat($importe)
	{
		$importe = preg_replace('/[$]/', '', $importe);
		$importe = preg_replace('/[.]/', '', $importe);
	    $importe = preg_replace('/[,]/', '.', $importe);
	    return (float)$importe;
	}

	public function NumberToMySqlFormat($importe)
	{
		$importe = preg_replace('/[.]/', ',', $importe);
	    return (float)$importe;
	}

	

	/**
	 * [Formatea los campos de dinero de
	 * SQL Server (currency) a $ de Argentina]
	 * @param  [type] $importe [description]
	 * @return [type]          [description]
	 */
	public function DisplayToUserCurrency($importe)
	{
		$importe = number_format($importe, 2, ',', '.');
		return '$ '.$importe;
	}

}

?> 


 