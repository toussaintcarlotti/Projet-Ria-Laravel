<?php

namespace App\Actions;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Lorisleiva\Actions\Action;

class CreateUser extends Action
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }

    public function handle($input)
    {
        $rules = (new UserRequest())->rules();
        $rules['email'] = 'unique:users,email';
        $rules['password'] = 'required|min:8';
        $validator = Validator::make($input, $rules);
        return User::create(array_merge($validator->validated(), [
            'password' => Hash::make($input['password']),
        ]));

    }
}
