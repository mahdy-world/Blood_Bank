<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\models\Client;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = validator()->make($request->all(),[

            'name' => 'required',
            'email' => 'required|unique:clients',
            'date_of_birth'=>'required',
            'city_id'=>'required',
            'number_phone'=>'required',
            'last_donation_data'=>'required',
            'password'=>'required|confirmed',
            'blood_type_id'=>'required',

        ]);

        if($validator->fails())
        {
            return responsejson(0,$validator->errors()->first(),$validator->errors());
        }

        $request->merge(['password'=>bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = str_random(60);
        $client->save();

        return responsejson(1,'تم الاضافة بنجاح',[

            'api_token'=>$client->api_token,
            'client'=>'$client'
        ]);

    }

    public function login(Request $request)
    {
        $validator = validator()->make($request->all(),[
            'email' => 'required',
            'password'=>'required'
        ]);

        if($validator->fails()){

            return responsjson(0,$validator->errors()->first(),$validator->errors());
        }

        $client = Client::where('email',$request->email)->first();

        if($client){

            if(Hash::check($request->password, $client->password))
            {
                return responsejson(1,'تم التسجيل بنجاح',[
                    'api_token'=>$client->api_token ,
                    'client'=>$client
                ]);
            }else {
                return responsjson(0,'بيانات غير صحيحة');
            }

        }else{
            return responsejson(0,'بيانات غير صحيحة');
        }
    }
}
