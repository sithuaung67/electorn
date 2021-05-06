<?php

namespace App\Http\Controllers\Backend\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel\Hotel;
use App\Models\Hotel\Room;
use App\Models\Hotel\HotelImage;
use App\Models\Hotel\State;
use App\Models\Hotel\City;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;


class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel_count=Hotel::orderBy('created_at','DESC')->count();
        $room_all=DB::select("SELECT hotel_id, COUNT('hotel_id') as count FROM rooms GROUP BY hotel_id");
        // dd($room_all);
        $hotel=Hotel::orderBy('created_at','DESC')->paginate(20);
        return view('backend.hotel.hotel_list.index',compact('hotel','hotel_count','room_all'));
    }

    public function hotel_list_view($id)
    {
        $hotel=Hotel::findOrFail($id);
        $hotel_img=HotelImage::where('hotel_id',$id)->pluck('hotel_image');
        return view('backend.hotel.hotel_list.hotel_view',compact('hotel','hotel_img'));
    }

    public function list($id)
    {
        $city=City::where('state_id',$id)->get();
        return response()->json($city);
    }

    // public function search(Request $request)
    // {
    //     $hotel_name=$request['hotel_name'];
    //     $hotel_rating=$request['hotel_rating'];

    //     $hotel_count=Hotel::orderBy('created_at','DESC')->count();
    //     $room_all=DB::select("SELECT hotel_id, COUNT('hotel_id') as count FROM rooms GROUP BY hotel_id");
    //     $hotel=Hotel::orderBy("created_at","DESC")
    //     ->where("hotel_name","LIKE","%$hotel_name%")
    //     ->where("hotel_rating","LIKE","%$hotel_rating%")
    //     ->paginate(20);
    //     return view('backend.hotel.hotel_list.index',compact('hotel','hotel_count','room_all'));
    // }

    public function view_index($id)
    {
        $hotel=Hotel::where('hotel_id',$id)->orderBy('created_at','DESC')->first();
        $room=Room::where('hotel_id',$id)->orderBy('created_at','DESC')->paginate(20);
        return view('backend.hotel.hotel_list.view',compact('room','hotel','id'));
    }

    public function image_view_index($id)
    {
        $hotel_images=HotelImage::all();
        $hotel=Hotel::findOrFail($id);
        return view('backend.hotel.hotel_list.image_view',compact('hotel','hotel_images'));
    }

    public function hotel_image_store(Request $request,$id)
    {
        //use ftp save server image
        $image_one=$request->file('hotel_image');
        
        //get filename without extension
        $filename=time();

        if($image_one)
         {
            foreach($image_one as $file)
            {
                if($file) {
         
                //get filename with extension
                $filenamewithextension = $file->getClientOriginalName();
         
                //get file extension
                $extension = $file->getClientOriginalExtension();
         
                //filename to store
                $filenametostore = $filename++.'_'.uniqid().'.'.$extension;

                // dd($filenametostore);
         
                //Upload File to external server
                Storage::disk('hotel')->put($filenametostore, fopen($file, 'r+'));
         
                //Store $filenametostore in the database
                }
                HotelImage::create([
                    "hotel_image"=>"http://139.59.98.151/FTP/StarZone/Hotel/".$filenametostore,
                    "hotel_id"=>$id,
                ]);
            }
        }
         $request->session()->flash('alert-success', 'image was successful create!');
         return redirect()->back();
    }

    public function hotel_image_edit(Request $request,$id)
    {
        $hotel_images=HotelImage::findOrFail($id);
        return view('backend.hotel.hotel_list.image_edit',compact('hotel_images'));
    }

    public function hotel_image_update(Request $request,$id)
    {
        $hotel_images=HotelImage::where('hotel_image_id',$id)->first();
        if($request->hotel_image)
        {
            Storage::disk('hotel')->delete(mb_strimwidth($hotel_images->hotel_image, 34, 65));
            $image=$request->file('hotel_image');
            $name=time();
            
            //get filename with extension
            $filenamewithextension2 = $image->getClientOriginalName();
             
            //get file extension
            $extension2 = $image->getClientOriginalExtension();

            //filename to store
            $filenametostore2 = $name.'_'.uniqid().'.'.$extension2;
             
            //Upload File to external server
            Storage::disk('hotel')->put($filenametostore2, fopen($image, 'r+'));
        }


        $hotel_images->hotel_image="http://139.59.98.151/FTP/StarZone/Hotel/".$filenametostore2;;
        $hotel_images->update();
        $request->session()->flash('alert-success', 'image was successful create!');


        return view('backend.hotel.hotel_list.image_edit',compact('hotel_images'));
    }

    public function hotel_image_destroy(Request $request,$id)
    {
        $hotel_images=HotelImage::where('hotel_image_id',$id)->FirstOrFail();
        Storage::disk('hotel')->delete(mb_strimwidth($hotel_images->hotel_image, 34, 65));
        $hotel_images->delete();
        $request->session()->flash('alert-danger', 'image was successful delete!');
        return redirect()->back();
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states=State::all();
        $cities=City::all();
        return view('backend.hotel.hotel_list.create',compact('states','cities'));
    }

    public function view_create($id)
    {
        return view('backend.hotel.hotel_list.room_create',compact('id'));
    }

    public function new_room_create($id)
    {
        return view('backend.hotel.hotel_list.new_room_create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $state=State::where('state_id',$request['state_id'])->first();
        $city=City::where('city_id',$request['city_id'])->first();

        $hotel=new Hotel();
        $hotel->hotel_name=$request['hotel_name'];
        $hotel->address_mm=$request['address_mm'];
        $hotel->address_en=$request['address_en'];
        $hotel->contact_info_mm=$request['contact_info_mm'];
        $hotel->contact_info_en=$request['contact_info_en'];
        $hotel->hotel_rating=$request['hotel_rating'];
        $hotel->price_type=$request['price_type'];
        $hotel->policy_mm=$request['policy_mm'];
        $hotel->policy_en=$request['policy_en'];
        $hotel->note_mm=$request['note_mm'];
        $hotel->note_en=$request['note_en'];
        $hotel->country_name=$request['country_name'];
        $hotel->state_id=$request['state_id'];
        $hotel->state_name=$state->state_name;
        $hotel->city_id=$request['city_id'];
        $hotel->township=$city->township;
        $hotel->save();


        //use ftp save server image
        $image_one=$request->file('hotel_image');
        
        //get filename without extension
        $filename=time();

        if($image_one)
         {
            foreach($image_one as $file)
            {
                if($file) {
         
                //get filename with extension
                $filenamewithextension = $file->getClientOriginalName();
         
                //get file extension
                $extension = $file->getClientOriginalExtension();
         
                //filename to store
                $filenametostore = $filename++.'_'.uniqid().'.'.$extension;
         
                //Upload File to external server
                Storage::disk('hotel')->put($filenametostore, fopen($file, 'r+'));
         
                //Store $filenametostore in the database
                }
                HotelImage::create([
                    "hotel_image"=>"http://139.59.98.151/FTP/StarZone/Hotel/".$filenametostore,
                    "hotel_id"=>$hotel->hotel_id,
                ]);
            }
        }
        $id=$hotel->hotel_id;
        $request->session()->flash('alert-success', 'hotel was successful create!');    
        return view('backend.hotel.hotel_list.room_create',compact('id'));
    }

    public function room_store(Request $request,$id)
    {
        $image=$request->file('room_img');
        $name=time();

        //get filename with extension
        $filenamewithextension1 = $image->getClientOriginalName();
         
        //get file extension
        $extension1 = $image->getClientOriginalExtension();

        //filename to store
        $filenametostore1 = $name.'_'.uniqid().'.'.$extension1;
         
        //Upload File to external server
        Storage::disk('hotel_room')->put($filenametostore1, fopen($image, 'r+'));

        $room=new Room();
        $room->hotel_id=$id;
        $room->room_img="http://139.59.98.151/FTP/StarZone/Room/".$filenametostore1;
        $room->room_type=$request['room_type'];
        $room->room_view=$request['room_view'];
        $room->room_qty=$request['room_qty'];
        $room->extra_qty=$request['extra_qty'];
        $room->valid_from_one=$request['valid_from_one'];
        $room->valid_to_one=$request['valid_to_one'];
        $room->room_price_local_one=$request['room_price_local_one'];
        $room->room_price_foreign_one=$request['room_price_foreign_one'];
        $room->extra_price_local_one=$request['extra_price_local_one'];
        $room->extra_price_foreign_one=$request['extra_price_foreign_one'];
        $room->valid_from_two=$request['valid_from_two'];
        $room->valid_to_two=$request['valid_to_two'];
        $room->room_price_local_two=$request['room_price_local_two'];
        $room->room_price_foreign_two=$request['room_price_foreign_two'];
        $room->extra_price_local_two=$request['extra_price_local_two'];
        $room->extra_price_foreign_two=$request['extra_price_foreign_two'];
        $room->valid_from_three=$request['valid_from_three'];
        $room->valid_to_three=$request['valid_to_three'];
        $room->room_price_local_three=$request['room_price_local_three'];
        $room->room_price_foreign_three=$request['room_price_foreign_three'];
        $room->extra_price_local_three=$request['extra_price_local_three'];
        $room->extra_price_foreign_three=$request['extra_price_foreign_three'];
        $room->save();
        $request->session()->flash('alert-success', 'hotel room was successful create!');    
        return redirect('admin/hotel');
    }

    public function new_room_store(Request $request,$id)
    {
        $image=$request->file('room_img');
        $name=time();

        //get filename with extension
        $filenamewithextension2 = $image->getClientOriginalName();
         
        //get file extension
        $extension2 = $image->getClientOriginalExtension();

        //filename to store
        $filenametostore2 = $name.'_'.uniqid().'.'.$extension2;
         
        //Upload File to external server
        Storage::disk('hotel_room')->put($filenametostore2, fopen($image, 'r+'));

        $new_room=new Room();
        $new_room->hotel_id=$id;
        $new_room->room_img="http://139.59.98.151/FTP/StarZone/Room/".$filenametostore2;
        $new_room->room_type=$request['room_type'];
        $new_room->room_view=$request['room_view'];
        $new_room->room_qty=$request['room_qty'];
        $new_room->extra_qty=$request['extra_qty'];
        $new_room->valid_from_one=$request['valid_from_one'];
        $new_room->valid_to_one=$request['valid_to_one'];
        $new_room->room_price_local_one=$request['room_price_local_one'];
        $new_room->room_price_foreign_one=$request['room_price_foreign_one'];
        $new_room->extra_price_local_one=$request['extra_price_local_one'];
        $new_room->extra_price_foreign_one=$request['extra_price_foreign_one'];
        $new_room->valid_from_two=$request['valid_from_two'];
        $new_room->valid_to_two=$request['valid_to_two'];
        $new_room->room_price_local_two=$request['room_price_local_two'];
        $new_room->room_price_foreign_two=$request['room_price_foreign_two'];
        $new_room->extra_price_local_two=$request['extra_price_local_two'];
        $new_room->extra_price_foreign_two=$request['extra_price_foreign_two'];
        $new_room->valid_from_three=$request['valid_from_three'];
        $new_room->valid_to_three=$request['valid_to_three'];
        $new_room->room_price_local_three=$request['room_price_local_three'];
        $new_room->room_price_foreign_three=$request['room_price_foreign_three'];
        $new_room->extra_price_local_three=$request['extra_price_local_three'];
        $new_room->extra_price_foreign_three=$request['extra_price_foreign_three'];
        $new_room->save();
        $request->session()->flash('alert-success', 'hotel room was successful create!');    

        return redirect('admin/hotel_view/'.$id);
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
        $hotel=Hotel::where('hotel_id',$id)->first();
        return view('backend.hotel.hotel_list.edit',compact('hotel'));
    }

    public function room_edit($id)
    {
        $room=Room::where('room_id',$id)->first();
        return view('backend.hotel.hotel_list.room_edit',compact('id','room'));
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
        $state=State::where('state_id',$request['state_id'])->first();
        $city=City::where('city_id',$request['city_id'])->first();

        $hotel=Hotel::where('hotel_id',$id)->first();
        $hotel->hotel_name=$request['hotel_name'];
        $hotel->address_mm=$request['address_mm'];
        $hotel->address_en=$request['address_en'];
        $hotel->contact_info_mm=$request['contact_info_mm'];
        $hotel->contact_info_en=$request['contact_info_en'];
        $hotel->hotel_rating=$request['hotel_rating'];
        $hotel->price_type=$request['price_type'];
        $hotel->policy_mm=$request['policy_mm'];
        $hotel->policy_en=$request['policy_en'];
        $hotel->note_mm=$request['note_mm'];
        $hotel->note_en=$request['note_en'];
        $hotel->country_name=$request['country_name'];
        $hotel->state_id=$request['state_id'];
        $hotel->state_name=$state->state_name;
        $hotel->city_id=$request['city_id'];
        $hotel->township=$city->township;
        $hotel->update();

        $request->session()->flash('alert-success', 'hotel room was successful create!');
        return redirect('admin/hotel');

    }

    public function room_update(Request $request, $id)
    {
        $new_room=Room::where('room_id',$id)->first();
        if($request->room_img)
        {
            Storage::disk('hotel_room')->delete(mb_strimwidth($new_room->room_img, 34, 65));
            $image=$request->file('room_img');
            $name=time();
            
            //get filename with extension
            $filenamewithextension2 = $image->getClientOriginalName();
             
            //get file extension
            $extension2 = $image->getClientOriginalExtension();

            //filename to store
            $filenametostore2 = $name.'_'.uniqid().'.'.$extension2;
             
            //Upload File to external server
            Storage::disk('hotel_room')->put($filenametostore2, fopen($image, 'r+'));
            $new_room->room_img="http://139.59.98.151/FTP/StarZone/Room/".$filenametostore2;
        }


        $new_room->room_type=$request['room_type'];
        $new_room->room_view=$request['room_view'];
        $new_room->room_qty=$request['room_qty'];
        $new_room->extra_qty=$request['extra_qty'];
        $new_room->valid_from_one=$request['valid_from_one'];
        $new_room->valid_to_one=$request['valid_to_one'];
        $new_room->room_price_local_one=$request['room_price_local_one'];
        $new_room->room_price_foreign_one=$request['room_price_foreign_one'];
        $new_room->extra_price_local_one=$request['extra_price_local_one'];
        $new_room->extra_price_foreign_one=$request['extra_price_foreign_one'];
        $new_room->valid_from_two=$request['valid_from_two'];
        $new_room->valid_to_two=$request['valid_to_two'];
        $new_room->room_price_local_two=$request['room_price_local_two'];
        $new_room->room_price_foreign_two=$request['room_price_foreign_two'];
        $new_room->extra_price_local_two=$request['extra_price_local_two'];
        $new_room->extra_price_foreign_two=$request['extra_price_foreign_two'];
        $new_room->valid_from_three=$request['valid_from_three'];
        $new_room->valid_to_three=$request['valid_to_three'];
        $new_room->room_price_local_three=$request['room_price_local_three'];
        $new_room->room_price_foreign_three=$request['room_price_foreign_three'];
        $new_room->extra_price_local_three=$request['extra_price_local_three'];
        $new_room->extra_price_foreign_three=$request['extra_price_foreign_three'];
        $new_room->update();
        $request->session()->flash('alert-success', 'hotel room was successful create!');

        return redirect('admin/hotel_view/'.$new_room->hotel_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $hotel=Hotel::where('hotel_id',$id)->FirstOrFail();
        $hotel->delete();
        $request->session()->flash('alert-danger', 'hotel was successful delete!');
        return redirect()->back();
    }

    public function room_destroy(Request $request,$id)
    {
        $room=Room::where('room_id',$id)->FirstOrFail();
        $room->delete();
        $request->session()->flash('alert-danger', 'room was successful delete!');
        return redirect()->back();
    }
}
