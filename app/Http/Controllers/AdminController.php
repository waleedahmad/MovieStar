<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function getIndex()
    {
        return view('admin.index');
    }

    public function getAdmins()
    {
        $admins = User::where('role', '=', 'admin')->get();
        return view('admin.admins.admins')->with('admins', $admins);
    }

    public function getUsers()
    {
        $customers = User::where('role', '=', 'user')->get();
        return view('admin.customers.customers')->with('customers', $customers);
    }

    public function addAdmin()
    {
        return view('admin.admins.add');
    }

    public function saveAdmin(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name'  =>  'required',
            'email' =>  'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'phone_no' => 'required',
            'gender' => 'required',
            'photo' => 'required|image'
        ]);

        if($validator->passes()){
            $admin = new User();
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = bcrypt($request->password);
            $admin->phone_no = $request->phone_no;
            $admin->gender = $request->gender;
            $admin->image_uri = $this->saveImageAndGetURI($request->photo);
            $admin->role = 'admin';
            if($admin->save()){
                return redirect('/admin/admins');
            }
        }else{
            return redirect('/admin/admins/add')->withErrors($validator)->withInput();
        }
    }


    public function deleteAdmin(Request $request)
    {
        $admin = User::find($request->id);
        if($this->deleteImage($admin->image_uri)){
            return response()->json([
                'deleted' => $admin->delete()
            ]);
        }
    }

    public function deleteUser(Request $request){
        $user = User::find($request->id);
        if($this->deleteImage($user->image_uri)){
            return response()->json([
                'deleted' => $user->delete()
            ]);
        }
    }


    public function editAdmin($id)
    {
        $admin = User::find($id);
        return view('admin.admins.edit')->with('admin', $admin);
    }

    public function updateAdmin(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name'  =>  'required',
            'email' =>  'required|email|unique:users,email,'.$request->id,
            'phone_no' => 'required',
            'gender' => 'required',
            'photo' => $request->hasFile('photo') ? 'required|image' : ''
        ]);


        if($validator->passes()){
            $admin = User::find($request->id);

            if($request->hasFile('photo')){
                $this->deleteImage($admin->image_uri);
            }
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone_no = $request->phone_no;
            $admin->gender = $request->gender;
            $admin->image_uri = $request->hasFile('photo') ? $this->saveImageAndGetURI($request->photo) : $admin->image_uri;
            $admin->role = 'admin';

            if($admin->save()){
                return redirect('/admin/admins');
            }
        }else{
            return redirect('/admin/admins/'.$request->id.'/edit')->withErrors($validator)->withInput();
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

    public function getSettings(){
        return view('admin.settings');
    }

    public function updateSettings(Request $request){
        $validator = \Validator::make($request->all(), [
            'name'  =>  'required',
            'email' =>  'required|email|unique:users,email,'.Auth::user()->id,
            'phone_no' => 'required',
            'gender' => 'required',
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
                return redirect('/admin/settings');
            }
        }else{
            return redirect('/admin/settings')->withErrors($validator)->withInput();
        }
    }
}
