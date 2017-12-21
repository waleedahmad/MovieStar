<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScreeningController extends Controller
{
    public function getScreenings()
    {
        return view('admin.screenings.screenings');
    }


    public function addScreening()
    {
    }

    public function saveScreening(Request $request)
    {
    }


    public function deleteScreening(Request $request)
    {
    }


    public function editScreening($id)
    {
    }

    public function updateScreening(Request $request)
    {
    }
}
