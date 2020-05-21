<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Role::paginate(30);
        return view('roles.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
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
            'name' => 'required|unique:roles,name',
            //'permissions_list'=>'required|array'
        ];

        $message = [
            'name.required' =>'الاسم مطلوب',
            'permissions_list.required' =>'الاسم مطلوب'
        ];

        $this->validate($request,$rules,$message);

        $record = Role::create($request->all());
        flash()->success("تم الاضافة بنجاح ");
        return redirect(route('roles.index'));
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
        $model = Role::findOrFail($id);
        return view('roles.edit', compact('model'));
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
        $record = Role::findOrFail($id);
        $record->update($request->all());
        flash()->success("تم التحديث بنجاح");
        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reocrd = Role::find($id);
        if(!$reocrd){
            return response()->json([
                'status' => 0,
                'message' => 'تعذر الحصول علي بيانات',
                'id'=> $id
            ]);
        }

        $reocrd->delete();
        return response()->json([
            'satus'=>1,
            'message'=>'تم الحذف بنجاح'
        ]);

    }
}
