<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

Route::get('/', function () {
    return view('welcome');
});
Route::post('generate', function (Request $request) {
    $email = $request->email;
    $user = User::where('email', $email)->get();
    if ($user->isEmpty()) {
        // $this->userErr = "User not found";
        return redirect()->back()->with('error', "User not found");
    }
    $user = $user->first();
    $filename = 'CELEC-HUAWEI-' . $user->fullname . "-QR.png";
    $qrContent = $user->fullname . "_" . time();
    QrCode::size(1000)->format('png')->gradient(5, 18, 135, 46, 60, 163, 'diagonal')->generate($qrContent, storage_path('qrs/' . $filename));
    return response()->download(storage_path('qrs/' . $filename));
});
Route::get('/importUsers', function () {
    return view('import');
});

Route::POST('import', [UserController::class, 'import']);

Route::GET("users/check/{id}", [UserController::class, "verify"]);
