<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index() {
        return view('pages.home');
    }
    public function pageNotFound() {
        return view('pages.404');
    }
}
