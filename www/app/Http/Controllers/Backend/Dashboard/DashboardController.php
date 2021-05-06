<?php

namespace App\Http\Controllers\Backend\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Package\Package;
use App\Models\Booking\Booking;
use App\Models\Customer\Customer;
use App\Models\TourGroup\TourGroup;
use App\Models\TourLeader\TourLeader;
use App\Models\Hotel\Hotel;
use App\Models\Hotel\HotelBooking;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package=Package::count();
        $booking=Booking::count();
        $customer=Customer::count();
        $tour_leader=TourLeader::count();
        $tour_group=TourGroup::count();
        $hotel=Hotel::count();

        $hotel_bookings=HotelBooking::orderBy('created_at','DESC')->get();
        $data=$hotel_bookings->unique('hotel_booking_id');
        $hotel_booking=$data->values()->count();
        return view('backend.dashboard',compact('hotel_booking','package','booking','customer','tour_leader','tour_group','hotel'));
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
