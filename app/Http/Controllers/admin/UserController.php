<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    public function index()
    {
        $data = User::where('role', 'users')
            ->orderBy('id_user', 'desc')
            ->paginate(5);

        return view('admin.akun.index', compact('data'));
    }
    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);
        $user->status_akun = $user->status_akun == 'aktif' ? 'nonaktif' : 'aktif';
        $user->save();

        return response()->json(['success' => true]);
    }
    public function resetPassword($id)
    {
        $user = User::findOrFail($id);

        $status = Password::sendResetLink([
            'email' => $user->email
        ]);

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'success' => false
        ], 500);
    }
}
