<?php

namespace App\Http\Controllers\Api\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer\Customer;
use App\Models\TourLeader\TourLeader;
use App\Models\TourGroup\TourGroup;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class LoginApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers=Customer::all();
        return response()->json($customers);

    }
    public function tour_leader_login(Request $request)
    {
        $tour_user_name=$request['tour_user_name'];
        $password=$request['password'];
        $tour_leader=TourLeader::where('tour_user_name',$tour_user_name)->where('password',$password)->first();
        
        if(!empty($tour_leader)){
            $tour_leader->fcm_token=$request['fcm_token'];
            $tour_leader->update();
            return response()->json(['status'=>'success','message' => 'login successfull user login','tour_leader'=>$tour_leader]);
        }else {
            return response()->json(['status'=>'fail','message' => 'user name and password are not same please check!']);
        }
    }
    public function tour_leader_package(Request $request)
    {
        $tour_leader_id=$request['tour_leader_id'];
        $tour_leader=TourLeader::where('tour_leader_id',$tour_leader_id)->first();
        if(!empty($tour_leader)){
            $tour_group=TourGroup::with(['package','package.package_image'])->where('tour_leader_id',$tour_leader_id)->get();
            return response()->json(['status'=>'success','message' => 'tour leader id the same','TourGroup'=>$tour_group]);
        }else {
            return response()->json(['status'=>'fail','message' => 'tour leader id not same please check!']);
        }

    }
    public function tour_leader_update(Request $request)
    {
        $name=$request['name'];
        $contact_phone=$request['contact_phone'];
        $image=$request['image'];
        $base_code_of_photo=base64_decode($image);
        $pname=time().'.png';

        $tour_leader_id=$request['tour_leader_id'];
        $tour_leader=TourLeader::where('tour_leader_id',$tour_leader_id)->first();
        if(!empty($tour_leader)){
            if($image){
                if(!empty($tour_leader->image)){
                     Storage::disk('customer')->delete($tour_leader->image);
                }
                $tour_leader->image=$pname;
                file_put_contents('uploads/customer/'.$pname,$base_code_of_photo);
            }
            $tour_leader->name=$name;
            $tour_leader->contact_phone=$contact_phone;
            $tour_leader->update();
            return response()->json(['status'=>'success','message' => 'the tour leader have been update','value'=>$tour_leader]);
        }else{
            return response()->json(['status'=>'fail','message' => 'tour leader id not same please check!']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $customer_type=$request['customer_type'];
        $name=$request['name'];
        $phone_email_google=$request['phone_email_google'];
        $gmail=$request['gmail'];
        $phone=$request['phone'];
        $birthday=$request['birthday'];
        $passport_number=$request['passport_number'];
        $issue_date=$request['issue_date'];
        $expire_date=$request['expire_date'];
        $total_point=$request['total_point'];

        $image=$request->file('customer_image');
        $base_code_of_photo=base64_decode($image);
        $pname=time().'.png';
        file_put_contents('uploads/customer/'.$pname,$base_code_of_photo);


        $customer=Customer::where('phone_email_google',$phone_email_google)->first();

        if($customer!=null){
            $customer->fcm_token=$request['fcm_token'];
            $customer->update();
            return response()->json(['status'=>'Already','message' => 'this is customer already exit','value'=>$customer]);
        }else{
            $customer=new Customer();
            if($image){
                $customer->customer_image=$pname;
            }
            $customer->customer_type=$customer_type;
            $customer->name=$name;
            $customer->phone_email_google=$phone_email_google;
            $customer->gmail=$gmail;
            $customer->phone=$phone;
            $customer->birthday=$birthday;
            $customer->passport_number=$passport_number;
            $customer->issue_date=$issue_date;
            $customer->expire_date=$expire_date;
            $customer->total_point=$total_point;
            $customer->fcm_token=$request['fcm_token'];
            $customer->save();
            return response()->json(['status'=>'success','message' => 'the user have been create','value'=>$customer]);
        }


        
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
        $customer_id=$request['customer_id'];
        $customer_type=$request['customer_type'];
        $name=$request['name'];
        $birthday=$request['birthday'];
        $passport_number=$request['passport_number'];
        $gmail=$request['gmail'];
        $phone=$request['phone'];
        $issue_date=$request['issue_date'];
        $expire_date=$request['expire_date'];
        $total_point=$request['total_point'];

        $image=$request['customer_image'];
        $base_code_of_photo=base64_decode($image);
        $pname=time().'.png';
        

        $customer=Customer::where('customer_id','=',$customer_id)->first();
        if($image){
            if(!empty($customer->customer_image)){
                 Storage::disk('customer')->delete($customer->customer_image);
            }
            $customer->customer_image=$pname;
            file_put_contents('uploads/customer/'.$pname,$base_code_of_photo);
        }
        $customer->customer_type=$customer_type;
        $customer->name=$name;
        $customer->birthday=$birthday;
        $customer->passport_number=$passport_number;
        $customer->gmail=$gmail;
        $customer->phone=$phone;
        $customer->issue_date=$issue_date;
        $customer->expire_date=$expire_date;
        $customer->total_point=$total_point;
        $customer->update();
        return response()->json(['status'=>'success','message' => 'the user have been update','value'=>$customer]);
    }

    public function support_center(){
        $supposrt_center=SupportCenter::all();
        return response()->json($supposrt_center);
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
