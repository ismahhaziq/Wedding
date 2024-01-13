<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MatchPassword implements Rule //aku sangkut sebab guna validation rule. Aku taktahu la mai mana validation tu, sebab create melalui terminal. Bukan sendiri buat
{
    protected $userId;

    public function __construct($userId = null)
    {
        $this->userId = $userId;
    }

    public function validate($attribute, $value, Closure $fail)
    {
        $user = $this->user();

        if (!$user || !Hash::check($value, $user->password)) {
            $fail($this->message());
        }
    }

    public function passes($attribute, $value)
    {
        return Hash::check($value, $this->user()->password);
    }

    
    protected function user()
    {
        return $this->userId ? User::findOrFail($this->userId) : null;
    }

    public function message()
    {
        return 'The :attribute does not match your current password.';
    }
}
