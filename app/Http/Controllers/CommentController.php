<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Thread;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function addThreadComment(Request $request, Thread $thread)
    {
        $this->validate($request,[
            'body'=>'required'
        ]);

        //Nieuwe comment aanmaken
        $comment=new Comment();
        $comment->body=$request->body;
        //Authorizeren
        $comment->user_id=auth()->user()->id;
        //Comment opslaan met thread ID
        $thread->comments()->save($comment);
        //Melding naar user sturen
        return back()->withMessage('Gereageerd!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //comment verwijderen
        //als niet geauthoriseerd, dan error
        if($comment->user_id !== auth()->user()->id)
            abort('401');
        //delete functie uitvoeren
        $comment->delete();
        //Melding naar user sturen
        return back()->withMessage('Deleted');
    }
}
