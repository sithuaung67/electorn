<?php

namespace App\Http\Controllers\Backend\TravelBlog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\TravelBlog;
use App\Models\Blog\BlogDestination;
use App\Models\Destination\Destination;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TravelBlogController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:blog-list|blog-create|blog-edit|blog-delete', ['only' => ['index','store']]);
         $this->middleware('permission:blog-create', ['only' => ['create','store']]);
         $this->middleware('permission:blog-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:blog-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations=Destination::all();
        $count_travel_blog=TravelBlog::orderBy('created_at','DESC')->count();
        $travel_blog=TravelBlog::orderBy('created_at','DESC')->paginate(30);
        return view('backend.travel_blog.index',compact('travel_blog','destinations','count_travel_blog'));
    }

    public function search(Request $request)
    {
        $travel_blog_name_en=$request['travel_blog_name_en'];
        $travel_blog_name_mm=$request['travel_blog_name_mm'];

        $destinations=Destination::all();
        $count_travel_blog=TravelBlog::orderBy('created_at','DESC')->count();
        $travel_blog=TravelBlog::orderBy('created_at','DESC')
        ->where("travel_blog_name_en","LIKE","%$travel_blog_name_en%")
        ->where("travel_blog_name_mm","LIKE","%$travel_blog_name_mm%")
        ->paginate(30);  
        return view('backend.travel_blog.index',compact('travel_blog','destinations','count_travel_blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destinations=Destination::all();
        return view('backend.travel_blog.create',compact('destinations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $travel_blog=new TravelBlog();
        if($request->image){
            $image=$request->file('image');
            $name=time();
            $image_name=$name.'.'.$request->file('image')->getClientOriginalExtension();
            $travel_blog->image=$image_name;
            Storage::disk('travel_blog')->put($image_name, File::get($image));
        }
        $travel_blog->travel_blog_name_mm=$request['travel_blog_name_mm'];
        $travel_blog->travel_blog_name_en=$request['travel_blog_name_en'];
        $travel_blog->description_mm=$request['description_mm'];
        $travel_blog->description_en=$request['description_en'];
        $travel_blog->save();

        $des_id=$request['destination_id'];
        foreach ($des_id as $key => $value) {
            $destination_id=$value;
            BlogDestination::create([
                "destination_id"=>$destination_id,
                "travel_blog_id"=>$travel_blog->travel_blog_id,
            ]);
        }
        return redirect('admin/travel_blog');
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
        $destinations=Destination::all();
        $travel_blog=TravelBlog::findOrFail($id);
        return view('backend.travel_blog.edit',compact('travel_blog','destinations'));
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
        $travel_blog=TravelBlog::where('travel_blog_id',$id)->first();
        if($request->image){
            Storage::disk('travel_blog')->delete($travel_blog->image);
            $image=$request->file('image');
            $name=time();
            $image_name=$name.'.'.$request->file('image')->getClientOriginalExtension();
            $travel_blog->image=$image_name;
            Storage::disk('travel_blog')->put($image_name, File::get($image));
        }
        $travel_blog->travel_blog_name_mm=$request['travel_blog_name_mm'];
        $travel_blog->travel_blog_name_en=$request['travel_blog_name_en'];
        $travel_blog->description_mm=$request['description_mm'];
        $travel_blog->description_en=$request['description_en'];
        $travel_blog->update();
        return redirect('admin/travel_blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

        $blog_destination=BlogDestination::where('travel_blog_id',$id)->get();
        foreach ($blog_destination as $value) {

            $bd_id=$value->blog_destination_id;
            $blog_destination_id=BlogDestination::where('blog_destination_id',$bd_id)->FirstOrFail();
            $blog_destination_id->delete();

        }

        $travel_blog=TravelBlog::where('travel_blog_id',$id)->FirstOrFail();
        Storage::disk('travel_blog')->delete($travel_blog->image);
        $travel_blog->delete();
        $request->session()->flash('alert-danger', 'destination was successful delete()!');
        return redirect('admin/travel_blog');
    }

    public function view($id)
    {
        $destination_blog=BlogDestination::where('travel_blog_id',$id)->get();
        $destinations=Destination::all();
        $travel_blog=TravelBlog::findOrFail($id);
        return view('backend.travel_blog.view',compact('travel_blog','destinations','destination_blog'));
    }

    public function destination_create($id)
    {
        $travel_blog=TravelBlog::findOrFail($id);
        $destinations=Destination::all();
        return view('backend.travel_blog.destination_create',compact('travel_blog','destinations'));
    }

    public function destination_store(Request $request)
    {
        
        $travel_blog_id=$request['travel_blog_id'];
        $des_id=$request['destination_id'];
        foreach ($des_id as $key => $value) {
            $destination_id=$value;
            BlogDestination::create([
                "destination_id"=>$destination_id,
                "travel_blog_id"=>$travel_blog_id
            ]);
        }

        $destination_blog=BlogDestination::where('travel_blog_id',$travel_blog_id)->get();
        $destinations=Destination::all();
        $travel_blog=TravelBlog::findOrFail($travel_blog_id);
        return view('backend.travel_blog.view',compact('travel_blog','destinations','destination_blog'));
    }

    public function destination_edit($id)
    {      
        $destination_blog=BlogDestination::findOrFail($id);
        $travel_blog=TravelBlog::findOrFail($destination_blog->travel_blog_id);
        $destinations=Destination::all();
        return view('backend.travel_blog.destination_edit',compact('destination_blog','destinations','travel_blog'));
    }

    public function destination_update(Request $request,$id)
    {      
        BlogDestination::find($id)->update($request->all());

        $hey=BlogDestination::findOrFail($id);

        $request->session()->flash('alert-success', 'destination was successful update()!');

        return redirect('admin/travel_blog/view/'.$hey->travel_blog_id);
    }

    public function destination_destroy(Request $request,$id)
    {      
        $destination_blog=BlogDestination::where('blog_destination_id',$id)->FirstOrFail();
        $destination_blog->delete();
        $request->session()->flash('alert-danger', 'destination was successful delete()!');
        return redirect()->back();
    }
    
}
