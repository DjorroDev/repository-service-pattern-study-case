<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(protected UserService $userService)
    {

    }

    public function index() {
        // dd('test');
        return $this->userService->getAll();
    }

    public function show($id) {
        return $this->userService->getById($id);
    }

    public function create() {
        return view('createUser');
    }

    public function store(StoreUserRequest $request) {
        $validated = $request->validated();
        return $this->userService->createWithInitialInvoice($validated);
    }
}
