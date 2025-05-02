<?php

namespace App\Services;

use App\Models\Invoice;
use App\Models\User;
use App\Repositories\InvoiceRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function __construct(protected UserRepositoryInterface $UserRepository, protected InvoiceRepositoryInterface $invoiceRepository)
    {

    }
    public function getById($id) {
        return $this->UserRepository->getById($id);
    }
    public function getAll(){
        return $this->UserRepository->getAll();
    }


    // Doing this function just to try service able do multiple repositories.
    // maybe add transaction to prevent only execute half of the database in case error.
    public function createWithInitialInvoice($validated) {
        $userData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ];
        $user = new User($userData);
        $result = $this->UserRepository->create($user);

        $invoiceData = [
            'note' => $validated['note'],
            'amount' => $validated['amount'],
            'code' => 'INV-' . rand(100000,999999),
            'user_id' => $result->id,
        ];

        $invoice = new Invoice($invoiceData);
        $this->invoiceRepository->create($invoice);
        return $user;
    }
    public function create($validated){
        $userData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ];
        $user = new User($userData);
        return $this->UserRepository->create($user);
    }
}
