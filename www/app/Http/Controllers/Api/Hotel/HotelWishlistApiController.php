<?php

namespace App\Http\Controllers\Api\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel\HotelWishlist;
use App\Models\Hotel\Hotel;
use App\Models\Customer\Customer;
use Illuminate\Support\Facades\DB;

class HotelWishlistApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer_id=$request['customer_id'];
        $wishlist=HotelWishlist::with(['hotel','hotel.room','hotel.hotel_image'])->where('customer_id',$customer_id)->get();
        return response()->json($wishlist);
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
        $customer_id=$request['customer_id'];
        $hotel_id=$request['hotel_id'];
        $wishlist=new HotelWishlist();
        $wishlist->customer_id=$customer_id;
        $wishlist->hotel_id=$hotel_id;
        $wishlist->save();
        return response()->json(['status'=>'success','message' => 'the hotel wishlist have been create','value'=>$wishlist]);
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
    public function destroy(Request $request)
    {
        $customer_id=$request['customer_id'];
        $hotel_id=$request['hotel_id'];
        $wishlist=HotelWishlist::where('customer_id',$customer_id)->where('hotel_id',$hotel_id)->first();
        if($wishlist){
            $wishlist->delete();
            return response()->json(['status'=>'success','message' => 'the hotel wishlist have been deleted']);
        }else{
            return response()->json(['status'=>'fail','message' => 'userid or productid and Both id not same.Please Checke!']);
        }
    }
}
