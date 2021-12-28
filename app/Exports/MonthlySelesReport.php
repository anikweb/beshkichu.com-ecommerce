<?php

namespace App\Exports;

use App\Models\Order_Summary;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MonthlySelesReport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order_Summary::with('billing_details')->with('order_details')->whereMonth('created_at',date('m'))->get();
    }
    public function map($order_summary) :array
    {
        return [
            $order_summary->id,
            $order_summary->invoice_no,
            $order_summary->billing_details->name,
            $order_summary->billing_details->phone,
            $order_summary->billing_details->email,
            $order_summary->billing_details->street_adress1.','.$order_summary->billing_details->upazila->name.','.$order_summary->billing_details->district->name,
            $order_summary->order_details->first()->product->name,
            $order_summary->order_details->first()->product->sku,
            $order_summary->order_details->first()->size_id,
            $order_summary->order_details->first()->quantity,
            $order_summary->created_at,
            $order_summary->delivered_date,
            $order_summary->shipping_charge,
            $order_summary->discount,
            $order_summary->sub_total,
            $order_summary->total_price,
        ];
    }
    public function headings():array
    {
        return [
            'id',
            'invoice',
            'Customer Name',
            'Mobile',
            'Email',
            'Address',
            'Product',
            'SKU',
            'Size',
            'quantity',
            'Order Date',
            'Delivery Date',
            'Shipping Charge',
            'Discount',
            'Subtotal',
            'Total Amount',
        ];
    }
}
