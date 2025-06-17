<?php

namespace App\Rules;

use Closure;
use App\Models\konsultan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Validation\ValidationRule;

class LoginKonsultanCheck implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
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

        $konsultan = konsultan::where('email', $email)->first();

        if ($konsultan && Hash::check($password, $konsultan->password)) {
            $loginStatus = true;
            Session::put('loginStatus', true);
            Session::put('ambilUser', $konsultan);
        }

        if (! $loginStatus) {
            $fail('Email atau password salah.');
        }
    }
}
