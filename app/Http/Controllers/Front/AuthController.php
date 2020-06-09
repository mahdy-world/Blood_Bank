<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Setting;
use App\models\Governorate;
use App\models\Client;
use App\models\City;

class AuthController extends Controller
{
    public function signup()
    {
        $settings = Setting::first();
        $governorates = Governorate::all();
        $citis = City::all();
      
        return view('front.auth.signup',compact('settings','governorates','citis'));
    }


    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:clients',
            'number_phone' => 'required|unique:clients',
            'password' => 'required',
            'date_of_birth' => 'required',
            'brood_type_id' => 'required',
            'city_id' => 'required',
            'governorate_id' => 'required',
            'last_donation_data' => 'required',
        ], [
            'name.required' => 'يجب كتابه الاسم',
            'email.required' => 'يجب كتابه الايميل',
            'number_phone.required' => 'يجب كتابه رقم الهاتف',
            'password.required' => 'يجب كتابه الرقم السرى',
            'date_of_birth.required' => 'يجب كتابه تاريخ الميلاد',
            'blood_type_id.required' => 'يجب كتابه فصيلة الدم',
            'city_id.required' => 'يجب اختيار المدينه',
            'governorate_id.required' => 'يجب اختيار المحافظه',
            'last_donation_data.required' => 'يجب كتابة او اختيار اخر تاريخ للتبرع بالدم',
        ]);

        $request->merge(['password'=>bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = str_random(60);
        $client->save();
        flash()->success("تم انشاء الحساب بنجاح");
        return redirect(route('signup'));
     }
}
