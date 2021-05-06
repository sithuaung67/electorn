<?php

namespace App\Http\Controllers\Api\HotDeal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\TravelBlog;
use App\Models\Package\Package;


class HotDealApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer_id=$request['customer_id'];
        $discount_package['name']="Hot Deals";
        $discount_package['list']=Package::with(['package_image','wishlist'=> function($wishlis) use ($customer_id){
        $wishlis->where('customer_id',$customer_id);}])->where('is_discount',1)->limit(10)->inRandomOrder()->get();

        $blog['name']="Travel Blogs";
        $blog['list']=TravelBlog::orderBy('created_at','desc')->limit(10)->get();
        $total=collect([$discount_package,$blog]);
        return response()->json($total);
    }

    public function recent_view(Request $request)
    {
        $customer_id=$request['customer_id'];
        $package=$request->package_list;
        $packages=json_decode($package,true);
        foreach ($packages as $pack) 
        {
            $package_id[]=$pack['package_id'];
            $package=Package::with(['package_image','wishlist'=> function($wishlis) use ($customer_id){
        $wishlis->where('customer_id',$customer_id);}])->whereIn('package_id',$package_id)->orderByRaw(\DB::raw("FIELD(package_id,".implode(",", $package_id).")"))->get();
            // $package = Package::select('*')
            //   ->whereIn('package_id', $package_id)
            //   ->orderByRaw(\DB::raw("FIELD(package_id, ".implode(",",$package_id).")"))
            //   ->get();
        }
        return response()->json($package);
    }
    public function package_all(Request $request)
    {
        $customer_id=$request['customer_id'];
        $start=$request->start;
        if($start!=null){
            $packages=Package::with(['package_image','wishlist'=> function($wishlis) use ($customer_id){
            $wishlis->where('customer_id',$customer_id);}])->limit(25)->offset($start)->get()->shuffle()->all();
            return response()->json($packages);
        }
    }
    public function travel_blog_all()
    {
        $bogs=TravelBlog::all();
        return response()->json($bogs);
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
