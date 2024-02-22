<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Basic
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("homePage");
    }


}
