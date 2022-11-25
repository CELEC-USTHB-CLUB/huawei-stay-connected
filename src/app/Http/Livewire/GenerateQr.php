<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GenerateQr extends Component
{
    protected $rules = [
        'email' => 'required|email',
    ];

    public $email;
    public $userErr;

    public function render()
    {
        return view('livewire.generate-qr');
    }

    public function submit()
    {
        $this->validate();
        $user = User::where('email', $this->email)->get();
        if ($user->isEmpty()) {
            $this->userErr = "User not found";
            return false;
        }
        $user = $user->first();
        $filename = 'CELEC-HUAWEI-'.$user->fullname."-QR.png";
        $qrContent = $user->fullname."_".time();
        QrCode::size(1000)->format('png')->gradient(5, 18, 135, 46, 60, 163, 'diagonal')->generate($qrContent, public_path('qrs/'.$filename));
        return response()->download(public_path('qrs/'.$filename));
        // return response()->streamDownload(function () use ($user) {
        //     echo QrCode::size(1000)->format('png')->gradient(5, 18, 135, 46, 60, 163, 'diagonal')->generate($user->fullname."_".time());
        // }, 'CELEC-HUAWEI-'.$user->fullname."-QR.png");
    }
}
