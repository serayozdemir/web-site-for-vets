<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function generalExamination()
    {
        // your code here
        return view('generalExamination'); 
    }
    public function vaccine()
    {
        return view('vaccine'); 
    }
    public function microchipApplication()
    {
        return view('microchipApplication');
    }
}
