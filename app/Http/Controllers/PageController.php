<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use MyTime;
use Symfony\Component\VarDumper\Cloner\Data;

class PageController extends Controller
{
    public function page() {

        //$time = new MyTime();


        return view('layouts/app')->with(['time' => MyTime::timeNow()]);
    }
}
