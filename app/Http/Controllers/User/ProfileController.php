<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\User;

class ProfileController extends Controller
{
    public function index(){
        return view('user.pages.profile.index');
    }
    public function update(Request $request){
        // dd($request->all());
        $auth_id = Auth::user()->id;
        $request->validate([
            'name' => 'required|max:70|min:3',
            'email' => 'required|email|max:100|unique:users,email,' . $auth_id,
            'phone' => ['sometimes','regex:/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/'],
        ]);
        $user = User::findOrFail($auth_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->about = $request->about;
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
                Storage::disk('public')->delete('profile/' . $user->image);
            }


            $profileImage = Image::make($image)->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->stream();
            Storage::disk('public')->put('profile/'.$imageName,$profileImage);
            
        }else{
            $imageName = $user->image;
        }
        $user->image = $imageName;
        $user->updated_at = Carbon::now();

        if($user->save()){
            $notification=array(
                'message'=>'Successfully Update Profile 🥰',
                'alert-type'=>'success'
            );

        }
        return redirect()->back()->with($notification);
    }
    public function password(){
        return view('user.pages.profile.change-password');
    }

    public function passwordUpdate(Request $request){
        $auth_id = Auth::user()->id;
        $request->validate([
            'old' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);
        if(Auth::attempt(['id'=>$auth_id,'password'=>$request->old])){
            $user = User::find($auth_id);
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
