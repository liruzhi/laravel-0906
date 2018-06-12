<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public $group = [];

    public function index()
    {
        dd('2018-06-07 10:10:10'<'2018/06/07 10:10:09');
    }
}


