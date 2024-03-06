<?php

namespace App\Livewire\App\User\Auth;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordComponent extends Component
{
    public $email;

    public function sendEmail()
    {

        $this->validate([
            'email' => 'required',
        ]);

        $getAdmin = User::where('email', $this->email)->first();
        if ($getAdmin != '') {
            $this->send($this->email);
            session()->flash('success', 'Email send successfully!');
        } else {
            session()->flash('error', 'No user available in this email.');
        }
    }

    public function send($email)
    {
        $data['email'] = $email;
        $data['token'] = $this->createToken($email);

        Mail::send('emails.user-forget-password', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject('Reset Password');
        });
    }

    public function createToken($email)
    {
        $oldToken = DB::table('password_resets')->where('email', $email)->first();

        if ($oldToken) {
            return $oldToken->token;
        } else {
            $token = Str::random(40);

            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            return $token;
        }
    }

    #[Title('Forget Password')]
    public function render()
    {
        return view('livewire.app.user.auth.forgot-password-component')->layout('livewire.app.layouts.base');
    }
}
