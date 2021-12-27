<?php

namespace App\Exports;

use App\Models\Order_Summary;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\AfterSheet;

class MonthlySelesReport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order_Summary::whereMonth('created_at',date('m'))->get();
        // unique($s);
    }
    public function map($order_summary) :array
    {
        return [
            $order_summary->id,
            $order_summary->created_at,
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
            'date',
            'Shipping Charge',
            'Discount',
            'Subtotal',
            'Total Amount',
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getStyle('A1:F1')->appyFromArray([
                    'font' =>[
                        'bold' => true
                    ]
                ]);
            },
        ];
    }
}
