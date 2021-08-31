<?php

namespace App\Src\MercadoPago\Traits;

use App\Src\Models\Payment;
/**
 * 
 */
trait DataBasePaymentTrait
{
    public function store($data)
    {
        $payment = new Payment;

        $payment->mercadopago_id = $data['id'];
        $payment->operation_type = $data['operation_type'];
        $payment->issuer_id = $data['issuer_id'];
        $payment->payment_method_id = $data['payment_method_id'];
        $payment->payment_type_id = $data['payment_type_id'];
        $payment->status = $data['status'];
        $payment->status_detail = $data['status_detail'];
        $payment->currency_id = $data['currency_id'];
        $payment->description = $data['description'];
        $payment->taxes_amount = $data['taxes_amount'];
        $payment->shipping_amount = $data['shipping_amount'];
        $payment->collector_id = $data['collector_id'];
        $payment->payer = $data['payer'];
        $payment->marketplace_owner = $data['marketplace_owner'];
        $payment->additional_info = $data['additional_info'];
        $payment->transaction_amount = $data['transaction_amount'];
        $payment->transaction_amount_refunded = $data['transaction_amount_refunded'];
        $payment->coupon_amount = $data['coupon_amount'];
        $payment->transaction_details = $data['transaction_details'];
        $payment->fee_details = $data['fee_details'];
        $payment->statement_descriptor = $data['statement_descriptor'];
        $payment->installments = $data['installments'];
        $payment->card = $data['card'];
        $payment->processing_mode = $data['processing_mode'];

        $payment->save();

        return $payment;


    }
}

