<?php

namespace App\Http\Controllers\Backend\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking\Booking;
use App\Models\Booking\BookingStatus;
use App\Models\Customer\Customer;
use App\Models\Package\Package;
use App\Models\Package\PackageImage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:booking-list|booking-create|booking-edit|booking-delete', ['only' => ['index','store']]);
         $this->middleware('permission:booking-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:booking-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_booking=Booking::orderBy('created_at','DESC')->get()->unique('booking_id')->count();
        $customers=Customer::all();
        $packages=Package::all();
        $booking_status=BookingStatus::all();
        $booking=Booking::orderBy('created_at','DESC')->get()->unique('booking_id')->all();
        $booking_all=DB::select("SELECT booking_id, COUNT('booking_id') as count FROM bookings GROUP BY booking_id");
        return view('backend.booking.index',compact('booking','count_booking','customers','packages','booking_status','booking_all'));
    }

    public function view($id)
    {
        $booking_status=BookingStatus::all();
        $booking=Booking::findOrFail($id);
        $seocond_book=Booking::where('booking_id',$booking->booking_id)->get();
        $package_image=PackageImage::where('package_id',$booking->package_id)->pluck('image');
        return view('backend.booking.view',compact('booking','package_image','booking_status','seocond_book'));
    }
    public function booking_edit_view($id)
    {
        $count_booking=Booking::where('booking_id',$id)->count();
        $booking=Booking::orderBy('created_at','DESC')->where('booking_id',$id)->get();
        return view('backend.booking.booking_view',compact('booking','count_booking')); 
    }

    public function booking_edit(Request $request,$id)
    {
        $booking_status_id=$request['booking_status_id'];
        $status=BookingStatus::findOrFail($booking_status_id);
        $bookings=Booking::where('booking_id',$id)->get();
        foreach ($bookings as $key => $value) {
            $id=$value->id;
            $booking=Booking::where('id',$id)->first();
            $booking->booking_status_id=$booking_status_id;
            $booking->booking_status_name=$status->name;
            $booking->update();
        }
        $request->session()->flash('alert-success', 'status was successful update!');
        return redirect()->back(); 
    }

    public function search(Request $request)
    {
        $booking_id=$request['booking_id'];
        $package_id=$request['package_id'];
        $customer_id=$request['customer_id'];
        $booking_status_id=$request['booking_status_id'];

        $count_booking=Booking::orderBy('created_at','DESC')->get()->unique('booking_id')->count();
        $customers=Customer::all();
        $packages=Package::all();
        $booking_status=BookingStatus::all();
        $booking_all=DB::select("SELECT booking_id, COUNT('booking_id') as count FROM bookings GROUP BY booking_id");
        $booking=Booking::orderBy('created_at','DESC')
        ->where("booking_id","LIKE","%$booking_id%")
        ->where("customer_id","LIKE","%$customer_id%")
        ->where("package_id","LIKE","%$package_id%")
        ->where("booking_status_id","LIKE","%$booking_status_id%")
        ->get()
        ->unique('booking_id')
        ->all();
        return view('backend.booking.index',compact('booking','count_booking','customers','packages','booking_status','booking_all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.booking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Booking::create($request->all());
        return redirect('admin/booking');
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
        $booking_status=BookingStatus::all();
        $booking=Booking::findOrFail($id);
        return view('backend.booking.edit',compact('booking','booking_status')); 
    }

    public function edit_all($id)
    {
        $booking_status=BookingStatus::all();
        $booking=Booking::findOrFail($id);
        return view('backend.booking.edit_all',compact('booking','booking_status')); 
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
        $booking_status_id=$request['booking_status_id'];
        $status=BookingStatus::findOrFail($booking_status_id);
        $bookings=Booking::where('booking_id',$request['booking_id'])->get();
        foreach ($bookings as $key => $value) {
            $id=$value->id;
            $booking=Booking::where('id',$id)->first();
            $booking->booking_status_id=$booking_status_id;
            $booking->booking_status_name=$status->name;
            $booking->update();
        }
        $request->session()->flash('alert-success', 'booking was successful update!');
        Booking::find($id)->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        Booking::destroy($id);
        $request->session()->flash('alert-success','one booking was successful delete!');
        return redirect()->back();
    }
    public function destroy_all(Request $request,$booking_id)
    {
        $bookings=Booking::where('booking_id',$booking_id)->get();
        foreach ($bookings as $key => $value) {
            $id=$value->id;
            $booking=Booking::where('id',$id)->first();
            $booking->delete();
        }
        $request->session()->flash('alert-success', 'all booking was successful delete!');
        return redirect('admin/booking');
    }
}
