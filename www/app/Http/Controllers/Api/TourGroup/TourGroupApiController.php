<?php

namespace App\Http\Controllers\Api\TourGroup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourGroup\TourGroup;
use App\Models\Package\Package;
use App\Models\Customer\Customer;
use App\Models\Booking\Booking;

class TourGroupApiController extends Controller
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
    public function update(Request $request)
    {
        $tour_leader_id=$request['tour_leader_id'];

        $package_id=$request['package_id'];
        $packages=Package::where('package_id',$package_id)->first();

        if($packages){
            $packages->status="1";
            $packages->update();

            $booking=Booking::where('package_id',$package_id)->where('booking_status_id','2')->select('customer_id')->get();
            foreach ($booking as $key => $value) {
                $fcm_token[]=$value->customer->fcm_token;
            }

            $message  = $_POST['message'];
            $title    = $_POST['title'];
            //$key      = array('fcm_token', 'fcm_token'); //-- fcm_token from customer table
            $key      =$fcm_token;
            $feedback = array('package_id' => $package_id, 'tour_leader_id' => $tour_leader_id);

            $path_to_fcm = 'https://fcm.googleapis.com/fcm/send';
            $server_key  = 'AAAAAOeEpo4:APA91bF800KZVlLHRLg5FiYHLvZEv7hBaN3hPjEerIyel3SgSO0jMB14rDh0x2a_yQbjVkpnddnKpup0ZhfAoXvth6Z-3EBcNKwdm_5z3hGPUC4w4qJODYAFoxplASxhnlbu5Bs-TiC_';

            $header = array('Authorization:key=' . $server_key, 'Content-Type:application/json');
            // $notification = array('title' => $title, 'body' => $message);
            $data  = array('title' => $title, 'body' => $message, 'feedback' => $feedback);
            // $field = array('to' => $key, 'data' => $data);
            $field = array('registration_ids' => $key, 'data' => $data);

            $playLoad     = json_encode($field);
            $curl_session = curl_init();
            curl_setopt($curl_session, CURLOPT_URL, $path_to_fcm);
            curl_setopt($curl_session, CURLOPT_POST, true);
            curl_setopt($curl_session, CURLOPT_HTTPHEADER, $header);
            curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl_session, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            curl_setopt($curl_session, CURLOPT_POSTFIELDS, $playLoad);

            $result = curl_exec($curl_session);
            curl_close($curl_session);


        return response()->json(['status'=>'success','message'=>'Successfull TourGroup End']);            
        }
        return response()->json(['status'=>'fail','message'=>'pleace check your tour group id!']);
    }

    public function detail(Request $request)
    {
        $customer_id=$request['customer_id'];
        $customers=Customer::where('customer_id',$customer_id)->first();
        if($customers){
            return response()->json(['status'=>'success','message'=>'Successfull Detail Customer','detail'=>$customers]);            
        }else{
            return response()->json(['status'=>'fail','message'=>'pleace check your customer_id!','detail'=>$customers]);
        }
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
