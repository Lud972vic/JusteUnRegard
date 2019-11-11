<?php

namespace App\Http\Controllers\Frontend;

use App\Tchat;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function show()
    {
        /*On récupere l'ensemble des messages des utilisateurs*/
        $messages = Tchat::all()->take(30);
//$users = User::all()->take(10);

//        $messages = DB::table('tchats')
//            ->join('users', 'tchats.user_id', '=', 'users.id')
//            ->select('tchats.*', 'users.pseudo_adh', 'users.photo_adh')
//            ->orderBy('tchats.user_id')
//            ->take(12)//marche pas
//            ->get();

        return view('frontend.blog.blog', ['messages' => $messages]);
    }
}
