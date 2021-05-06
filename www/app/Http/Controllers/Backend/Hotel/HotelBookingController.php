<?php

namespace App\Http\Controllers\Backend\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel\HotelBooking;
use App\Models\Hotel\HotelBookingCustomer;
use App\Models\Booking\BookingStatus;
use App\Models\Customer\Customer;
use App\Models\Hotel\Hotel;
use App\Models\Hotel\HotelImage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class HotelBookingController extends Controller
{
    /**
    *Role and Permission
    function __construct()
    {
         $this->middleware('permission:hotel_booking-list|hotel_booking-create|hotel_booking-edit|hotel_booking-delete', ['only' => ['index','store']]);
         $this->middleware('permission:hotel_booking-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:hotel_booking-delete', ['only' => ['destroy']]);
    }
    */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_hotel_booking=HotelBooking::orderBy('created_at','DESC')->get()->unique('hotel_booking_id')->count();
        $customers=Customer::all();
        $hotels=Hotel::all();
        $booking_status=BookingStatus::all();
        $hotel_booking=HotelBooking::orderBy('created_at','DESC')->get()->unique('hotel_booking_id')->all();
        $hotel_booking_all=DB::select("SELECT hotel_booking_id, COUNT('hotel_booking_id') as count FROM hotel_bookings GROUP BY hotel_booking_id");
        return view('backend.hotel.hotel_booking.index',compact('hotel_booking','count_hotel_booking','customers','hotels','booking_status','hotel_booking_all'));
    }

    public function hotel_booking_view($id)
    {
        $booking_status=BookingStatus::all();
        $hotel_booking=HotelBooking::findOrFail($id);
        $hotel_booking_all=HotelBooking::where('hotel_booking_id',$hotel_booking->hotel_booking_id)->get();
        $seocond_hotel_book=HotelBookingCustomer::where('hotel_booking_id',$hotel_booking->hotel_booking_id)->get();
        $hotel_image=HotelImage::where('hotel_id',$hotel_booking->hotel_id)->pluck('hotel_image');
        return view('backend.hotel.hotel_booking.view',compact('hotel_booking','hotel_image','booking_status','seocond_hotel_book','hotel_booking_all'));
    }

    public function hotel_booking_edit(Request $request,$id)
    {
        $booking_status_id=$request['booking_status_id'];
        $status=BookingStatus::findOrFail($booking_status_id);
        $hotel_bookings=HotelBooking::where('hotel_booking_id',$id)->get();
        foreach ($hotel_bookings as $key => $value) {
            $id=$value->id;
            $booking=HotelBooking::where('id',$id)->first();
            $booking->booking_status_id=$booking_status_id;
            $booking->booking_status_name=$status->name;
            $booking->update();
        }
        $request->session()->flash('alert-success', 'status was successful update!');
        return redirect()->back(); 
    }

    public function hotel_booking_edit_view($id)
    {
        $count_hotel_booking=HotelBooking::where('hotel_booking_id',$id)->count();
        $hotel_booking=HotelBooking::orderBy('created_at','DESC')->where('hotel_booking_id',$id)->get();
        return view('backend.hotel.hotel_booking.booking_view',compact('hotel_booking','count_hotel_booking')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hotel_booking_edit_each($id)
    {
        $booking_status=BookingStatus::all();
        $hotel_booking=HotelBooking::findOrFail($id);
        return view('backend.hotel.hotel_booking.edit',compact('hotel_booking','booking_status')); 
    }

    public function hotel_booking_edit_all($id)
    {
        $booking_status=BookingStatus::all();
        $hotel_booking=HotelBooking::findOrFail($id);
        return view('backend.hotel.hotel_booking.edit_all',compact('hotel_booking','booking_status')); 
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hotel_booking_update_each(Request $request, $id)
    {
        $hotel_booking_id=$request['hotel_booking_id'];
        $booking_status_id=$request['booking_status_id'];
        $status=BookingStatus::findOrFail($booking_status_id);
        $hotel_bookings=HotelBooking::where('hotel_booking_id',$hotel_booking_id)->get();
        foreach ($hotel_bookings as $key => $value) {
            $id=$value->id;
            $booking=HotelBooking::where('id',$id)->first();
            $booking->booking_status_id=$booking_status_id;
            $booking->booking_status_name=$status->name;
            $booking->update();
        }
        $request->session()->flash('alert-success', 'hotel booking was successful update!');
        HotelBooking::find($id)->update($request->all());
        return redirect('admin/hotel/booking_edit/view/'.$hotel_booking_id);
    }

    public function hotel_booking_update_all(Request $request, $id)
    {
        $booking_status_id=$request['booking_status_id'];
        $status=BookingStatus::findOrFail($booking_status_id);
        $hotel_bookings=HotelBooking::where('hotel_booking_id',$request['hotel_booking_id'])->get();
        foreach ($hotel_bookings as $key => $value) {
            $id=$value->id;
            $booking=HotelBooking::where('id',$id)->first();
            $booking->booking_status_id=$booking_status_id;
            $booking->booking_status_name=$status->name;
            $booking->update();
        }
        $request->session()->flash('alert-success', 'hotel booking was successful update!');
        HotelBooking::find($id)->update($request->all());
        return redirect('admin/hotel_booking');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hotel_booking_destroy(Request $request,$id)
    {
        HotelBooking::destroy($id);
        $request->session()->flash('alert-success','one hotel booking was successful delete!');
        return redirect()->back();
    }

    public function hotel_booking_destroy_all(Request $request,$booking_id)
    {
        $hotel_bookings=HotelBooking::where('hotel_booking_id',$booking_id)->get();
        foreach ($hotel_bookings as $key => $value) {
            $id=$value->id;
            $booking=HotelBooking::where('id',$id)->first();
            $booking->delete();
        }
        $request->session()->flash('alert-success', 'all hotel booking was successful delete!');
        return redirect('admin/hotel_booking');
    }
}
