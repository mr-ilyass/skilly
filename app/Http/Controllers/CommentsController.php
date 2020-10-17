<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Episode;
use App\Http\Requests\CommentReq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CommentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:superadministrator|abonne');
    }
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(CommentReq $request)
    {

        if (Auth::user()->hasRole('abonne') or Auth::user()->hasRole('superadministrator')){
        $episode = Episode::findOrFail($request->episode);
        $comment = new Comment ;
        $comment->body = $request->body ;
        $comment->User_id = Auth::user()->id ;
        $comment->epID = $request->episode ;
        $comment->save();
            Alert::success('Enregistré', 'votre commentaire est bien enregistré');

            return back();

        }
        else{
            abort('404');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function update(CommentReq $request)
    {
    $comment = Comment::findOrFail($request->commentID);
    if ($comment->User_id == Auth::user()->id ){
        $comment->body = $request->body ;
        $comment->save();
        Alert::success('Enregistré', 'votre commentaire été bien modifié');

    }

    else{
        Alert::error('Erreur', 'Verfier Votre Commentaire');

    }
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommentReq $request)
    {
        $comment = Comment::findOrFail($request->commentID);
        if ($comment->User_id == Auth::user()->id or Auth::user()->hasRole('superadministrator')){
            $comment->delete();
            Alert::success('Supprimé', 'votre commentaire été bien supprimé');

        }

        else{
            Alert::error('Erreur', 'Verfier Votre Commentaire');

        }
        return back();

    }}
