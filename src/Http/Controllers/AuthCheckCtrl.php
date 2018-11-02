<?php

namespace devsrv\sessionout\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AuthCheckCtrl extends Controller
{
    /**
     * ping the server to check whether user is online
     */
    public function getStatus(Request $request)
    {
        $request->validate([
            'pinguser' => 'required|boolean'
        ]);

        if (Auth::check())
            return response()->json(['auth' => 1]);
        else
            return response()->json(['auth' => 0]);
    }
}
