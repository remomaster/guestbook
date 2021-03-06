<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\User;
use App\Role;

class UserController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {        
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        Log::info('User '.Auth::id().' betritt die Userseite');

        return view('user.index',[
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        Log::info('User '.Auth::id().' bearbeitet User '.$user->id);

        return view('user.edit',[
            'euser' => $user,
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $blogeintrag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        Log::info('User '.Auth::id().' updated User '.$user->id);

        $valiUser = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nachname' => ['required', 'string', 'max:255'],
            'geburtstag' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'geschlecht'=> ['required', Rule::in(['Mann','Frau'])],
            'role' => ['required', 'min:1', 'max:3' ]
        ]);
        
        $user->fill($valiUser);
        if($user->role->id !== $valiUser['role']){
            $user->role()->associate(Role::find($valiUser['role']));
        }
        $user->save();
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('user');
    }
}
