<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotebookRequest;
use App\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('notes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotebookRequest $request)
    {
        $note = Note::create([
            'title' => $request->title,
            'content' => $request->content,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return $note;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    public function allNotes(Request $request)
    {
        $notes = Note::orderBy('title','ASC')->paginate(5);
        return $notes;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(NotebookRequest $request, Note $note)
    {
        $note->title = $request->title;
        $note->content = $request->content;
        $note->email = $request->email;
        $note->phone = $request->phone;
        $note->update();

        return $note;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        Note::where('id',$note->id)->delete();
    }
}
