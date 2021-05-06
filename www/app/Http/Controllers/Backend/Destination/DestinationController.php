<?php

namespace App\Http\Controllers\Backend\Destination;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination\Destination;
use App\Models\Country\Country;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class DestinationController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:destination-list|destination-create|destination-edit|destination-delete', ['only' => ['index','store']]);
         $this->middleware('permission:destination-create', ['only' => ['create','store']]);
         $this->middleware('permission:destination-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:destination-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_destination=Destination::orderBy('created_at','DESC')->count();
        $destination=Destination::orderBy('created_at','DESC')->paginate(20);
        $country=Country::all();
        return view('backend.destination.index',compact('destination','count_destination','country'));
    }

    public function search(Request $request)
    {
        $destination_name=$request['destination_name'];
        $country_id=$request['country_id'];
        $popular=$request['popular'];

        $count_destination=Destination::orderBy('created_at','DESC')->count();
        $country=Country::all();
        $destination=Destination::orderBy('created_at','DESC')
        ->where("destination_name","LIKE","%$destination_name%")
        ->where("country_id","LIKE","%$country_id%")
        ->where("popular","LIKE","%$popular%")
        ->paginate(20);  
        return view('backend.destination.index',compact('destination','count_destination','country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries=Country::all();
        return view('backend.destination.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image=$request->file('destination_image');
        $name=time();

        $destination=new Destination();
        $image_name=$name.'.'.$request->file('destination_image')->getClientOriginalExtension();
        $destination->destination_image=$image_name;
        Storage::disk('destination')->put($image_name, File::get($image));
        $destination->destination_name=$request['destination_name'];
        $destination->country_id=$request['country_id'];
        $destination->popular=$request['popular'];
        $destination->save();
        return redirect('admin/destination');
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
        $countries=Country::all();
        $destination=Destination::findOrFail($id);
        return view('backend.destination.edit',compact('destination','countries'));
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
        $destination=Destination::where('destination_id',$id)->first();
        if($request->destination_image){
            Storage::disk('destination')->delete($destination->destination_image);
            $image=$request->file('destination_image');
            $name=time();
            $image_name=$name.'.'.$request->file('destination_image')->getClientOriginalExtension();
            $destination->destination_image=$image_name;
            Storage::disk('destination')->put($image_name, File::get($image));
        }
        $destination->destination_name=$request['destination_name'];
        $destination->country_id=$request['country_id'];
        $destination->popular=$request['popular'];
        $destination->update();
        
        return redirect('admin/destination');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destination=Destination::where('destination_id',$id)->FirstOrFail();
        Storage::disk('destination')->delete($destination->destination_image);
        $destination->delete();
        return redirect('admin/destination');
    }
}
