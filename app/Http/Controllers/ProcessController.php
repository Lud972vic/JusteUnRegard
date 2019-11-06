<?php

namespace App\Http\Controllers;

use App\Don;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function donnation()
    {
        return view('process.donnation');
    }

    public function paiement()
    {
        //dd(request('donnation'), request('libelle'), auth()->user()->id);
        return view('process.paiement');
    }

    public function paiement_confirmation(Request $request)
    {
        $_total_a_payer = request('donnation');
        $_lib_don = request('libelle');
        $_user_id = auth()->user()->id;

        $don = New Don();
        $don->lib_don = $_lib_don;
        $don->montant_don = $_total_a_payer;
        $don->user_id = $_user_id;
        $don->save();

        return view('process.merci', ['pseudo' => auth()->user()->pseudo_adh]);
    }
}
