<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{

    function __construct()
    {
        return $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads= Thread::paginate(15);
            return view('thread.index',compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $total_comments = Comment::where('user_id','=', auth()->user()->id)->count();

        if($total_comments < 3){
            return back()->withError("Geen toegang");
        }
        else {
            return view('thread.create');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate

        $this->validate($request,[
            'subject'=>'required|min:10',
            'type'=>'required',
            'thread'=>'required|min:20',
        ]);

        //store

        auth()->user()->threads()->create($request->all());

        //redirect

        return back()->withMessage('Thread aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        return view('thread.single', compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        return view('thread.edit',compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Thread $thread)
    {
        //authoriseren
        if(auth()->user()->id !==$thread->user_id and auth()->user()->type !=='admin'){
            return back()->withError("Geen toegang");
        }
        //validatie met verplichte velden en een minimum aantal karakters
        $this->validate($request,[
            'subject'=>'required|min:10',
            'type'=>'required',
            'thread'=>'required|min:20',
        ]);

        //update
        $thread->update($request->all());
        return redirect()->route('thread.show',$thread->id)->withMessage('Thread bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //authoriseren
        if(auth()->user()->id !==$thread->user_id and auth()->user()->type !=='admin') {
                return back()->withError("Geen toegang");
        }
        $thread->delete();

        return redirect()->route('thread.index')->withMessage('Thread verwijderd');
    }
    /**
     * Search
     */
    public function search(Request $request){
        $search = $request->get('search');
        $posts = Thread::table('threads')->where('name', 'like', '%' .$search. '%')->paginate(5);
        return view('thread.index', ['posts' => $posts]);
    }

}
