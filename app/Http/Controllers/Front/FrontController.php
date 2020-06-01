<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Post;
use App\models\Contact;

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
    {   
        $posts = Post::first();
        return view('front.posts' , compact('posts'));
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
    
}

