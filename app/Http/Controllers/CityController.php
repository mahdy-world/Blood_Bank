<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\City;
use App\models\Governorate;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = City::paginate(30);
        return view('city.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = City::pluck('name','id')->toarray();
        return view('city.create',compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'governorate_id' => 'required|numeric'
        ];
        $message = [
            'name.required' => 'مطلوب',
            'governorate_id.required' => 'المحافظة مطلوبة'
        ];

        $this->validate($request , $rules , $message);

        $record = City::create($request->all());
        flash()->success('تم الاضافة بنجاح');
        return redirect(route('city.index'));
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
        $model = City::findOrFail($id);
        return view('city.edit',compact('model'));
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
        $records = City::findOrFail($id);
        $records->update($request->all());
        flash()->success('تم التعديل بنجاح');
        return redirect(route('city.index'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $records = City::findOrFail($id);
       $records->delete();
       flash()->success('تم الحذف بنجاح');
        return back();
    }
}
