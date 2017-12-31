<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function getStaff()
    {
        $staffers = User::where('role', '=', 'staff')->get();
        return view('admin.staff.staff')->with('staffers', $staffers);
    }

    public function addStaff()
    {
        return view('admin.staff.add');
    }

    public function saveStaff(Request $request)
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
            $admin->role = 'staff';
            if($admin->save()){
                return redirect('/admin/staff');
            }
        }else{
            return redirect('/admin/staff/add')->withErrors($validator)->withInput();
        }
    }


    public function deleteStaff(Request $request)
    {
        $staff = User::find($request->id);
        if($this->deleteImage($staff->image_uri)){
            return response()->json([
                'deleted' => $staff->delete()
            ]);
        }
    }


    public function editStaff($id)
    {
        $staff = User::find($id);
        return view('admin.staff.edit')->with('staff', $staff);
    }

    public function updateStaff(Request $request)
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
            $admin->role = 'staff';

            if($admin->save()){
                return redirect('/admin/staff');
            }
        }else{
            return redirect('/admin/staff/'.$request->id.'/edit')->withErrors($validator)->withInput();
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
