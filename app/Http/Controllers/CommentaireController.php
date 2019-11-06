<?php

namespace App\Http\Controllers;

use App\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function ajoutercommentaire(Request $request)
    {
        //On valide les données qui arrivent du formulaire
        request()->validate([
            'user_id' => ['required'],
            'media_id' => ['required'],
            'lib_comm' => ['required']
        ]);

        //dd('media' . request('id'), 'user' . request()->user_id);
        Commentaire::create([
            'user_id' => request('user_id'),
            'media_id' => request('media_id'),
            'lib_comm' => request('lib_comm')
        ]);

        flash('Le commentaire a bien été publié . ')->success();
        return back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update($id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
    }
}

?>
