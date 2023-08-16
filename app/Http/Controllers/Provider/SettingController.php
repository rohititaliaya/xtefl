<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        return view('provider.settings.index');
    }

    public function store(Request $request) {
        $logo = null;
        if ($request->logo) {
            $logo = time().'.'. $request->logo->extension();
            $request->logo->move(public_path('uploads'), $logo);
        }
        $request->user()->name = $request->name;
        $request->user()->logo = $logo;
        $request->user()->website = $request->website;
        $request->user()->email = $request->email;
        $request->user()->save();
        return redirect()->back()->with('success','Settings Saved succesfully !');
    }
}
