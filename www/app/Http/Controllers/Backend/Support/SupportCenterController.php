<?php

namespace App\Http\Controllers\Backend\Support;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\SupportCenter\SupportCenter;

class SupportCenterController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:support_center-list|support_center-create|support_center-edit|support_center-delete', ['only' => ['index','store']]);
         $this->middleware('permission:support_center-create', ['only' => ['create','store']]);
         $this->middleware('permission:support_center-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:support_center-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $support_center=SupportCenter::orderBy('id','DESC')->get();
        return view('backend.support_center.index',compact('support_center'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.support_center.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SupportCenter::create($request->all());
        return redirect('admin/support_center');
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
        $support_center=SupportCenter::findOrFail($id);
        return view('backend.support_center.edit',compact('support_center'));
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
        SupportCenter::find($id)->update($request->all());
        return redirect('admin/support_center');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SupportCenter::destroy($id);
        return redirect('admin/support_center');
    }
}
