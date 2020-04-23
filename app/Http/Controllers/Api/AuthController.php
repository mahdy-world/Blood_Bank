<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use App\Models\Token;
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
                return responsejson(0,'بيانات غير صحيحة');
            }

        }else{
            return responsejson(0,'بيانات غير صحيحة');
        }
    }



    public function resetpassword(Request $request)
    {
        $validator = validator()->make($request->all(),[
            'number_phone' => 'required'
        ]);

        if($validator->fails())
        {
            return responsejson(0,$validator->errors()->first(),$validator->errors());
        }

        $user = Client::where('number_phone',$request->number_phone)->first();
        if($user){
            $code = rand(1111,9999);
            $update = $user->update(['pin_code' => $code]);

            if($update)
            {
                //send sms
               // smsMisr($request->phone,"كود اعادة كلمة السر ".$code);

                //send email
                Mail::to($user->email)
                ->bcc("mmos7239@gmail.com")
                ->send(new Resetpassword($code));
                return responsejson(1,'برجاء فحص الهاتف',
                [
                    'pin_code' => $code,
                    'mail_fails' =>Mail::failures(),
                    'email' => '$user->email'
                
                ]);
            }else{
                return responsejson(0,'حدث خطأ حاول مرة اخري ');
            }

        }else{
            return responsejson(0,'حدث خطأ حاول مرة اخري ');
        }
    }

    public function newpassword(Request $request)
    {
        $validator = validator()->make($request->all(),
        [
            'pin_code' => 'required',
            'password' =>'required|confirmed',
            'number_phone' => 'required'
        ]);

        if($validator->fails()){
            return responsejson(0,$validator->errors()->first(),$validator->errors());
        }

        $user = Client::where('pin_code',$request->pin_code)->where('pin_code','!=',0)
        ->where('number_phone',$request->number_phone)->first();
        
        if($user)
        {
            $user ->password = bcrypt($request->password);
            $user ->pin_code = null;

            if($user->save())
            {
                return responsejson(1,'تم تغير كلمة السر بنجاح');
            }else{
                return responsejson(0,'حدث خطأ حاول مرة اخري');
            }
    
        }else{
            return responsejson(1,'هذا الكود غير صحيح');
        }

       
    }

    public function registerToken(Request $request)
    {
        $validator = validator()->make($request->all(),
        [
            'token' => 'required',
            'platform' => 'required|in:android,ios'
        ]);
        if($validator->fails()){
            return responsjson(0,$validator->errors()->first(),$validator->errors());
        }
        Token::where('token',$request->token)->delete();
        $request->user()->tokens()->create($request->all());
        return responseJson(1,'تم التسجيل بنجاح');
        
    }

    public function removeToken(Request $request)
    {
        $validator = validator()->make($request->all(),
        [
            'token' => 'required'
        ]);

        if($validator->fails()){
            return responsjson(0,$validator->errors()->first(),$validator->errors());

        }

        Token::where('token',$request->token)->delete();
        return responsjson(1,'تم الحذف بنجاح ');
    }
}
