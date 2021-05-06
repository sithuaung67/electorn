<?php

namespace App\Http\Controllers\Backend\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Noti\Notification;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class NotificationController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:notification-list|notification-create|notification-edit|notification-delete', ['only' => ['index','store']]);
         $this->middleware('permission:notification-create', ['only' => ['create','store']]);
         $this->middleware('permission:notification-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:notification-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_notification=Notification::orderBy('created_at','DESC')->count();
        $notification=Notification::orderBy('created_at','DESC')->paginate(30);
        return view('backend.notification.index',compact('notification','count_notification'));
    }

    public function view($id)
    {
        $notification=Notification::findOrFail($id);
        return view('backend.notification.view',compact('notification'));
    }

    public function search(Request $request)
    {
        $title=$request['title'];

        $count_notification=Notification::orderBy('created_at','DESC')->count();
        $notification=Notification::orderBy('created_at','DESC')
        ->where("title","LIKE","%$title%")
        ->paginate(30);  
        return view('backend.notification.index',compact('notification','count_notification'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.notification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Notification::create($request->all());

        $image_one=$request->file('image');
        $name_one=time();

        $noti=new Notification();
        if(!empty($image_one)){ 
            $image_name=$name_one.'.'.$request->file('image')->getClientOriginalExtension();
            $noti->image=$image_name;
            Storage::disk('noti')->put($image_name, File::get($image_one));
        }
        $noti->title=$request['title'];
        $noti->message=$request['message'];
        $noti->all=$request['all'];
        $noti->save();
        return redirect('admin/notification');
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
        $notification=Notification::findOrFail($id);
        return view('backend.notification.edit',compact('notification'));
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
        // Notification::find($id)->update($request->all());
        $noti=Notification::where('notification_id',$id)->first();
        if($request->image){
            Storage::disk('noti')->delete($noti->image);
            $image=$request->file('image');
            $name=time();
            $image_name_one=$name.'.'.$request->file('image')->getClientOriginalExtension();
            $noti->image=$image_name_one;
            Storage::disk('noti')->put($image_name_one, File::get($image));
        }
        $noti->title=$request['title'];
        $noti->message=$request['message'];
        $noti->all=$request['all'];
        $noti->update();
        return redirect('admin/notification');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Notification::destroy($id);
        $notification=Notification::where('notification_id',$id)->FirstOrFail();
        Storage::disk('noti')->delete($notification->image);
        $notification->delete();
        return redirect('admin/notification');
    }
}