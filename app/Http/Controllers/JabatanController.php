<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Redirect;

class JabatanController extends Controller
{
    public function store(Request $request)
    {
        Jabatan::create([
            'namaJabatan' => $request->namaJabatan,
            
        ]);

        return Redirect::route('register.create');
    }
}
