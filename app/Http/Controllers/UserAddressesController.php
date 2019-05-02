<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAddressesController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('user_addresses.index', [
            //这个request只能针对当前用户吗?
            'addresses' => $request->user()->addresses,
        ]);
    }
}
