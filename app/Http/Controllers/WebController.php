<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function about()
{
    return view("about");
    }
public function contact()
{
    return view("contact");
}
public function home()
{
    return view("home");
}
public function recipes()
{
    return view("recipes");
}
public function viewrecipe()
{
    return view("viewrecipe");
}
public function adminlogin()
{
    return view("adminlogin");
}
}
