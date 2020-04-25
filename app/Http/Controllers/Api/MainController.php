<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Governorate;
use Illuminate\Support\Facades\Auth;
use App\models\city;
use App\models\Setting;
use App\models\Contact;
use App\models\Category;
use App\models\Notification;
use App\models\DonationRequest;




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

    public function categories()
    {
        $categories = Category::paginate(10);
        return responsejson(1,'success',$categories);
    }


    public function notifications()
    {
        $notifications = Notification::paginate(10);
        return responsejson(1,'success',$notifications);
    }

    public function donationRequests()
    {
        $donation = DonationRequest::paginate(10);
        return responsejson(1,'success',$donation);
    }

    public function createDonationRequests(Request $request)
    {
        $validator = validator()->make($request->all(),[
            'name' => 'required',
            'age' => 'required',
            'blood_type_id' => 'required',
            'number_of_blood_bags' => 'required',
            'hospital_name' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'city_id' => 'required',
            'number_phone' => 'required',
            'notes' => 'required',
            'client_id' => 'required',
        ]);

        if($validator->fails()){
            return responsejson(0,$validator->errors()->first(),$validator->errors());
        }

        $donationRequests = $request->user()->donationRequests()->create($request->all());
        $clientsIds= $donationRequests ->city->governorate
        ->clients()->whereHas('bloodtypes', function ($q) use ($request, $donationRequests) {
            //                dd($donationRequests->blood_type_id);
                            $q->where('blood_types.id', $donationRequests->blood_type_id);
                        })->pluck('clients.id')->toArray();
                    $send = null;
                    if (count($clientsIds)) {
                        $notification = $donationRequests->notifications()->create([
                            'title' => 'احتاج متبرع لفصيله',
                            'body' => $donationRequests->blood_type . 'محتاج متبرع لفصيلة ',
                        ]);
                        $notification->clients()->attach($clientsIds);

                        $tokens = Token::whereIn('client_id', $clientsIds)->where('token', '!=', null)->pluck('token')->toArray();
                        if (count($tokens)) {
                            $title = $notification->title;
            //                dd($title);
                            $body = $notification->body;
            //                dd($body);
                            $data = [
                                'donation_request_id' => $donationRequests->name
                            ];
                            $send = notifyByFirebase($title, $body, $tokens, $data);
            
                        }
            
            //            $tokens = $client->tokens()->where('token', '!=', '')
            //                ->whereIn('client_id', $clientsIds)->pluck('token')->toArray();
                    }
                    return responseJson(1, 'تمت الاضافه بنجاح', $send);
                
    }


}
