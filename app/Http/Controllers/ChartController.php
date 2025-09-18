<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instansi;
use App\Models\Jabatan;
use App\Models\User;
use App\Models\Dispo;
use App\Models\Memo;

use Illuminate\Support\Facades\DB;


class ChartController extends Controller
{
    public function index()
    {
        //Feetch Monthly Data
        // $dispo = Dispo::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))->whereYear('created_at', date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('count', 'month_name');

        // $dispo = Dispo::select('user_id', DB::raw('count(user_id) as total'))->groupBy('user_id')->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get();

        //$dispo = Dispo::select('user_id', DB::raw('count(user_id) as total'))->groupBy('user_id')->pluck('total', 'user_id');
        $rows = Dispo::select('namaJabatan', DB::raw('count(user_id) as total'))
                ->leftJoin('users', 'dispos.user_id', '=', 'users.id')
                ->leftJoin('jabatans', 'users.jabatan_id', '=', 'jabatans.id')
                ->groupBy('user_id')
                ->get();

        

        $data =[];
        //dd("$rows");
        foreach ($rows as $row) {
            //dd("$row->user_id");
            $data[] = [
                'jabatan' => $row->namaJabatan,
                'total' => $row->total
            ];
        }

        $label = [];
        $total = [];
        foreach ($data as $value) {
            $label[] = $value['jabatan'];
            $total[] = $value['total'];
        }

        $jlhSurat = Memo::select(DB::raw("COUNT(*) as count"))->pluck('count');
        
        return view('app', ['data' => compact('data'),'label' => $label,'total' => $total, 'jlhSurat' => $jlhSurat], ['title' => 'Chart']);
    }

    
}
