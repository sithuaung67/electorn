<?php

namespace App\Http\Controllers\Auth;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;


class CustomerRegisterController extends Controller
{
    
   use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('guest:customer');
    }

     public function showCustomerRegisterForm()
    {
        return view('auth.customer_register', ['url' => 'customer']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {   
         $validator = Validator::make($request->all(), [
            'name' => 'required|string|',
            'email' => 'required|string|email|unique:users',
            'phone'=>'required',
            'occupation'=>'required',
            'nrc'=>'required',
        ]);
        Customer::create($request->all());

        $customer=Customer::where('email', $request->email)->orderBy('created_at','desc')->first();
        $point=$customer->point;
        
        Customer::where('point',$point)->update(['point'=>'50']);

        return response()->json('You are successfully');

        // if($validator->fails()){
        //     return $this->sendError($validator->errors());       
        // }

        // $input = $request->all();
        // $user = Customer::create($input);

        // if($user){
        //     $success['token'] =  $user->createToken('token')->accessToken;
        //     $success['message'] = "Registration successfull..";
        //     return $this->sendResponse($success);
        // }
        // else{
        //     $error = "Sorry! Registration is not successfull.";
        //     return $this->sendError($error, 401); 
        // }
            
    }
   

   
}
