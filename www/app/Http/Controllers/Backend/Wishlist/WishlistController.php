<?php

namespace App\Http\Controllers\Backend\Wishlist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package\Package;
use App\Models\Wishlist\Wishlist;
use App\Models\Customer\Customer;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
// use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:wishlist-list', ['only' => ['index','store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages=Package::all();
        $customers=Customer::all();
        $count_wishlist=Wishlist::orderBy('created_at','DESC')->count();
        $wishlist=Wishlist::orderBy('created_at','DESC')->paginate(30);
        // $wishlist=DB::select("SELECT package_id,COUNT(package_id) AS count FROM wishlists GROUP BY package_id ORDER BY COUNT(package_id) DESC;");
        // dd($wishlist);
        return view('backend.wishlist.index',compact('wishlist','customers','count_wishlist','packages'));
    }

    public function search(Request $request)
    {
        $package_id=$request['package_id'];
        $customer_id=$request['customer_id'];

        $packages=Package::all();
        $customers=Customer::all();
        $count_wishlist=Wishlist::orderBy('created_at','DESC')->count();
        $wishlist=Wishlist::orderBy('created_at','DESC')
        ->where("package_id","LIKE","%$package_id%")
        ->where("customer_id","LIKE","%$customer_id%")
        ->paginate(30);  
        return view('backend.wishlist.index',compact('wishlist','customers','count_wishlist','packages'));
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
