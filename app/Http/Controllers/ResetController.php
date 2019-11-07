<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\ResetNotification;

class ResetController extends Controller
{
  public function ResetNotification(Request $request)
  {
    $name = 'ララベル太郎';
    $text = 'これからもよろしくお願いいたします。';
    $to = $request->email;
    Mail::to($to)->send(new ResetNotification($name, $text));
  }
}