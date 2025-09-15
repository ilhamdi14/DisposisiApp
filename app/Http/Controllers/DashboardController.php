<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dispo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Memo;
use App\Models\Penerima;
use App\Models\User;

use Twilio\Rest\Client;

class DashboardController extends Controller
{
    public function index() : View
    {
        return view('dashboard', ['title' => 'Dashboard']);
    }

    public function store(Request $request):RedirectResponse
    {
        //dd($request->all());

        $request->validate([
            'catatan' => 'required',
            'memoId' => 'required',
            'userId' => 'required',
            'kepada_user_id' => 'required',
        ]);

        //untuk update status disposisi sebelumnya
        if(Dispo::where('memo_id', $request->memoId)->where('status', 'new')->exists()){
            Dispo::where('memo_id', $request->memoId)->where('status', 'new')->update([
                'status' => 'PROGRESS',
            ]);
        }

        
        Dispo::create([
            'catatan' => $request->catatan,
            'status' => 'new',
            'memo_id'=> $request->memoId,
            'user_id'=> $request->userId,
            'kepada_user_id'=> $request->kepada_user_id
        ]);

        if(Memo::where('id', $request->memoId)->exists()){
            Memo::where('id', $request->memoId)->update([
                'status' => 'PROGRESS',
            ]);
        }

        $nowa = User::select('no_wa')->where('id', $request->kepada_user_id)->first();
        $link = "Berikut Link Unutk di Disposisi kan \n <a href='https://google.com' target='_blank'>Klik Disini</a> \n Terima Kasih";

        $this->sendA($nowa->no_wa, $link);
        
        
        //return view('kotakMasuk', ['title' => 'Data User'])->with('success','Product created successfully.');
        return redirect()->route('dispo.kotakKeluar')->with(['title' => 'Data Surat'])->with('success','Product created successfully.');
    }

    public function sendWa()
    {
        $curl = curl_init();
        $token = "aCjTFq8nK86uXnwTaadY";
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'target' => 628116333477,
            'message' => 'Selamat Datang di Fonnte',
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: ' . $token
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response; //log response fonnte
    }

    public function sendA($penerima, $message)
    {
        //$penerima = '6282380756387';
        //$message = "Selamat Datang di Aplikasi";
        try {
            $twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));

            $message = $twilio->messages->create("whatsapp:".$penerima, [
                'from' => "whatsapp:".env('TWILIO_WHATSAPP_NUMBER'),
                'body' => $message,
            ]);

            //dd($message);
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
