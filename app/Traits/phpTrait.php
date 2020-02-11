<?php

namespace App\Traits;

use App\Data;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

trait phpTrait
{
    protected function create(array $data)
    {
        return Data::create([
            'name' => $data['name'],
            'pincode' => $data['pincode'],
            'email' => $data['email'],
        ]);

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'pincode' => ['required', 'numeric', 'digits:6', 'unique:data'],
            'email' => ['required', 'regex:/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/', 'max:255', 'unique:data'],
        ]);

    }

    public function email($email)
    {
        Log::info('email sent to ' . $email);
    }
}
