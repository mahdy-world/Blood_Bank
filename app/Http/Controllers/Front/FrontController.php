<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Post;
use App\models\Contact;
use App\models\Setting;
use App\models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function home()
    {
        $posts = Post::take(8)->get();
        return view('front.home', compact('posts'));
    }

    public function aboute()
    {
        return view('front.aboute');
    }

    public function contactUs()
    {
        return view('front\contact');
    }

    public function posts()
    {    $settings = Setting::first();
        $posts = Post::paginate(12);
     //$fav=Client::with('posts')->where('client_id',auth('client')->user()->id)->where('post_id',1);
        return view('Front.posts');
    }

    public function fav(Request $request)
    {
        $favourites = $request->user()->posts()->toggle($request->post_id);
        return responseJson(1,'success',$favourites);
    }

    public function post($id)
    {
        $post = Post::findOrFail($id);
        $settings = Setting::first();
        $posts = Post::paginate(12);
        return view('Front.post', compact('post','settings', 'posts'));
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'number_phone' => 'required',
            'title' => 'required',
            'message' => 'required',
        ], [
            'name.required' => 'يجب كتابه الاسم',
            'email.required' => 'يجب كتابه الايميل',
            'number_phone.required|number' => 'يجب كتابه رقم الهاتف',
            'title.required' => 'يجب كتابه عنوان للرساله',
            'message.required' => 'يجب كتابه الرساله',
        ]);

        $record = Contact::create($request->all());
        flash()->success("تمت الاضافه بنجاح");
        return redirect(url('contactUs'));
    }

    
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:clients',
            'number_phone' => 'required|unique:clients',
            'password' => 'required',
            'date_of_birth' => 'required',
            'blood_type_id' => 'required',
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
        return view('front\auth\login');
     
        }


        public function showlogin()
        {   
            $settings =Setting::first(); 
            return view('front\auth\login',compact('settings'));
        }

        public function cheacklogin(Request $request)
        {

            $rememberme = request('rememberme') == 1 ? true : false;
            if(auth()->guard('clients')->attempt(['number_phone'=> request('number_phone') , 'password'=> request('password')], $rememberme )){
                return redirect()->route('blood');
            }else{
                return back()->with('erroe','بيانات تسجيل الدخول غير صحيحة');
            }

        }
}
  