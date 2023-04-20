<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TestSendMailController extends Controller
{
    public function sendMail()
    {
        $name = Auth::user()->name;

        $arrMail = [];
        foreach ($arrMail as $email) {
            Mail::to($email)->send(new TestMail($name));
        }
        //send mail to user/admin check TestMail template
    }
}