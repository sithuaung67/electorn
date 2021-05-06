<?php

namespace App\Http\Controllers\Backend\Package;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package\Package;
use App\Models\Package\PackageImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PackageController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:package-list|package-create|package-edit|package-delete', ['only' => ['index','store']]);
         $this->middleware('permission:package-create', ['only' => ['create','store']]);
         $this->middleware('permission:package-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:package-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package_images=PackageImage::all();

        $image=$package_images->unique('package_id');
        $package_image=$image->values()->all();

        $count_package=Package::orderBy('created_at','desc')->count();
        $count_pin=Package::where('pin','1')->count();
        $package=Package::orderBy('created_at','DESC')->paginate(30);
        return view('backend.package.index',compact('package','count_package','package_image','count_pin'));
    }

    public function package_view($id)
    {
        $package_images=PackageImage::all();
        $packages=Package::findOrFail($id);
        $package_img=PackageImage::where('package_id',$id)->pluck('image');
        return view('backend.package.package_view',compact('packages','package_images','package_img'));
    }

    public function image_view($id)
    {
        $package_images=PackageImage::all();
        $package=Package::findOrFail($id);
        return view('backend.package.photo_view',compact('package_images','package'));
    }

    public function portrait_image_edit($id)
    {
        $package=Package::findOrFail($id);
        return view('backend.package.portrait_edit',compact('package'));
    }

    public function portrait_image_update(Request $request,$id)
    {
        $package=Package::where('package_id',$id)->FirstOrFail();
        if($request->portrait_image){
            Storage::disk('package')->delete($package->portrait_image);
            $image=$request->file('portrait_image');
            $name=time();
            $image_name=$name.'.'.$request->file('portrait_image')->getClientOriginalExtension();
            $package->portrait_image=$image_name;
            Storage::disk('package')->put($image_name, File::get($image));
        }
        $package->update();
        $request->session()->flash('alert-success', 'image was successful update!');

        return redirect()->back();
    }

    public function image_edit($id)
    {
        $package_images=PackageImage::findOrFail($id);
        return view('backend.package.photo_edit',compact('package_images'));
    }

    public function image_only_update(Request $request,$id)
    {
        $package=PackageImage::where('package_image_id',$id)->FirstOrFail();
        if($request->image){
            Storage::disk('package')->delete($package->image);
            $image=$request->file('image');
            $name=time();
            $image_name=$name.'.'.$request->file('image')->getClientOriginalExtension();
            $package->image=$image_name;
            Storage::disk('package')->put($image_name, File::get($image));
        }
        $package->update();
        $request->session()->flash('alert-success', 'image was successful update!');

        return redirect()->back();
    }

    public function image_store(Request $request,$id)
    {
        $image_one=$request->file('pro-image');
        $name_one=time();
        if($image_one)
         {
            foreach($image_one as $file)
            {
                $name = $name_one++.'.'.$file->getClientOriginalExtension();
                Storage::disk('package')->put($name, File::get($file));
                PackageImage::create([
                    "image"=>$name,
                    "package_id"=>$id,
                ]);
            }
         }
         $request->session()->flash('alert-success', 'image was successful update!');
         return redirect()->back();
    }

    public function image_destroy(Request $request,$id)
    {
        $package_images=PackageImage::where('package_image_id',$id)->FirstOrFail();
        Storage::disk('package')->delete($package_images->image);
        $package_images->delete();
        $request->session()->flash('alert-danger', 'image was successful delete!');
        return redirect()->back();
    }

    public function search(Request $request)
    {
        // $start_date=$request['start_date'];
        // $end_date=$request['end_date'];
        $package_name_mm=$request['package_name_mm'];
        $duration_mm=$request['duration_mm'];
        $location_en=$request['location_en'];
        $twin_share_room_price=$request['twin_share_room_price'];
        $single_room_price=$request['single_room_price'];
        $extra_bed_price=$request['extra_bed_price'];
        $without_extra_bed_price=$request['without_extra_bed_price'];
        $direction_mm=$request['direction_mm'];
        $pin=$request['pin'];
        $tour_code=$request['tour_code'];


        $package_images=PackageImage::all();

        $image=$package_images->unique('package_id');
        $package_image=$image->values()->all();

        $count_package=Package::orderBy('created_at','desc')->count();
        $count_pin=Package::where('pin','1')->count();
        $package=Package::orderBy('created_at','DESC')
        // ->where("start_date","LIKE","%$start_date%")
        // ->where("end_date","LIKE","%$end_date%")
        ->where("package_name_mm","LIKE","%$package_name_mm%")
        ->where("duration_mm","LIKE","%$duration_mm%")
        ->where("location_en","LIKE","%$location_en%")
        ->where("direction_mm","LIKE","%$direction_mm%")
        ->where("twin_share_room_price","LIKE","%$twin_share_room_price%")
        ->where("single_room_price","LIKE","%$single_room_price%")
        ->where("extra_bed_price","LIKE","%$extra_bed_price%")
        ->where("without_extra_bed_price","LIKE","%$without_extra_bed_price%")
        ->where("pin","LIKE","%$pin%")
        ->where("tour_code","LIKE","%$tour_code%")
        ->paginate(30);  
        return view('backend.package.index',compact('package','count_package','package_image','count_pin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        libxml_use_internal_errors(true);
        //itinerary_mm
        $mmdetail=$request->input('itinerary_mm');
        $mmdom = new \DomDocument();

        $mmdom->loadHtml('<?xml encoding="UTF-8">'.$mmdetail); 
        $mmdetail = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//MM" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';

        $mmimages = $mmdom->getElementsByTagName('img');

        foreach($mmimages as $k => $img){

            $data_mm = $img->getAttribute('src');

            list($type, $data_mm) = explode(';', $data_mm);

            list(, $data_mm)      = explode(',', $data_mm);

            $data_mm = base64_decode($data_mm);

            $image_name= "/uploads/package/" . time().$k.'1'.'.png';

            $path_mm = public_path() . $image_name;

            file_put_contents($path_mm, $data_mm);
           
            $img->removeAttribute('src');

            $img->setAttribute('src',"http://139.59.98.160".$image_name);

        }
        $mmdetail .= $mmdom->saveHTML( $mmdom->documentElement );

        //itinerary_en
        $endetail=$request->input('itinerary_en');
        $endom = new \DomDocument();

        $endom->loadHtml('<?xml encoding="UTF-8">'.$endetail); 
        $endetail = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//MM" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';

        $enimages = $endom->getElementsByTagName('img');

        foreach($enimages as $k => $img){

            $data_en = $img->getAttribute('src');

            list($type, $data_en) = explode(';', $data_en);

            list(, $data_en)      = explode(',', $data_en);

            $data_en = base64_decode($data_en);

            $image_name_en= "/uploads/package/" . time().$k.'2'.'.png';

            $path_en= public_path() . $image_name_en;

            file_put_contents($path_en, $data_en);
           
            $img->removeAttribute('src');

            $img->setAttribute('src',"http://139.59.98.160".$image_name_en);

        }
        $endetail .= $endom->saveHTML( $endom->documentElement );

        //create package
        $package=new Package();

        $portrait_image=$request->file('portrait_image');
        $portrait_image_name=time();
        
        $pname = '9'.$portrait_image_name.'.'.$portrait_image->getClientOriginalExtension();
        $package->portrait_image=$pname;
        Storage::disk('package')->put($pname, File::get($portrait_image));

        $package->tour_code=$request['tour_code'];
        $package->package_name_mm=$request['package_name_mm'];
        $package->package_name_en=$request['package_name_en'];
        $package->start_date=$request['start_date'];
        $package->end_date=$request['end_date'];
        $package->duration_mm=$request['duration_mm'];
        $package->duration_en=$request['duration_en'];
        $package->location_mm=$request['location_mm'];
        $package->location_en=$request['location_en'];
        $package->direction_mm=$request['direction_mm'];
        $package->direction_en=$request['direction_en'];
        $package->description_mm=$request['description_mm'];
        $package->description_en=$request['description_en'];
        $package->itinerary_mm=$mmdetail;
        $package->itinerary_en=$endetail;
        $package->twin_share_room_price=$request['twin_share_room_price'];
        $package->single_room_price=$request['single_room_price'];
        $package->extra_bed_price=$request['extra_bed_price'];
        $package->without_extra_bed_price=$request['without_extra_bed_price'];
        $package->discount_price=$request['discount_price'];
        $package->pin=$request['pin'];
        if ($request['price']==$request['discount_price']) {
            $package->is_discount=0;
        }else{
            $package->is_discount=1;
        }
        $package->save();

        $image_one=$request->file('pro-image');
        $name_one=time();
        if($image_one)
         {
            foreach($image_one as $file)
            {
                $name = $name_one++.'.'.$file->getClientOriginalExtension();
                Storage::disk('package')->put($name, File::get($file));
                PackageImage::create([
                    "image"=>$name,
                    "package_id"=>$package->package_id,
                ]);
            }
         }

 
        return redirect('admin/package');
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
        $package_image=PackageImage::all();
        $package=Package::findOrFail($id);
        return view('backend.package.edit',compact('package','package_image'));
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
        $package=Package::where('package_id',$id)->first();

        $portrait_image=$request->file('portrait_image');
        $portrait_image_name=time();
        
        if($portrait_image)
        {
            $pname = '9'.$portrait_image_name.'.'.$portrait_image->getClientOriginalExtension();
            $package->portrait_image=$pname;
            Storage::disk('package')->put($pname, File::get($portrait_image));
        }

        $endetail=$request->input('itinerary_en');
        $endom = new \DomDocument();
        libxml_use_internal_errors(true);
        $endom->loadHtml('<?xml encoding="UTF-8">'.$endetail); 
        $endetail = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';   
        $enimages = $endom->getElementsByTagName('img');
        $bs64='base64';
        foreach($enimages as $k => $img){

            $data = $img->getAttribute('src');
            if (strpos($data,$bs64) == true)
            {
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
                $image_name= "/uploads/package/" . time().$k.'1'.'.png';

                $path = public_path() . $image_name;

                file_put_contents($path, $data);
               
                $img->removeAttribute('src');

                $img->setAttribute('src',"http://139.59.98.160".$image_name);
            }
            else//put '/' to prevent lossing image  actual path
            {
                $image_name=$data;
                $img->setAttribute('src',$image_name);
            }
        }
        $endetail .= $endom->saveHTML( $endom->documentElement );

        $mmdetail=$request->input('itinerary_mm');
        $mmdom = new \DomDocument();
        libxml_use_internal_errors(true);
        $mmdom->loadHtml('<?xml encoding="UTF-8">'.$mmdetail); 
        $mmdetail = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';   
        $mmimages = $mmdom->getElementsByTagName('img');

        $bs64='base64';
        foreach($mmimages as $k => $img){

            $data = $img->getAttribute('src');
            if (strpos($data,$bs64) == true)
            {
                
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
                $image_name= "/uploads/package/" . time().$k.'2'.'.png';

                $path = public_path() . $image_name;

                file_put_contents($path, $data);
               
                $img->removeAttribute('src');

                $img->setAttribute('src',"http://139.59.98.160".$image_name);
            }
            else//put '/' to prevent lossing image  actual path
            {
                $image_name=$data;
                $img->setAttribute('src',$image_name);
            }

        }
        $mmdetail .= $mmdom->saveHTML( $mmdom->documentElement );

        $package->tour_code=$request['tour_code'];
        $package->package_name_mm=$request['package_name_mm'];
        $package->package_name_en=$request['package_name_en'];
        $package->start_date=$request['start_date'];
        $package->end_date=$request['end_date'];
        $package->duration_mm=$request['duration_mm'];
        $package->duration_en=$request['duration_en'];
        $package->location_mm=$request['location_mm'];
        $package->location_en=$request['location_en'];
        $package->direction_mm=$request['direction_mm'];
        $package->direction_en=$request['direction_en'];
        $package->description_mm=$request['description_mm'];
        $package->description_en=$request['description_en'];
        $package->itinerary_mm=$mmdetail;
        $package->itinerary_en=$endetail;
        $package->twin_share_room_price=$request['twin_share_room_price'];
        $package->single_room_price=$request['single_room_price'];
        $package->extra_bed_price=$request['extra_bed_price'];
        $package->without_extra_bed_price=$request['without_extra_bed_price'];
        $package->discount_price=$request['discount_price'];
        $package->pin=$request['pin'];
        if ($request['price']==$request['discount_price']) {
            $package->is_discount=0;
        }else{
            $package->is_discount=1;
        }
        $package->update();
        
        return redirect('admin/package')   ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package_images=PackageImage::where('package_id',$id)->get();
        foreach ($package_images as $value) {

            $package_image_id=$value->package_image_id;
            $package_images1=PackageImage::where('package_image_id',$package_image_id)->FirstOrFail();
            Storage::disk('package')->delete($package_images1->image);
            // $package_images1->delete();

        }
        $package=Package::where('package_id',$id)->FirstOrFail();
        $package->delete();
        return redirect('admin/package');
    }
}
