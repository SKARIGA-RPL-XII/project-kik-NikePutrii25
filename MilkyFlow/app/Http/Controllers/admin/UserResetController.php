<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserResetController extends Controller
{
    public function resetPassword($id)
    {
        $user = User::findOrFail($id);

        $newPassword = Str::random(8);

        $user->password = Hash::make($newPassword);
        $user->save();

        // kirim email (sementara skip dulu kalau mau ngetes)
        /*
        Mail::to($user->email)->send(
            new ResetPasswordMail($newPassword)
        );
        */

        return response()->json([
            'success' => true
        ]);
    }
}