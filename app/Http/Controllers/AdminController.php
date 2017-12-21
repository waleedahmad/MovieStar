<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getIndex()
    {
        return view('admin.index');
    }

    public function getAdmins()
    {
        return view('admin.admins');
    }

    public function getUsers()
    {
        return view('admin.users');
    }

    public function addAdmin()
    {
    }

    public function saveAdmin(Request $request)
    {
    }


    public function deleteAdmin(Request $request)
    {
    }


    public function editAdmin($id)
    {
    }

    public function updateAdmin(Request $request)
    {
    }
}
