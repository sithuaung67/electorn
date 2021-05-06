<?php

namespace App\Http\Controllers\Backend\HomeVideo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeVideo\HomeVideo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class HomeVideoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:home_video-list|home_video-edit', ['only' => ['index','store']]);
         $this->middleware('permission:home_video-edit', ['only' => ['edit','update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home_video=HomeVideo::all();
        return view('backend.home_video.index',compact('home_video'));
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
         $home_video=HomeVideo::findOrFail($id);
        return view('backend.home_video.edit',compact('home_video'));
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
        $cover_photo=$request->file('home_cover');
        $video_name=time();

        $home_video=HomeVideo::where('home_video_id',$id)->FirstOrFail();
        if(!empty($video)){
            Storage::disk('home_video')->delete($home_video->video);
            $video_name=$video_name.'.'.$request->file('video')->getClientOriginalExtension();
            $home_video->video=$video_name;
            Storage::disk('home_video')->put($video_name, File::get($video));
        }
        if($cover_photo){
            Storage::disk('home_cover')->delete($home_video->home_cover);
            $photo_name=$video_name.'.'.$request->file('home_cover')->getClientOriginalExtension();
            $home_video->home_cover=$photo_name;
            Storage::disk('home_cover')->put($photo_name, File::get($cover_photo));
        }
        $home_video->name=$request['name'];
        $home_video->update();
        return redirect('admin/home_video');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
