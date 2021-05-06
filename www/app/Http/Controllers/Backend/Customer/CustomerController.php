<?php

namespace App\Http\Controllers\Backend\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer\Customer;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CustomerController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['index','store']]);
         $this->middleware('permission:customer-create', ['only' => ['create','store']]);
         $this->middleware('permission:customer-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:customer-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_customer=Customer::orderBy('created_at','desc')->count();
        $customers=Customer::all();
        $customer=Customer::orderBy('created_at','DESC')->paginate(30);
        return view('backend.customer.index',compact('customer','count_customer','customers'));
    }

    public function search(Request $request)
    {
        $name=$request['name'];
        $phone_email_google=$request['phone_email_google'];
        $gmail=$request['gmail'];
        $passport_number=$request['passport_number'];

        $count_customer=Customer::orderBy('created_at','desc')->count();
        $customers=Customer::all();
        $customer=Customer::orderBy('created_at','DESC')
        ->where("name","LIKE","%$name%")
        ->where("phone_email_google","LIKE","%$phone_email_google%")
        ->where("gmail","LIKE","%$gmail%")
        ->where("passport_number","LIKE","%$passport_number%")
        ->paginate(30);
        return view('backend.customer.index',compact('customer','count_customer','customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image=$request->file('customer_image');
        $name=time();

        $customer=new Customer();
        if($request->customer_image){
            $image_name=$name.'.'.$request->file('customer_image')->getClientOriginalExtension();
            $customer->customer_image=$image_name;
            Storage::disk('customer')->put($image_name, File::get($image));
        }

        $customer->customer_type=$request['customer_type'];
        $customer->name=$request['name'];
        $customer->phone_email_google=$request['phone_email_google'];
        $customer->gmail=$request['gmail'];
        $customer->phone=$request['phone'];
        $customer->birthday=$request['birthday'];
        $customer->passport_number=$request['passport_number'];
        $customer->issue_date=$request['issue_date'];
        $customer->expire_date=$request['expire_date'];
        $customer->total_point=$request['total_point'];
        $customer->save();
        return redirect('admin/customer');
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
        $customer=Customer::findOrFail($id);
        return view('backend.customer.edit',compact('customer'));
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
        $customer=Customer::where('customer_id',$id)->first();
        if($request->customer_image){
            Storage::disk('customer')->delete($customer->customer_image);
            $image=$request->file('customer_image');
            $name=time();
            $image_name=$name.'.'.$request->file('customer_image')->getClientOriginalExtension();
            $customer->customer_image=$image_name;
            Storage::disk('customer')->put($image_name, File::get($image));
        }
       $customer->customer_type=$request['customer_type'];
        $customer->name=$request['name'];
        $customer->phone_email_google=$request['phone_email_google'];
        $customer->gmail=$request['gmail'];
        $customer->phone=$request['phone'];
        $customer->birthday=$request['birthday'];
        $customer->passport_number=$request['passport_number'];
        $customer->issue_date=$request['issue_date'];
        $customer->expire_date=$request['expire_date'];
        $customer->total_point=$request['total_point'];
        $customer->update();
        return redirect('admin/customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer=Customer::where('customer_id',$id)->FirstOrFail();
        Storage::disk('customer')->delete($customer->customer_image);
        $customer->delete();
        return redirect('admin/customer');
    }
}
