<?php

namespace App\Repositories;

use App\Models\Invoice;
use App\Models\User;


class InvoiceRepository implements InvoiceRepositoryInterface
{
    public function getByUser(User $user) {
        return Invoice::select('id', 'code', 'amount','note', 'created_at')
        ->whereBelongsTo($user)
        ->latest()
        ->get()
        ->map(function($invoice) {
            return [
                'id' => $invoice->id,
                'code' => $invoice->code,
                'amount' => number_format($invoice->amount, 2, '.'),
                'note' => $invoice->note,
                'created_at' => $invoice->created_at->format('d M Y H:i'),
            ];
        });
    }

    public function getById($id) {
        return Invoice::select('id', 'code', 'amount','note', 'created_at')
            ->find($id);
    }

    public function getAll() {
        return Invoice::all();
    }

    public function create(Invoice $invoice) {
        $invoice->save();
        return $invoice;
    }
}
