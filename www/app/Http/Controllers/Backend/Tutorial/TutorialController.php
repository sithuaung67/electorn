<?php

namespace App\Http\Controllers\Backend\Tutorial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutorial\Tutorial;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TutorialController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:tutorial-list|tutorial-create|tutorial-edit|tutorial-delete', ['only' => ['index','store']]);
         $this->middleware('permission:tutorial-create', ['only' => ['create','store']]);
         $this->middleware('permission:tutorial-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:tutorial-delete', ['only' => ['destroy']]);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutorials=Tutorial::orderBy('id','DESC')->get();
        return view('backend.tutorial.index',compact('tutorials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tutorial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name=$request['name'];
        $video=$request->file('video');
        $cover_photo=$request->file('photo');
        $photo_video_name=time();

        $tutorials=new Tutorial();
        $tutorials->name=$name;

        $photo_name=$photo_video_name.'.'.$request->file('photo')->getClientOriginalExtension();
        $tutorials->photo=$photo_name;
        Storage::disk('tutorialcover')->put($photo_name, File::get($cover_photo));


        $video_name=$photo_video_name.'.'.$request->file('video')->getClientOriginalExtension();
        $tutorials->video=$video_name;
        Storage::disk('video')->put($video_name, File::get($video));

        $tutorials->save();
        return redirect('admin/tutorial');
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
        $tutorial=Tutorial::findOrFail($id);
        return view('backend.tutorial.edit',compact('tutorial'));
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
        $video=$request->file('video');
        $cover_photo=$request->file('photo');
        $video_name=time();

        $tutorials=Tutorial::where('id',$id)->FirstOrFail();
        if(!empty($video)){
            Storage::disk('video')->delete($tutorials->video);
            $video_name=$video_name.'.'.$request->file('video')->getClientOriginalExtension();
            $tutorials->video=$video_name;
            Storage::disk('video')->put($video_name, File::get($video));
        }
        if($cover_photo){
            Storage::disk('tutorialcover')->delete($tutorials->photo);
            $photo_name=$video_name.'.'.$request->file('photo')->getClientOriginalExtension();
            $tutorials->photo=$photo_name;
            Storage::disk('tutorialcover')->put($photo_name, File::get($cover_photo));
        }
        $tutorials->name=$request['name'];
        $tutorials->update();
        return redirect('admin/tutorial');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tutorials=Tutorial::where('id',$id)->FirstOrFail();
        Storage::disk('tutorialcover')->delete($tutorials->photo);
        Storage::disk('video')->delete($tutorials->video);
        $tutorials->delete();
        return redirect('admin/tutorial');
    }
}
