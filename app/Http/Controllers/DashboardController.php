<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $companies = Companies::paginate(10);
        $employees = Employees::paginate(10);
        return view('dashboard', compact(['employees','companies']));
    }
}
