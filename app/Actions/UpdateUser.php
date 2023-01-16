<?php

namespace App\Actions;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Lorisleiva\Actions\Action;

class UpdateUser extends Action
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }

    public function handle(array $input, $user)
    {
        $rules = (new UserRequest())->rules();
        $rules['email'] = 'unique:users,email,'.$user->id;
        $rules['password'] = 'nullable|min:8';

        if ($input['password'] == null) {
            $input['password'] = $user->password;
        }else{
            $input['password'] = Hash::make($input['password']);
        }
        $validator = Validator::make($input, $rules);

        $user->update(array_merge($validator->validated(), [
            'password' => $input['password'],
        ]));
        return $user;
    }

}
