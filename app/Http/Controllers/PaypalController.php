<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use leifermendez\paypal\PaypalSubscription;

class PaypalController extends Controller
{
    public function __construct()
    {
        $this->app_id = env('PAYPAL_APP_ID');
        $this->app_sk = env('PAYPAL_APP_SK');
        $this->mode = env('PAYPAL_APP_MODE');
        $this->paypalSubscription = new PaypalSubscription($this->app_id, $this->app_sk, $this->mode);
        dd($this->app_id, $this->app_sk, $this->mode);
    }

    public function index()
    {
        return view('components.products');
    }

    public function products()
    {
        // $response = $this->paypalSubscription::getProduct();
        // $products = $response['products'];
        // return view('components.products')->with('products', $products);
        return view('components.products');
    }

    public function createProduct(Request $request)
    {
        $request->validate([
            'productName' => 'required',
            'description' => 'required',
        ]);

        $data = $request->all();

        $productForCreate = [
            'name' => $data['productName'],
            'description' => $data['description'],
            'type' => 'SERVICE',
        ];

        $this->paypalSubscription::createProduct($productForCreate);

        return redirect()->intended('products');
    }

    public function updateProduct(Request $request)
    {
        $request->validate([
            'productID' => 'required',
            'productName' => 'required',
            'description' => 'required',
        ]);

        $data = $request->all();

        // dd($this->paypalSubscription::editProduct());
        // dd(get_class_methods($this->paypalSubscription));

        // $productForCreate = [
        //     'name' => $data['productName'],
        //     'description' => $data['description'],
        //     'type' => 'SERVICE',
        // ];

        return redirect()->intended('products');
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
