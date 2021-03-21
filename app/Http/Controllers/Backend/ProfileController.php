<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index(){
        return view('backend.pages.profile.index');
    }
    public function update(Request $request){
        // dd($request->all());
        $auth_id = Auth::guard('admin')->user()->id;
        $request->validate([
            'name' => 'required|max:70|min:3',
            'email' => 'required|email|max:100|unique:admins,email,' . $auth_id,
            'username' => 'required|max:100|unique:admins,username,' . $auth_id,
            'phone' => ['sometimes','regex:/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/'],
        ]);
        $admin = Admin::findOrFail($auth_id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        $admin->phone = $request->phone;
        if($request->image != null){
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg'
            ]);
            $image = $request->image;
        
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            // dd($imageName);

            if(!Storage::disk('public')->exists('profile')){
                Storage::disk('public')->makeDirectory('profile');
            }
            //delete old image
            if(Storage::disk('public')->exists('profile')){
                Storage::disk('public')->delete('profile/' . $admin->image);
            }


            $profileImage = Image::make($image)->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->stream();
            Storage::disk('public')->put('profile/'.$imageName,$profileImage);
            
        }else{
            $imageName = $admin->image;
        }
        $admin->image = $imageName;
        $admin->updated_at = Carbon::now();

        if($admin->save()){
            $notification=array(
                'message'=>'Successfully Update Profile!',
                'alert-type'=>'success'
            );

        }
        return redirect()->back()->with($notification);
    }
    public function password(){
        return view('backend.pages.profile.change-password');
    }

    public function passwordUpdate(Request $request){
        $auth_id = Auth::guard('admin')->user()->id;
        $request->validate([
            'old' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);
        if(Auth::attempt(['id'=>$auth_id,'password'=>$request->old])){
            $user = Admin::find($auth_id);
            $user->password = bcrypt($request->password);
            $update = $user->save();
            if($update){
                $notification=array(
                    'message'=>'Successfully Change Your Password',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
            }else{
                $notification=array(
                    'message'=>'Something went worng!',
                    'alert-type'=>'error'
                );
                //return Redirect()->back()->with($notification);
                return redirect()->back()->with($notification);
            }
        }else{
            $notification=array(
                'message'=>'Your Current Password is worng!',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
