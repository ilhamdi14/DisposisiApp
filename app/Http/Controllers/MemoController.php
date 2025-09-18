<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Memo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Jabatan;
use App\Models\User;
use App\Models\Dispo;
use Illuminate\Support\Facades\DB;

class MemoController extends Controller
{
    public function index() : View
    {
        $memos = Memo::where('status','NEW')->get();
        //dd(auth()->user()->name);
        return view('kotakMasuk', ['title' => 'Kotak Masuk','memos' => $memos])->with(compact('memos')) ->with('i', (request()->input('page', 1) - 1) * 5); 
    }

    public function kotakKeluar() : View
    {
        $memos = Memo::where('status','PROGRESS')->orWhere('status','SELESAI')->orderBy('created_at', 'desc')->get();
        //dd(auth()->user()->name);
        return view('kotakKeluar', ['title' => 'Kotak Keluar','memos' => $memos])->with(compact('memos')) ->with('i', (request()->input('page', 1) - 1) * 5);
    
    }

    public function kotakKeluarUnit() : View
    {
        $memos = Memo::where('status','NEW')->get();
        //dd(auth()->user()->name);
        return view('kotakKeluar', ['title' => 'Kotak Keluar','memos' => $memos])->with(compact('memos')) ->with('i', (request()->input('page', 1) - 1) * 5);
    
    }

    public function create() : View
    {
        return view('memoUmum', ['title' => 'Buat Memo']);
    }

    public function store(Request $request) : RedirectResponse
    {
        
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:application/pdf, application/x-pdf,application/acrobat, applications/vnd.pdf, text/pdf, text/x-pdf|max:10000',
            'tujuan' => 'required|min:5',
            'perihal'=> 'required|min:5',
            'sifat' => 'required|exist:memo,sifat_surat',
            'tgl_surat'=>'required',
            'no_surat' => 'required|min:5',
 
        ]);
        
       
        $image = $request->file('file');
        $image->storeAs('berkas', $image->hashName());

        
        //create memo
        Memo::create([
            'tujuan' => $request->asal,
            'perihal' => $request->perihal,
            'sifat_surat' => $request->get('sifat'),
            'file' => $image->hashName(),
            'isi_surat' => $request->perihal,
            'tgl_surat' =>  date('Y-m-d', strtotime($request->tanggal)),//$request->tanggal,
            'no_surat' => $request->nomor,
            'pengirim_id' => auth()->user()->id,
            'status' => 'NEW',
        ]);
                   
            //return redirect()->route('memo.create')->with(['title' => 'Create Memo']);
           return redirect()->route('memo.index')->with(['title' => 'Data Surat'])->with('success','Product created successfully.');
        
        
        
    }

    public function storeUmum(Request $request) : RedirectResponse
    {
        Memo::create([
            'tujuan' => $request->asal,
            'perihal' => $request->perihal,
            'sifat_surat' => $request->get('sifat'),
            'file' => $request->file,
            'isi_surat' => $request->perihal,
            'tgl_surat' =>  date('Y-m-d', strtotime($request->tanggal)),//$request->tanggal,
            'no_surat' => $request->nomor,
            'status' => 'NEW',
        ]);
        return view('memoUmum',['title' => 'Memo Umum']);
    }

    public function show(Memo $memo): View
    {
        
        $jabatan = Jabatan::all();
        $user = User::all();
        $memo = Memo::findOrFail($memo->id);
        $dispo = Dispo::with('pengirim', 'penerima')->where('memo_id', $memo->id)->get();
        
        //dd($dispo);
        return view('disposisi', ['title' => 'Detail Disposisi', 'memo' => $memo, 'jabatan' => $jabatan,'user' => $user, 'dispo' => $dispo]);
    }

    public function download($id): View
    {
        
        $memo = Memo::findOrFail($id);
        
        if (Storage::exists('berkas/' . $memo->file)) {
            // Unduh file dengan nama asli yang ditentukan

            $pathToFile = 'berkas/' . $memo->file; 
            $file = Storage::path($pathToFile);

            //dd($file);
            return response()->file($file, [
                'Content-Type' => 'application/pdf',
            ]);
        } else {
            // Kembalikan error 404 jika file tidak ditemukan
            abort(404);
        }
    }

    public function viewPDF($id)
        {
            $memo = Memo::findOrFail($id);
             

            // Ganti dengan cara Anda mengambil file, misalnya dari database
            $pathToFile = 'berkas/' . $memo->file; // Contoh path

            // Pastikan file ada
            if (!Storage::exists($pathToFile)) {
                abort(404, 'File PDF tidak ditemukan.');
            }

            $file = Storage::path($pathToFile);

            return response()->file($file, [
                'Content-Type' => 'application/pdf',
            ]);
        }
}
