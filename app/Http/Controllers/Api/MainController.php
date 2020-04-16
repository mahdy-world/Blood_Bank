<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Governorate;
use Illuminate\Support\Facades\Auth;
use App\models\city;



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
}
