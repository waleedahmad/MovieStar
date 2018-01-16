<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getSettings(){
        return view('settings');
    }

    public function updateSettings(Request $request){
        $validator = \Validator::make($request->all(), [
            'name'  =>  'required',
            'email' =>  'required|email|unique:users,email,'.Auth::user()->id,
            'phone_no' => $request->phone_no ? 'required' : '',
            'gender' => $request->gende ? 'required' : '',
            'photo' => $request->hasFile('photo') ? 'required|image' : ''
        ]);


        if($validator->passes()){
            $admin = User::find(Auth::user()->id);

            if($request->hasFile('photo')){
                $this->deleteImage($admin->image_uri);
            }
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone_no = $request->phone_no;
            $admin->gender = $request->gender;
            $admin->image_uri = $request->hasFile('photo') ? $this->saveImageAndGetURI($request->photo) : $admin->image_uri;

            if($admin->save()){
                return redirect('/settings');
            }
        }else{
            return redirect('/settings')->withErrors($validator)->withInput();
        }
    }

    private function saveImageAndGetURI($image){
        $path = Storage::disk('public')->putFileAs(
            'profile', $image, str_random(10) .'.'.$image->getClientOriginalExtension()
        );
        return $path;
    }

    private function deleteImage($image){
        if($image != 'default/profile.jpg'){
            return Storage::disk('public')->delete($image);
        }
        return true;
    }
}
