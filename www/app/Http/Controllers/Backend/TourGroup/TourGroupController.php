<?php

namespace App\Http\Controllers\Backend\TourGroup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourGroup\TourGroup;
use App\Models\Package\Package;
use App\Models\TourLeader\TourLeader;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class TourGroupController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:tour_group-list|tour_group-create|tour_group-edit|tour_group-delete', ['only' => ['index','store']]);
         $this->middleware('permission:tour_group-create', ['only' => ['create','store']]);
         $this->middleware('permission:tour_group-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:tour_group-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_tour_group=TourGroup::orderBy('created_at','DESC')->count();
        $packages=Package::all();
        $tour_group=TourGroup::orderBy('created_at','DESC')->paginate(30);
        $tour_leader=TourLeader::all();
        return view('backend.tour_group.index',compact('tour_leader','tour_group','packages','count_tour_group'));
    }

    public function search(Request $request)
    {
        $tour_leader_id=$request['tour_leader_id'];
        $package_id=$request['package_id'];

        $count_tour_group=TourGroup::orderBy('created_at','DESC')->count();
        $packages=Package::all();
        $tour_leader=TourLeader::all();
        $tour_group=TourGroup::orderBy('created_at','DESC')
        ->where("tour_leader_id","LIKE","%$tour_leader_id%")
        ->where("package_id","LIKE","%$package_id%")
        ->paginate(30);  
        return view('backend.tour_group.index',compact('tour_leader','tour_group','packages','count_tour_group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages=Package::all();
        $tour_leader=TourLeader::all();
        return view('backend.tour_group.create',compact('packages','tour_leader'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TourGroup::create($request->all());
        return redirect('admin/tour_group');
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
        $tour_leader=TourLeader::all();
        $tour_group=TourGroup::findOrFail($id);
        $packages=Package::all();
        return view('backend.tour_group.edit',compact('tour_group','tour_leader','packages')); 
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
        TourGroup::find($id)->update($request->all());
        return redirect('admin/tour_group');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TourGroup::destroy($id);
        return redirect('admin/tour_group');
    }
}
