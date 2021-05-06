<?php

namespace App\Http\Controllers\Api\Feedback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback\Feedback;
use App\Models\Feedback\PackageFeedback;
use App\Models\Booking\Booking;
use App\Models\Package\Package;
use Illuminate\Support\Facades\DB;


class FeedBackApiController extends Controller
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
        $feedback=Feedback::create($request->all());
        if(!empty($feedback)){
        return response()->json(['status'=>'success','message'=>'successfull feedback create']);            
        }
        return response()->json(['status'=>'fail','message'=>'pleace check your feedback data!']);            
    }

    public function package_store(Request $request)
    {
        $feedback=PackageFeedback::create($request->all());
        if($feedback){
        return response()->json(['status'=>'success','message'=>'successfull feedback create','feedback'=>$feedback]);            
        }
        return response()->json(['status'=>'fail','message'=>'pleace check your feedback data!']);            
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
    public function edit(Request $request)
    {
        $customer_id=$request['customer_id'];
        $booking=DB::table('bookings')
            ->join('packages','packages.package_id','=','bookings.package_id')
            ->where(['customer_id' => $customer_id,'status'=>"1"])
            ->get();            
            if($booking=="[]"){
                return response()->json(['status'=>'fail','message'=>'not has end package','package'=>$booking]);
            }else{
                $data=$booking->unique('booking_id');
                $data1=$data->values()->last();
                $packagefeedback=PackageFeedback::where('package_id',$data1->package_id)->where('customer_id',$customer_id)->first();
                if($packagefeedback){
                    return response()->json(['status'=>'success','message'=>'successfull package feedback','package'=>$packagefeedback]);
                }else{
                    return response()->json(['status'=>'fail','message'=>'not has package feedback','package'=>$packagefeedback]);
                }
            } 
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
