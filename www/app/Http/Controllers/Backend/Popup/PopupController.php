<?php

namespace App\Http\Controllers\Backend\Popup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Popup\Popup;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PopupController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:popup-list|popup-create|popup-edit|popup-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:popup-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:popup-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:popup-delete', ['only' => ['destroy']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popup=Popup::orderBy('created_at','DESC')->get();
        return view('backend.popup.index',compact('popup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.popup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $popup=new Popup();

        $image=$request->file('image');
        $image_name=time();
        if($image)
        {
            $pname = $image_name.'.'.$image->getClientOriginalExtension();
            $popup->image=$pname;
            Storage::disk('popup')->put($pname, File::get($image));
        }
        $popup->status=$request['status'];
        $popup->body=$request['body'];
        $popup->save();
        $request->session()->flash('alert-success', 'booking was successful create!');
        return redirect('admin/popup');
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
        $popup=Popup::findOrFail($id);
        return view('backend.popup.edit',compact('popup'));
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
        $popup=Popup::where('popup_id',$id)->first();
        $image=$request->file('image');
        $image_name=time();
        if($image)
        {
            Storage::disk('popup')->delete($popup->image);

            $pname = $image_name.'.'.$image->getClientOriginalExtension();
            $popup->image=$pname;
            Storage::disk('popup')->put($pname, File::get($image));
        }

        $popup->status=$request['status'];
        $popup->body=$request['body'];
        $popup->update();
        $request->session()->flash('alert-success', 'popup was successful update!');
        return redirect('admin/popup');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $popup=Popup::where('popup_id',$id)->first();
        Storage::disk('popup')->delete($popup->image);
        $popup->delete();
        $request->session()->flash('alert-danger', 'popup was successful delete!');
        return redirect()->back();
    }
}
