<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceRequest;
use App\Services\InvoiceService;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    public function __construct(protected InvoiceService $invoiceService)
    {

    }

    public function index(Request $request) {
        return $this->invoiceService->getByUser($request->user());
    }

    public function show($id) {
        return $this->invoiceService->getById($id);
    }

    public function create() {
        return view('createInvoices');
    }

    public function store(StoreInvoiceRequest $request) {
        $validated = $request->validated();
        return $this->invoiceService
            ->create($validated, $validated['user_id']);
            // Can be use request->user() etc.. tapi di sini hardcode duls
    }
}
