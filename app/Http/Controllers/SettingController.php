<?php

namespace App\Http\Controllers;

use App\Models\AdminSetting;
use Illuminate\Http\Request;
class SettingController extends Controller
{

    public function add()
    {
        return view('admin.setting.add');
    }

    public function create(Request $request)
    {
        AdminSetting::getNewSetting($request);
        return redirect()->back()->with('message', 'New Setting Added Successfully');
    }

    public function edit($id)
    {
        return view('admin.setting.edit',[
            'setting' => AdminSetting::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        AdminSetting::updateSetting($request, $id);
        return redirect('/manage-setting')->with('message', 'Setting Updated Successfully');


    }

    public function delete(Request $request, $id)
    {
        AdminSetting::deleteSettiing($id);
        return redirect('/manage-setting')->with('message', 'Setting Deleted Successfully');


    }

    public function manage()
    {
        return view('admin.setting.manage',[
            'settings' => AdminSetting::all(),
        ]);
    }
}
