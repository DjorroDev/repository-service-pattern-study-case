<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\InvoiceService;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    public function __construct(protected InvoiceService $invoiceService)
    {

    }

    public function index() {
        return $this->invoiceService->getAll();
    }

    public function byUser(User $user) {
        return $this->invoiceService->getByUser($user);
    }
}
