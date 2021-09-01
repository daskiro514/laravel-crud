<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class PaypalController extends Controller
{
    public function index()
    {
        return view('components.products');
    }

    public function products()
    {
        return view('components.products');
    }

    public function plans()
    {
        return view('components.plans');
    }

    public function subscriptions()
    {
        return view('components.subscriptions');
    }
}
