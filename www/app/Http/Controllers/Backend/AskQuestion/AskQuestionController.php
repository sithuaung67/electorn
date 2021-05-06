<?php

namespace App\Http\Controllers\Backend\AskQuestion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question\AskQuestion;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AskQuestionController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ask_question-list|ask_question-create|ask_question-edit|ask_question-delete', ['only' => ['index','store']]);
         $this->middleware('permission:ask_question-create', ['only' => ['create','store']]);
         $this->middleware('permission:ask_question-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:ask_question-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $question=AskQuestion::orderBy('created_at','desc')->get();
        return view('backend.question.index',compact('question'));
    }

    public function view($id)
    {
        $question=AskQuestion::findOrFail($id);
        return view('backend.question.view',compact('question'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AskQuestion::create($request->all());
        return redirect('admin/ask_question');
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
        $question=AskQuestion::findOrFail($id);
        return view('backend.question.edit',compact('question')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        AskQuestion::find($id)->update($request->all());
        return redirect('admin/ask_question');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AskQuestion::destroy($id);
        return redirect('admin/ask_question');
    }
}
