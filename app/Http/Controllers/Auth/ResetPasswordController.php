<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            // 'phone' => 'required|numeric',
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            'email' => 'required',
        ]);

        // Logic to send reset link (could be via SMS or email)

        // For now, just redirect to reset form with the provided details
        return redirect()->route('reset-password-form', [
            // 'phone' => $request->phone,
            // 'first_name' => $request->first_name,
            // 'last_name' => $request->last_name,
            'email' => $request->email,
        ]);
    }

    public function showResetForm(Request $request)
    {
        // $phone = $request->phone;
        // $first_name = $request->first_name;
        // $last_name = $request->last_name;
        $email = $request->email;
        return view('reset-password', compact('email'));

        // return view('reset-password', compact('phone', 'first_name', 'last_name'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            // 'phone' => 'required|numeric',
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::where('email', $request->email)
                    // ->where('phone', $request->phone)
                    // ->where('first_name', $request->first_name)
                    // ->where('last_name', $request->last_name)
                    ->first();

        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('login')->with('success', 'Votre mot de passe a été réinitialisé avec succès.');
        } else {
            return back()->withErrors(['message' => 'Les informations fournies ne correspondent à aucun utilisateur. Veuillez réessayer.']);
        }
    }
}

