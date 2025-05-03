<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function __construct(protected UserRepositoryInterface $UserRepository, protected InvoiceService $invoiceService)
    {

    }
    public function getById($id) {
        return $this->UserRepository->getById($id);
    }
    public function getAll(){
        return $this->UserRepository->getAll();
    }


    public function createWithInitialInvoice($validated) {
       return DB::transaction(function() use ($validated) {
        $user = $this->create($validated['user']);

        $invoice = $this->invoiceService->create($validated['invoice'], $user->id);

        return ['user' => $user, 'invoice' => $invoice];
       });
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
