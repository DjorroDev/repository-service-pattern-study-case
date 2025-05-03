<?php

namespace App\Services;

use App\Models\Invoice;
use App\Models\User;
use App\Repositories\InvoiceRepositoryInterface;

class InvoiceService
{
    public function __construct(protected InvoiceRepositoryInterface $invoiceRepository)
    {

    }

    public function getByUser(User $user) {
        return $this->invoiceRepository->getByUser($user);
    }

    public function getById($id) {
        return $this->invoiceRepository->getById($id);
    }

    public function getAll() {
        return $this->invoiceRepository->getAll();
    }

    public function create($validated, $userId) {
        $invoiceData = [
            'user_id' => $userId,
            'code' => 'INV-' . rand(100000,999999),
            'note' => $validated['note'],
            'amount' => $validated['amount'],
        ];

        $invoice = new Invoice($invoiceData);

        return $this->invoiceRepository->create($invoice);
    }
}
