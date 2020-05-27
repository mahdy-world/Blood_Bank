<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(Setting $model)
    {
        if ($model->all()->count() > 0) {
            $model = Setting::find(1);
        }
        return view('settings.edit', compact('model'));
    }

    public function update(Request $request, $id)
    {

       $record = Setting::findOrFail($id);
       $record->update($request->all());
       flash()->success('تم التعديل بنجاح');
       return back();

        if (Setting::all()->count() > 0) {
            Setting::find(1)->update($request->all());
        } else {
            Setting::create($request->all());
        }
        flash()->success('تم الحفظ بنجاح');
        return back();


    }
}
