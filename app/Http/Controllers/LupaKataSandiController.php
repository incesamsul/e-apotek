<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPasswordMail;
use App\Models\PasswordResets;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Twilio\Rest\Client;

class LupaKataSandiController extends Controller
{

    /**
     * Halaman data pendaftar
     */
    public function index($response = null)
    {
        $data['response'] = $response;
        return view("auth.lupa_kata_sandi", $data);
    }


    public function kirimKonfirmasiWa(Request $request)
    {
        $user = User::where('wa', $request->wa)->first();
        if (!$user) {
            return redirect()->back()->with(['error' => 'wa tidak dikenali']);
        }

        $kodeReset = Str::random(200);
        PasswordResets::create([
            'wa' => $user->wa,
            'token' => $kodeReset
        ]);

        $resetLink = 'ini adalah link lupa password anda, jangan bagikan link ini kepada siapapun https://testapp.APT. Wahid farma.tech/reset-password/' . $kodeReset;
        sendWhatsAppMessage($user->wa, $resetLink);
        return redirect('lupa-kata-sandi/200');
    }


    public function getResetPassword($kodeReset)
    {
        $passwordResetData = PasswordResets::where('token', $kodeReset)->first();
        if (!$passwordResetData || Carbon::now()->subMinutes(10) > $passwordResetData->created_at) {
            return redirect()->route('lupa-kata-sandi')->with('error', 'link reset password tidak valid atau sudah expired');
        } else {
            return view('auth.reset_password', compact('kodeReset'));
        }
    }

    public function resetPassword($kodeReset, Request $request)
    {
        $passwordResetData = PasswordResets::where('token', $kodeReset)->first();
        if (!$passwordResetData || Carbon::now()->subMinutes(10) > $passwordResetData->created_at) {
            return redirect()->route('lupa-kata-sandi')->with('error', 'link reset password tidak valid atau sudah expired');
        } else {
            $user = User::where('wa', $passwordResetData->wa)->first();
            if ($user->wa != $request->wa) {
                return redirect()->back()->with('error', 'wa tidak sesuai');
            } else {
                if ($request->password == $request->konfirmasi_password) {
                    PasswordResets::where('token', $kodeReset)->delete();
                    $user->update([
                        'password' => bcrypt($request->password)
                    ]);
                    return redirect()->route('login')->with('success', 'password berhasil direset');
                } else {
                    return redirect()->back()->with('error', 'konfirmasi password salah');
                }
            }
        }
    }
}
