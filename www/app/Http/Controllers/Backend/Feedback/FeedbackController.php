<?php

namespace App\Http\Controllers\Backend\Feedback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Feedback\Feedback;

class FeedbackController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:feedback-list|feedback-delete', ['only' => ['index','store']]);
         $this->middleware('permission:feedback-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_feedback=Feedback::orderBy('created_at','DESC')->count();
        $feedback=Feedback::orderBy('created_at','DESC')->paginate(1);
        return view('backend.feedback.index',compact('feedback','count_feedback'));
    }

    public function search(Request $request)
    {
        $count_feedback=Feedback::orderBy('created_at','DESC')->count();
        $star=$request['star'];
        if($star!=0){
            $feedback=Feedback::where('star',$star)->orderBy('id','DESC')->paginate(1);
        }else{
            $feedback=Feedback::orderBy('id','DESC')->paginate(1);
        }
        return view('backend.feedback.index',compact('feedback','count_feedback'));

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
    public function store(Request $request)
    {
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Feedback::destroy($id);
        return redirect('admin/feedback');
    }
}
