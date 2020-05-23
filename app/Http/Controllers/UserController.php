<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = User::paginate(30);
        return view('users.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>'required',
            'email' => 'required|email|unique:users,email,' . $request->user()->id,
            'password'  =>'required|confirmed|min:8',
            'roles_list' => 'required'
        ], [
            'name.required' => 'Name is Required',
            'email.required' => 'Email is Required',
            'password.required' => 'Password Id is Required',
            'roles_list.required' => 'Roles List Id is Required'
        ]);
        $request->merge(['password'=>bcrypt($request->password)]);
        $user = User::create($request->except('roles_list'));
        $user->roles()->attach($request->input('roles_list'));
//        $record = User::create($request->all());
        flash()->success("Success");
        return redirect(route('users.index'));
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
        $model = User::findOrFail($id);
        return view('users.edit', compact('model'));
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
        $records = User::findOrFail($id);
        $this->validate($request, [
            'name'      =>'required',
            'email'     =>'required|email|unique:users,email,'.$id,
            'password'  =>'sometimes|nullable|confirmed',
            'roles_list' => 'required'
        ], [
            'name.required' => 'Name is Required',
            'email.required' => 'Email is Required',
            'password.required' => 'Password Id is Required',
            'roles_list.required' => 'Roles List Id is Required'
        ]);
        $records->roles()->sync((array) $request->input('roles_list'));
        $records->update($request->except('password'));
        if (request()->input('password')) {
//            dd($request->password);
            $records->update(['password'=>bcrypt($request->password)]);
        }
        flash()->success('تم التعديل بنجاح');
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = User::findOrFail($id);
        $record->delete();
        flash()->success('Deleted');
        return back();
    }
}
