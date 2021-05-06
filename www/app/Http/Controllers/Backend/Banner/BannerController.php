<?php

namespace App\Http\Controllers\Backend\Banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Banner\Banner;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner=Banner::orderBy('id','DESC')->get();
        return view('backend.banner.index',compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image=$request->file('image');
        $photo_name=time();

        $banner=new Banner();
        $image_name=$photo_name.'.'.$request->file('image')->getClientOriginalExtension();
        $banner->image=$image_name;
        Storage::disk('banner')->put($image_name, File::get($image));
        $banner->save();
        return redirect('admin/banner');
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
        $banner=Banner::findOrFail($id);
        return view('backend.banner.edit',compact('banner'));
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
        $image=$request->file('image');
        $photo_name=time();

        $banner=Banner::where('id',$id)->FirstOrFail();
        if(!empty($image)){
            Storage::disk('banner')->delete($banner->image);
            $image_name=$photo_name.'.'.$request->file('image')->getClientOriginalExtension();
            $banner->image=$image_name;
            Storage::disk('banner')->put($image_name, File::get($image));
        }
        $banner->update();
        return redirect('admin/banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner=Banner::where('id',$id)->FirstOrFail();
        Storage::disk('banner')->delete($banner->image);
        $banner->delete();
        return redirect('admin/banner');
    }
}
