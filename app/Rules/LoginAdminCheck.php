<?php

namespace App\Rules;

use Closure;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Validation\ValidationRule;

class LoginAdminCheck implements ValidationRule
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $email = $this->request->input('email');
        $password = $this->request->input('password');
        $loginStatus = false;

        $admin = Admin::where('email', $email)->first();

        if ($admin && Hash::check($password, $admin->password)) {
            $loginStatus = true;
            Session::put('loginStatus', true);
            Session::put('ambilUser', $admin);
        }

        if (! $loginStatus) {
            $fail('Email atau password salah.');
        }
    }
}
