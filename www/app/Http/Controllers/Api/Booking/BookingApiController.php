<?php

namespace App\Http\Controllers\Api\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking\Booking;
use App\Models\Booking\BookingStatus;
use Illuminate\Support\Facades\DB;
use App\Models\Customer\Customer;
use App\Models\Package\Package;

class BookingApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //booking
        $customer_id=$request['customer_id'];
        $booking_id=$request['booking_id'];
        // $booking=Booking::with(['customer','package','package.package_image','status'])->where('customer_id',$customer_id)->where('booking_id',$booking_id)->get();
        $booking=Booking::with(['package','package.package_image','status'])->where('customer_id',$customer_id)->where('booking_id',$booking_id)->get();
        return response()->json($booking);
    }
    public function history(Request $request)
    {
        $customer_id=$request['customer_id'];
        // $customer=Booking::with(['customer','package','package.package_image','status'])->where('customer_id',$request['customer_id'])->get();
        $customer=Booking::with(['status'])->where('customer_id',$request['customer_id'])->get();
        $data=$customer->unique('booking_id');
        $data1=$data->values()->all();
        return response()->json($data1);
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
        $note=$request['note'];

        $package_id=$request['package_id'];
        $total_price=$request['total_price'];

        $twin_share_room_price=$request['twin_share_room_price'];
        $single_room_price=$request['single_room_price'];
        $extra_bed_price=$request['extra_bed_price'];
        $without_extra_bed_price=$request['without_extra_bed_price'];
        $qty_men=$request['qty_men'];
        $qty_child=$request['qty_child'];

        $bstatus_id="1";
        $booking_status=BookingStatus::findOrFail($bstatus_id);

        $packages=Package::findOrFail($package_id);
        $package_name=$packages->package_name_mm;
        $tour_code=$packages->tour_code;

        $customers=Customer::findOrFail($customer_id);
        $customer_name=$customers->name;

        $booking_id=uniqid();

        $booking=$request->booking_list;
        if(!empty($booking)){
            $bookings[]=json_decode($booking,true);
            foreach ($bookings as $book) {
                foreach ($book as $key=>$value){
                    $first_name=$value['first_name'];
                    $last_name=$value['last_name'];
                    $email=$value['email'];
                    $nationality=$value['nationality'];
                    $passport_number=$value['passport_number'];
                    $issue_date=$value['issue_date'];
                    $expire_date=$value['expire_date'];
                    $phone=$value['phone'];

                    Booking::create([
                        "booking_id"=>$booking_id,
                        "customer_id"=>$customer_id,
                        "customer_name"=>$customer_name,
                        "package_id"=>$package_id,
                        "package_name"=>$package_name,
                        "tour_code"=>$tour_code,
                        "first_name"=>$first_name,
                        "last_name"=>$last_name,
                        "nationality"=>$nationality,
                        "passport_number"=>$passport_number,
                        "issue_date"=>$issue_date,
                        "expire_date"=>$expire_date,
                        "email"=>$email,
                        "phone"=>$phone,
                        "total_price"=>$total_price,
                        "twin_share_room_price"=>$twin_share_room_price,
                        "single_room_price"=>$single_room_price,
                        "extra_bed_price"=>$extra_bed_price,
                        "without_extra_bed_price"=>$without_extra_bed_price,
                        "qty_men"=>$qty_men,
                        "qty_child"=>$qty_child,
                        "note"=>$note,
                        "booking_status_id"=>$booking_status->booking_status_id,
                        "booking_status_name"=>$booking_status->name,
                    ]);
                }
            }
        }
        return response()->json(['status'=>'success','message'=>'your order created successful','booking_id'=>$booking_id]);
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

