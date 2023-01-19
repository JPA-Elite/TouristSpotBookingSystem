<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\OwnerAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OwnerAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OwnerAccount::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customer_accounts,email',
            'address' => 'required',
            'password' => 'required|confirmed'
        ]);
        return OwnerAccount::create([
            'name'=> $validated['name'],
            'email'=> $validated['email'],
            'address'=> $validated['address'],
            'password'=>Hash::make($validated['password']),
            'email_verified_at' => now(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OwnerAccount  $ownerAccount
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return OwnerAccount::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OwnerAccount  $ownerAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(OwnerAccount $ownerAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OwnerAccount  $ownerAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'unique:customer_accounts',
            'email' => 'email|unique:customer_accounts,email',

        ]);
        return OwnerAccount::find($id)->update([
            'name'=> $validated['name'],
            'email'=> $validated['email'],
            'address'=> $request->address,
            'password'=>$request-> Hash::make($request->password),

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OwnerAccount  $ownerAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return OwnerAccount::find($id)->delete();
    }
}
