<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Governorate;
use Illuminate\Support\Facades\Auth;
use App\models\city;
use App\models\Setting;
use App\models\Contact;



class MainController extends Controller
{
  
    public function governorates()
    {
        $governorates = Governorate::all();
        return responseJson(1, 'success', $governorates);
    }

    public function cities(Request $request)
    {
        $cities = City::where(function ($query) use($request){
            if($request->has('governorate_id'))

            {
                $query->where('governorate_id' ,$request->governorate_id);
            }

        })->get();
        return responsejson(1,'success',$cities);
    }

    public function setting()
    {
        $setting = Setting::all();
        return responsejson(1,'success',$setting);
    }

    public function contact(Request $request)
    {
        $validator = validator()->make($request->all(),[
            'name'  => 'required',
            'email' => 'required',
            'title' => 'required',
            'message' => 'required',
            'number_phone' => 'required'

        ]);

        if($validator->fails()){

            return responsejson(0,$validator->errors()->first(),$validator->errors());

        }

        $contact = Contact::create($request->all());
        $contact->save();
        return responsejson(1,'تم الارسال بنجاح',[
            'contact' => $contact
        ]) ;

    }


}
