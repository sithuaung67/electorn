<?php

namespace App\Http\Controllers\Api\Explore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Join\Join;
use App\Models\Country\Country;
use App\Models\Destination\Destination;
use App\Models\Package\Package;
use App\Models\Blog\TravelBlog;
use App\Models\Blog\BlogDestination;
use Illuminate\Support\Facades\DB;


class ExploreApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $country_name=$request['country_name'];
        $countries=Country::with(['destination'])
        ->where("country_name","LIKE","%$country_name%")->get();
        return response()->json($countries);
    }
    public function search_destination(Request $request)
    {
        $destination_name=$request['country_name'];
        $destinations=Destination::where("destination_name","LIKE","%$destination_name%")->get();
        return response()->json($destinations);
    }
    public function destination_click(Request $request)
    {
        $customer_id=$request['customer_id'];
        $destination_id=$request['destination_id'];
        // $join_table=DB::table('joins')
        // ->join('packages','packages.package_id','=','joins.package_id')
        // // ->join('wishlists','wishlists.package_id','=','packages.package_id')
        // ->where(['destination_id' => $destination_id])
        // ->get();
        $join_table=Join::with(['package','package.package_image','package.wishlist'=> function($wishlis) use ($customer_id){
        $wishlis->where('customer_id',$customer_id);}])->where('destination_id',$destination_id)->get();

        // $travel_blog=TravelBlog::where('destination_id',$destination_id)->get();
        $blog_destination=BlogDestination::with(['travel_blog'])->where('destination_id',$destination_id)->first();

        return response()->json(["package"=>$join_table,"travel_blog"=>$blog_destination]);
    }
    public function country()
    {
        $counties=Country::with(['destination'])->has('destination')->get();
        return response()->json($counties);
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
        //
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
        //
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
