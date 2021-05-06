<?php

namespace App\Http\Controllers\Api\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel\HotelBooking;
use App\Models\Hotel\HotelBookingCustomer;
use App\Models\Booking\BookingStatus;
use App\Models\Customer\Customer;
use App\Models\Hotel\Hotel;
use App\Models\Hotel\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HotelBookingApiController extends Controller
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
        $hotel_booking_id=$request['hotel_booking_id'];
        $hotel_booking=HotelBooking::where('customer_id',$customer_id)->where('hotel_booking_id',$hotel_booking_id)->get();
        $guest=HotelBookingCustomer::where('hotel_booking_id',$hotel_booking_id)->get();
        return response()->json(['hotel_booking'=>$hotel_booking,'guest'=>$guest]);
    }

    public function history(Request $request)
    {
        $customer_id=$request['customer_id'];
        $customer=HotelBooking::with(['status'])->where('customer_id',$request['customer_id'])->orderBy('created_at','DESC')->get();
        $data=$customer->unique('hotel_booking_id');
        $data1=$data->values()->all();
        return response()->json($data1);
    }

    public function nrc_image_store(Request $request)
    {
        $image=$request->file('nrc_image');
        if($image)
         {
            $name=time();          
            //get file extension
            $extension = $image->getClientOriginalExtension();
            //filename to store
            $filenametostore = $name.'_'.uniqid().'.'.$extension;
            //Upload File to external server
            Storage::disk('nrc')->put($filenametostore, fopen($image, 'r+'));
            return response()->json(['status'=>'success','messsage'=>'successfull nrc image created','value'=>'http://139.59.98.151/FTP/StarZone/Nrc/'.$filenametostore]);
        }else{
            return response()->json(['status'=>'fail','messsage'=>'image file not found']);
        }
    }

    public function passport_image_store(Request $request)
    {
        $image=$request->file('passport_image');
        if($image)
         {
            $name=time();          
            //get file extension
            $extension = $image->getClientOriginalExtension();
            //filename to store
            $filenametostore = $name.'_'.uniqid().'.'.$extension;
            //Upload File to external server
            Storage::disk('passport')->put($filenametostore, fopen($image, 'r+'));
            return response()->json(['status'=>'success','messsage'=>'successfull passport image created','value'=>'http://139.59.98.151/FTP/StarZone/Passport/'.$filenametostore]);
        }else{
            return response()->json(['status'=>'fail','messsage'=>'image file not found']);
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
        $customer_id=$request['customer_id'];
        $hotel_id=$request['hotel_id'];
        $check_in=$request['check_in'];
        $check_out=$request['check_out'];
        $price_type=$request['price_type'];
        $total_price=$request['total_price'];
        $day_count=$request['day_count'];

        $hotel_booking_id=uniqid();
        
        $customers=Customer::findOrFail($customer_id);
        $customer_name=$customers->name;

        $bstatus_id="1";
        $booking_status=BookingStatus::findOrFail($bstatus_id);

        $hotels=Hotel::findOrFail($hotel_id);
        $hotel_name=$hotels->hotel_name;
        $hotel_rating=$hotels->hotel_rating;
        $address_mm=$hotels->address_mm;
        $address_en=$hotels->address_en;

        $room_list=$request->room_list;
        if(!empty($room_list)){
            $room_lists[]=json_decode($room_list,true);
            foreach ($room_lists as $room) {
                foreach ($room as $key => $value) {
                    $room_id=$value['room_id'];
                    $room_count=$value['room_count'];
                    $extra_count=$value['extra_count'];
                    $total_room_price=$value['total_room_price'];

                    $rooms=Room::findOrFail($room_id);
                    $room_type=$rooms->room_type;
                    $room_view=$rooms->room_view;
                    $room_price_local=$rooms->room_price_local;
                    $room_price_foreign=$rooms->room_price_foreign;
                    $extra_price_local=$rooms->extra_price_local;
                    $extra_price_foreign=$rooms->extra_price_foreign;
                    $room_qty=$rooms->room_qty;
                    $extra_qty=$rooms->extra_qty;
                    $room_img=$rooms->room_img;

                    HotelBooking::create([
                        "hotel_booking_id"=>$hotel_booking_id,
                        "customer_id"=>$customer_id,
                        "customer_name"=>$customer_name,
                        "hotel_id"=>$hotel_id,
                        "hotel_name"=>$hotel_name,
                        "hotel_rating"=>$hotel_rating,
                        "address_mm"=>$address_mm,
                        "address_en"=>$address_en,
                        "check_in"=>$check_in,
                        "check_out"=>$check_out,
                        "price_type"=>$price_type,
                        "total_price"=>$total_price,
                        "room_id"=>$room_id,
                        "room_type"=>$room_type,
                        "room_view"=>$room_view,
                        "room_price_local"=>$room_price_local,
                        "room_price_foreign"=>$room_price_foreign,
                        "extra_price_local"=>$extra_price_local,
                        "extra_price_foreign"=>$extra_price_foreign,
                        "room_qty"=>$room_qty,
                        "extra_qty"=>$extra_qty,
                        "room_count"=>$room_count,
                        "extra_count"=>$extra_count,
                        "day_count"=>$day_count,
                        "total_room_price"=>$total_room_price,
                        "room_img"=>$room_img,
                        "booking_status_id"=>$booking_status->booking_status_id,
                        "booking_status_name"=>$booking_status->name,
                    ]);
                }
            }
        }
        $guest_list=$request->guest_list;
        if(!empty($guest_list)){
            $guest_lists[]=json_decode($guest_list,true);
            foreach ($guest_lists as $guest) {
                foreach ($guest as $key => $value) {
                    $full_name=$value['full_name'];
                    $nationality=$value['nationality'];
                    $nrc=$value['nrc'];
                    $nrc_front_img=$value['nrc_front_img'];
                    $nrc_back_img=$value['nrc_back_img'];
                    $passport_number=$value['passport_number'];
                    $passport_front_img=$value['passport_front_img'];
                    $gmail=$value['gmail'];
                    $phone=$value['phone'];
                    HotelBookingCustomer::create([
                        "hotel_booking_id"=>$hotel_booking_id,
                        "full_name"=>$full_name,
                        "nationality"=>$nationality,
                        "nrc"=>$nrc,
                        "nrc_front_img"=>$nrc_front_img,
                        "nrc_back_img"=>$nrc_back_img,
                        "passport_number"=>$passport_number,
                        "passport_front_img"=>$passport_front_img,
                        "gmail"=>$gmail,
                        "phone"=>$phone,
                    ]);
                }
            }
        }

        return response()->json(['status'=>'success','message'=>'your hotel booking created successful','hotel_booking_id'=>$hotel_booking_id]);
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
