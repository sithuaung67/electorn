<?php

namespace App\Http\Controllers\Api\Chatting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chatting\Chatting;
use App\Models\Popup\Popup;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ChattingApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popup=Popup::where('popup_id','1')->first();
        return response()->json($popup);
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
        $image_one=$request->file('image');
        $name_one=time();
        if($image_one)
         {
            foreach($image_one as $file)
            {
                $name = $name_one++.'.'.$file->getClientOriginalExtension();
                Storage::disk('chatting')->put($name, File::get($file));
                $chat2=Chatting::create([
                    "image"=>$name
                ]);
                $value_image[]=$chat2;
            }
         }
        return response()->json($value_image);
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
