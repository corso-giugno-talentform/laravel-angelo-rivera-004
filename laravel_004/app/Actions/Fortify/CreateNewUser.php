<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                function ($attribute, $value, $fail) {
                    $patterns = [
                        'Maiuscola' => '/[A-Z]/',
                        'Minuscola' => '/[a-z]/',
                        'Numero' => '/[0-9]/',
                        'Simbolo' => '/[!@#$%^&*()_\+\-=\[\]{};:\'",.<>\/?]/',
                    ];

                    $messages = [
                        'Maiuscola' => 'La password deve contenere almeno una lettera maiuscola.',
                        'Minuscola' => 'La password deve contenere almeno una lettera minuscola.',
                        'Numero' => 'La password deve contenere almeno un numero.',
                        'Simbolo' => 'La password deve contenere almeno un simbolo.',
                    ];

                    foreach ($patterns as $key => $pattern) {
                        if (!preg_match($pattern, $value)) {
                            $fail($messages[$key]);
                            break; // interrompe se una regola fallisce
                        }
                    }
                },
            ],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
