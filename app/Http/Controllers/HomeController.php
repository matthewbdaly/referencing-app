<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

final class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();
        return view('home', [
            'projects' => $user->projects,
        ]);
    }
}
