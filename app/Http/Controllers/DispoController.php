<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

use App\Models\Dispo;
use App\Models\Jabatan;
use App\Models\User;
use App\Models\Memo;

class DispoController extends Controller
{
    public function kotakKeluar() : View
    {
        $dispo = Dispo::where('kepada_user_id', auth()->user()->id)->where('status', 'new')->get();
        //dd(auth()->user()->name);
        return view('kotakMasukPim', ['title' => 'Kotak Masuk Disposisi','dispo' => $dispo])->with(compact('dispo')) ->with('i', (request()->input('page', 1) - 1) * 5);
    
    }

    public function selesaiDispo(Request $request)
    {
        Dispo::where('memo_id', $request->memoIdX)->where('status', 'new')->update([
                'status' => 'SELESAI',
            ]);
            
        //dd($request->all());
        return redirect()->back()->with('success', 'Disposisi telah selesai.');
    }

    public function kotakKeluarPim() : View
    {
        //$dispo = Dispo::where('user_id', auth()->user()->id)->get();
        $dispo = Dispo::where('user_id', auth()->user()->id)->get();;
        //dd($dispo->all());
        return view('kotakkeluarPim', ['title' => 'Kotak Keluar Disposisi','dispo' => $dispo])->with(compact('dispo')) ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    

    public function tracking($noSurat) : View
    {
        //$tracking = DB::table('dispos')->leftJoin('memo', 'memo.id', '=', 'dispos.memo_id')->where('no_surat', $noSurat)->get();
        $tracking = Dispo::select('dispos.*')->leftJoin('memo', 'memo.id', '=', 'dispos.memo_id')->where('no_surat', $noSurat)->orWhere('memo.id', $noSurat)->get();
        //dd($tracking);
        return view('/tracking', ['title' => 'Tracking','tracking' => $tracking]);
    }

    public function search(Request $request) : View
    {
        $query = $request->get('search'); 
        
        $cekMemo = Memo::where('no_surat',  $query)->orWhere('memo.id',  $query)->get();
        //$cekMemo = Memo::where('no_surat', 'like', '%'.$query.'%')->get();
        
        if($cekMemo != null){
            $tracking = Dispo::select('dispos.*')->leftJoin('memo', 'memo.id', '=', 'dispos.memo_id')->where('no_surat', $query)->orWhere('memo.id', $query)->get();
            //dd($tracking);
        }
        
        
        return view('/tracking', ['title' => 'Tracking','tracking' => $tracking]);
        
    }
    
}
