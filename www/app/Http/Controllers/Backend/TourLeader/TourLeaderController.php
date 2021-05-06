<?php

namespace App\Http\Controllers\Backend\TourLeader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourLeader\TourLeader;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class TourLeaderController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:tour_leader-list|tour_leader-create|tour_leader-edit|tour_leader-delete', ['only' => ['index','store']]);
         $this->middleware('permission:tour_leader-create', ['only' => ['create','store']]);
         $this->middleware('permission:tour_leader-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:tour_leader-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_tour_leader=TourLeader::orderBy('created_at','desc')->count();
        $tour_leader=TourLeader::orderBy('created_at','DESC')->paginate(30);
        return view('backend.tour_leader.index',compact('tour_leader','count_tour_leader'));
    }

    public function search(Request $request)
    {
        $name=$request['name'];
        $tour_user_name=$request['tour_user_name'];
        $contact_phone=$request['contact_phone'];

        $count_tour_leader=TourLeader::orderBy('created_at','desc')->count();
        $tour_leader=TourLeader::orderBy('created_at','DESC')
        ->where("name","LIKE","%$name%")
        ->where("tour_user_name","LIKE","%$tour_user_name%")
        ->where("contact_phone","LIKE","%$contact_phone%")
        ->paginate(30);  
        return view('backend.tour_leader.index',compact('tour_leader','count_tour_leader'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tour_leader.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tour_leader=new TourLeader();
        if($request->image){
            $image=$request->file('image');
            $name=time();
            $image_name=$name.'.'.$request->file('image')->getClientOriginalExtension();
            $tour_leader->image=$image_name;
            Storage::disk('customer')->put($image_name, File::get($image));
        }
        $tour_leader->name=$request['name'];
        $tour_leader->tour_user_name=$request['tour_user_name'];
        $tour_leader->contact_phone=$request['contact_phone'];
        $tour_leader->password=$request['password'];
        $tour_leader->save();
        return redirect('admin/tour_leader');
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
        $tour_leader=TourLeader::findOrFail($id);
        return view('backend.tour_leader.edit',compact('tour_leader'));
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
        $tour_leader=TourLeader::where('tour_leader_id',$id)->first();
        if($request->image){
            Storage::disk('customer')->delete($tour_leader->image);
            $image=$request->file('image');
            $name=time();
            $image_name=$name.'.'.$request->file('image')->getClientOriginalExtension();
            $tour_leader->image=$image_name;
            Storage::disk('customer')->put($image_name, File::get($image));
        }
        $tour_leader->name=$request['name'];
        $tour_leader->tour_user_name=$request['tour_user_name'];
        $tour_leader->contact_phone=$request['contact_phone'];
        $tour_leader->password=$request['password'];
        $tour_leader->update();
        return redirect('admin/tour_leader');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tour_leader=TourLeader::where('tour_leader_id',$id)->FirstOrFail();
        Storage::disk('customer')->delete($tour_leader->image);
        $tour_leader->delete();
        return redirect('admin/tour_leader');
    }
}
