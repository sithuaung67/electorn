<?php

namespace App\Http\Controllers\Backend\JoinTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Join\Join;
use App\Models\Destination\Destination;
use App\Models\Package\Package;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class JoinTableController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:join_table-list|join_table-create|join_table-edit|join_table-delete', ['only' => ['index','store']]);
         $this->middleware('permission:join_table-create', ['only' => ['create','store']]);
         $this->middleware('permission:join_table-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:join_table-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages=Package::all();
        $destinations=Destination::all();
        $join_table=Join::orderBy('created_at','DESC')->paginate(30);
        $count_join_table=Join::orderBy('created_at','DESC')->count();
        return view('backend.join_table.index',compact('packages','destinations','join_table','count_join_table'));
    }

    public function search(Request $request)
    {
        $destination_id=$request['destination_id'];
        $package_id=$request['package_id'];

        $packages=Package::all();
        $destinations=Destination::all();
        $count_join_table=Join::orderBy('created_at','DESC')->count();
        $join_table=Join::orderBy('created_at','DESC')
        ->where("destination_id","LIKE","%$destination_id%")
        ->where("package_id","LIKE","%$package_id%")
        ->paginate(30);  
        return view('backend.join_table.index',compact('packages','destinations','join_table','count_join_table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages=Package::all();
        $destinations=Destination::all();
        $join_table=Join::all();
        return view('backend.join_table.create',compact('packages','destinations','join_table'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Join::create($request->all());
        return redirect('admin/join_table');
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
        $packages=Package::all();
        $destinations=Destination::all();
        $join_table=Join::findOrFail($id);
        return view('backend.join_table.edit',compact('join_table','packages','destinations'));
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
        Join::find($id)->update($request->all());
        return redirect('admin/join_table');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Join::destroy($id);
        return redirect('admin/join_table');
    }
}
