<?php

namespace App\Http\Controllers;
use App\Models\CustomerAccount;
use App\Models\OwnerAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginCustomerAcc(Request $request){

        $validateData = $request->validate([
            'email' => 'required|email',
            'password'=> 'required'
        ]);

        $customer = CustomerAccount::where('email', $validateData['email'])->first();

        if($customer && Hash::check($validateData['password'],$customer->password)){
            $token = $customer->createToken('api',['create']);

            return[
                'token' => $token->plainTextToken
            ];
        }else{
            return[
                'error'=> "Invalid Credentials"
            ];
        }

    }


    public function loginOwnerAcc(Request $request){

        $validateData = $request->validate([
            'email' => 'required|email',
            'password'=> 'required'
        ]);

        $owner = OwnerAccount::where('email', $validateData['email'])->first();

        if($owner && Hash::check($validateData['password'],$owner->password)){
            $token = $owner->createToken('api',['create']);

            return[
                'token' => $token->plainTextToken
            ];
        }else{
            return[
                'error'=> "Invalid Credentials"
            ];
        }
    }

    public function logoutCustomerAcc(Request $request){
        auth()->user()->tokens()->delete();
    }
    public function logoutOwnerAcc(Request $request){
        auth()->user()->tokens()->delete();
    }
}
