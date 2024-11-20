<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ResponseController;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends ResponseController
{
    public function login(UserRequest $request)
    {
        $data['email'] = $request->email;
        $data['password'] = $request->password;

        if (auth()->attempt($data)) {
            $data['access_token'] = auth()->user()->createToken("keto")->plainTextToken;
            return $this->actionSuccess("Success", $data);
        }

        return $this->actionFailure("Invalid Username or Password");
    }

    public function change_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->validationFailed("All fields are required", $validator->errors());
        }

        if ($request->new_password != $request->confirm_password) {
            return $this->actionFailure("Confirm Password not match");
        }

        $password = Hash::make($request->new_password);
        $user = User::where('id', auth()->user()->id)->update(['password' => $password]);
        if ($user) {
            return $this->actionSuccess("Password change successfully");
        }
        return $this->actionFailure("Password not update");
    }
}
