<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function verify(string $id)
    {
        $data = explode("_", $id);
        if (count($data) !== 2) {
            return response(null, 401);
        }
        $user  = User::where('fullname', $data[0])->get();
        if ($user->isEmpty()) {
            return response(null, 401);
        }
        $user->first()?->increment('checks');
        return response(null, 200);
    }

}
