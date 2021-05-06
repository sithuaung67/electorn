<?php

namespace App\Http\Controllers\Backend\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel\Hotel;
use App\Models\Hotel\HotelWishlist;
use App\Models\Customer\Customer;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class HotelWishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels=Hotel::all();
        $customers=Customer::all();
        $count_wishlist=HotelWishlist::orderBy('created_at','DESC')->count();
        $hotel_wishlist=HotelWishlist::orderBy('created_at','DESC')->paginate(30);
        return view('backend.hotel.wishlist.index',compact('hotel_wishlist','customers','count_wishlist','hotels'));
    }

    public function search(Request $request)
    {
        $hotel_id=$request['hotel_id'];
        $customer_id=$request['customer_id'];

        $hotels=Hotel::all();
        $customers=Customer::all();
        $count_wishlist=HotelWishlist::orderBy('created_at','DESC')->count();
        $hotel_wishlist=HotelWishlist::orderBy('created_at','DESC')
        ->where("hotel_id","LIKE","%$hotel_id%")
        ->where("customer_id","LIKE","%$customer_id%")
        ->paginate(30);  
        return view('backend.hotel.wishlist.index',compact('hotel_wishlist','customers','count_wishlist','hotels'));
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
