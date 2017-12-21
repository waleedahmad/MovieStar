<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function getReports()
    {
        return view('admin.reports.reports');
    }
}
