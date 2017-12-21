<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function getStaff()
    {
        return view('admin.staff.staff');
    }

    public function addStaff()
    {
    }

    public function saveStaff(Request $request)
    {
    }


    public function deleteStaff(Request $request)
    {
    }


    public function editStaff($id)
    {
    }

    public function updateStaff(Request $request)
    {
    }
}
