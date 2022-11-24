<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function import(Request $request)
    {
        $path = $request->file('excel')->store('excel');
        Excel::import(new UsersImport, $path);
        
        return redirect('/')->with('success', 'All good!');
    }
}
