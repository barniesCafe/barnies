<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Auth2enticationController extends Controller
{
    public function register(Request $request)
    {
        return response(([
            'Message'=>'api is working'
      ]),200);
    }
}
