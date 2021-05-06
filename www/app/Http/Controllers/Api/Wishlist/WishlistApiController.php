<?php

namespace App\Http\Controllers\Api\Wishlist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Wishlist\Wishlist;
use App\Models\Package\Package;
use App\Models\Customer\Customer;


class WishlistApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function user(Request $request)
    {
        $customer_id=$request['customer_id'];
        // $wishlist=DB::table('wishlists')
        //     ->join('packages','packages.package_id','=','wishlists.package_id')
        //     // ->join('customers','customers.customer_id','=','wishlists.customer_id')
        //     ->where(['customer_id' => $customer_id])
        //     ->get();
        $wishlist=Wishlist::with(['customer','package','package.package_image'])->where('customer_id',$customer_id)->get();
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
        $package_id=$request['package_id'];
        $wishlist=new Wishlist();
        $wishlist->customer_id=$customer_id;
        $wishlist->package_id=$package_id;
        $wishlist->save();
        return response()->json(['status'=>'success','message' => 'the wishlist have been updated','value'=>$wishlist]);    
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
        $package_id=$request['package_id'];
        $wishlist=Wishlist::where('customer_id',$customer_id)->where('package_id',$package_id)->first();
        if($wishlist){
            $wishlist->delete();
            return response()->json(['status'=>'success','message' => 'the wishlist have been deleted']);
        }else{
            return response()->json(['status'=>'fail','message' => 'userid or productid and Both id not same.Please Checke!']);
        }
    }
}
