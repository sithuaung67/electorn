<?php

namespace App\Http\Controllers\Backend\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country\Country;
use App\Models\Destination\Destination;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class CountryController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:country-list|country-create|country-edit|country-delete', ['only' => ['index','store']]);
         $this->middleware('permission:country-create', ['only' => ['create','store']]);
         $this->middleware('permission:country-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:country-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_country=Country::orderBy('created_at','DESC')->count();
        $country=Country::orderBy('created_at','DESC')->paginate(20);
        return view('backend.country.index',compact('country','count_country'));
    }

    public function search(Request $request)
    {
        $country_name=$request['country_name'];

        $count_country=Country::orderBy('created_at','DESC')->count();
        $country=Country::orderBy('created_at','DESC')
        ->where("country_name","LIKE","%$country_name%")
        ->paginate(20);  
        return view('backend.country.index',compact('country','count_country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image=$request->file('country_image');
        $name=time();

        $country=new Country();
        $image_name=$name.'.'.$request->file('country_image')->getClientOriginalExtension();
        $country->country_image=$image_name;
        Storage::disk('country')->put($image_name, File::get($image));
        $country->country_name=$request['country_name'];
        $country->save();
        return redirect('admin/country');
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
        $country=Country::findOrFail($id);
        return view('backend.country.edit',compact('country'));
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

        $country=Country::where('country_id',$id)->first();
        if($request->country_image){
            Storage::disk('country')->delete($country->country_image);
            $image=$request->file('country_image');
            $name=time();
            $image_name=$name.'.'.$request->file('country_image')->getClientOriginalExtension();
            $country->country_image=$image_name;
            Storage::disk('country')->put($image_name, File::get($image));
        }
        $country->country_name=$request['country_name'];
        $country->update();
        
        return redirect('admin/country');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country=Country::where('country_id',$id)->FirstOrFail();
        Storage::disk('country')->delete($country->country_image);
        $country->delete();

        // $destination=Destination::where('country_id',$id)->FirstOrFail();
        // Storage::disk('destination')->delete($destination->destination_image);
        // $destination->delete(); 

        return redirect('admin/country');
    }
}
