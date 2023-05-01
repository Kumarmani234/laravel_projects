<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    //
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    
    public function showprofiledata()
    {
        $currentUserData=User::find(Auth::user()->id);
        return view('Admin.showprofile',compact('currentUserData'));
    }

    public function editprofiledata()
    {
       $id=Auth::User()->id;
       $currentUserData=User::find($id);
       return view('Admin.editprofile',compact('currentUserData'));
    }

    public function updateprofiledata(Request $request)
    {
        $id=Auth::user()->id;
        $data=user::find($id);
        $data->name=$request->name;
        $data->username=$request->username;
        $data->phoneno=$request->phoneno;
        $data->email=$request->email;

        if($request->file('image'))
        {
            $file=$request->file('image');
            $filename=date('Y-m-d-H').'_'.$file->getClientOriginalName();
            $file->move(public_path('profile_image'),$filename);
            //note this syntax too works.......//data['images']=$filename;
            $data->image=$filename;
        }
        $data->save();
        return redirect()->route('SHOWPROFILE');
    }
}
