<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionExport implements FromCollection, WithHeadings
{
    private $arrTransactions;

    public function collection()
    {
        $transactions = Transaction::all();
        $formatTransactions = [];

        foreach ($transactions as $key =>$item) {
            $formatTransactions[] = [
                'id'        => $item->id,
                'total'     => number_format($item->tr_total),
                'name'      => $item->tr_name,
                'email'      => $item->tr_email,
                'phone'      => $item->tr_phone,
                'address'      => $item->tr_address,
                'status'      => $item->getStatus($item->tr_status)['name'],
                'note'      => $item->tr_note,
                'create'      => $item->created_at,

            ];
        }
        return collect($formatTransactions);
    }

    public function headings(): array
    {
        return [
          'ID',
          'Total',
          'Name',
          'Email',
          'Phone',
          'Address',
          'Status',
          'Note',
          'Create',
        ];
    }
}
