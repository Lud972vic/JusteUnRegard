<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $medias = DB::table('medias')
            ->join('users', 'medias.user_id', '=', 'users.id')
            ->select('medias.*', 'users.*')
            ->where('type_fichier_media', '=', 'image/jpeg')
            ->orderByRaw('RAND()')->take(12)
            ->get();

        $accessoires = DB::table('accessoirepublicites')->where('typeannonce_id', '=', '2')->get();
        $publicites = DB::table('accessoirepublicites')->where('typeannonce_id', '=', '1')->get();

        return view('frontend.main.index', ['medias' => $medias, 'accessoires' => $accessoires, 'publicites' => $publicites]);
    }
}
