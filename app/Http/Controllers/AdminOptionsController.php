<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AdminOptionsController extends Controller
{
    public function index()
    {
        return view('admin.options.index');
    }
}
