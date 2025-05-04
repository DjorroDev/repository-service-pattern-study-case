<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
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

    public function show($id) {
        $invoice = $this->invoiceService->getById($id);
        return view('showInvoiceDetail', ['invoice' => $invoice]);
    }


    public function create() {
        return view('createInvoices');
    }

    public function store(StoreInvoiceRequest $request) {
        $validated = $request->validated();
        return $this->invoiceService
            ->create($validated, $validated['user_id']);
    }

    public function getByUser(User $user) {
        return $this->invoiceService->getByUser($user);
    }

    public function edit($id) {
        return view('updateInvoices', ['id' => $id]);
    }

    public function update(UpdateInvoiceRequest $request, $id) {
        $validated = $request->validated();
        return $this->invoiceService->update($validated, $id);
    }

    public function delete($id) {
        return $this->invoiceService->delete($id);
    }
}
