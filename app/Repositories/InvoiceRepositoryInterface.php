<?php

namespace App\Repositories;

use App\Models\Invoice;
use App\Models\User;

interface InvoiceRepositoryInterface
{
    public function getByUser(User $user);
    public function getById($id);
    public function getAll();
    public function create(Invoice $invoice);
    public function update($invoice);

    public function delete($id);
}
