<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Instansi;
use App\Models\Jabatan;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    public function index() : View
    {
        $users = User::all();
        return view('setting.listUser', ['title' => 'Kotak Masuk','users' => $users])->with(compact('users')) ; 
    }
    public function create() : View
    {
        $instansi = Instansi::all();
        $jabatan = Jabatan::all();
        return view('setting.register', ['title' => 'Register','instansi' => $instansi,'jabatan' => $jabatan]);
    }

    public function store(Request $request):RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'nama'=>'required',
            'email'=>'required',
            'password'=>'required',
            'jabatan'=>'required',
            'instansi'=>'required',
            'nowa'=>'required',
            'grade'=> 'required',

         ]);

         $user = User::create([
            'name' => $request->get('nama'),
            'email' => $request->get('email'),
            'password' => Hash::make("password"),
            'jabatan_id' => $request->get('jabatan'),
            'instansi_id' => $request->get('instansi'),
            'no_wa' => $request->get('nowa'),
            'grade' => $request->get('grade'),
        ]);

         //return view('setting.listUser', ['title' => 'Data User','users' => $user]);
         return redirect()->route('register.index')->with(['title' => 'Data User','users' => $user]);
        // return Redirect::back();
    }

    public function edit(string $id)
    {
        $instansi = Instansi::all();
        $jabatan = Jabatan::all();
        $users = User::findOrFail($id);
        return view('setting.editDataUser', ['title' => 'Edit User','instansi' => $instansi,'jabatan' => $jabatan,'users' => $users]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
}
