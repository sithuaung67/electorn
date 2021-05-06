<?php

namespace App\Http\Controllers\Api\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel\Hotel;
use App\Models\Blog\TravelBlog;


class HotelApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer_id=$request['customer_id'];
        $hotel['name']="Hotel Hot Deals";
        $hotel['list']=Hotel::with(['hotel_image','room','hotel_wishlist'=> function($wishlis) use ($customer_id){
        $wishlis->where('customer_id',$customer_id);}])->limit(10)->inRandomOrder()->get();

        $blog['name']="Travel Blogs";
        $blog['list']=TravelBlog::orderBy('created_at','desc')->limit(10)->get();
        $total=collect([$hotel,$blog]);
        return response()->json($total);
    }

    public function test(Request $request)
    {
        // $client=new \GuzzleHttp\Client();
        // $req=$client->request('POST','http://139.59.98.160/api/hotdeals?customer_id=1');
        // $res=json_decode($req->getBody());
        // return response()->json($res);
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://affiliateapi7643.agoda.com/affiliateservice/lt_v1', [
            'form_params' => [
                // 'siteid' => '1843808',
                // 'apikey'=> '06881969-ffda-4f9b-a992-64ad9776d826',
                'siteid' => '123456',
                'apikey'=> '00000000-0000-0000-0000-000000000000',
            ]
        ]);
        $response = json_decode($response->getBody());
        foreach ($response as $key => $value) {
            
        }
        // $aa=$value->list;
        // foreach ($aa as $key => $value1) {
            
        // $bb[]=$value1->travel_blog_name_mm;
        // }
        return response()->json($value);
    }

    // public function test(Request $request)
    // {
    //     $client=new \GuzzleHttp\Client();
    //     $req=$client->request('POST','http://139.59.98.160/api/hotdeals?customer_id=1');
    //     $res=json_decode($req->getBody());
    //     // return response()->json($res);
    //     // $client = new \GuzzleHttp\Client();
    //     // $response = $client->request('POST', 'http://139.59.98.160/api/hotdeals', [
    //     //     'form_params' => [
    //     //         'customer_id' => '1',
    //     //     ]
    //     // ]);
    //     // $response = json_decode($response->getBody());
    //     foreach ($res as $key => $value) {
            
    //     }
    //     $aa=$value->list;
    //     foreach ($aa as $key => $value1) {
            
    //     $bb[]=$value1->travel_blog_name_mm;
    //     }
    //     return response()->json($bb);
    // }

    public function hotel_all(Request $request)
    {
        $customer_id=$request['customer_id'];
        $start=$request->start;
        if($start!=null){
            $hotels=Hotel::with(['hotel_image','room','hotel_wishlist'=> function($wishlis) use ($customer_id){
            $wishlis->where('customer_id',$customer_id);}])->limit(25)->offset($start)->get()->shuffle()->all();
            return response()->json($hotels);
        }
    }
    public function search(Request $request)
    {
        $customer_id=$request['customer_id'];
        $township=$request['township'];
        $hotels=Hotel::with(['hotel_image','room','hotel_wishlist'=> function($wishlis) use ($customer_id){
            $wishlis->where('customer_id',$customer_id);}])->orderBy('created_at','DESC')
        ->where("township","LIKE","%$township%")
        ->orwhere("hotel_name","LIKE","%$township%")
        ->get();
        return response()->json($hotels);
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
