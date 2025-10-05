<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function username()
    {
        return 'phone';
    }
    public function load(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('panel.login');
    }
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function authenticate(Request $request): \Illuminate\Http\JsonResponse
    {

        $credentials = $request->validate([
            'phone'    => ['required', 'string', 'regex:/^09\d{9}$/'],
            'password' => ['required', 'string'],
        ], [

            'phone.required' => 'وارد کردن شماره تلفن الزامی است.',
            'phone.regex' => 'فرمت شماره تلفن صحیح نیست. (مثال: 09123456789)',
            'password.required' => 'وارد کردن رمز عبور الزامی است.',
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json([
                'message' => 'ورود با موفقیت انجام شد. در حال انتقال...',
                'redirect_to' => '/panel/'
            ]);
        }

        return response()->json([
            'error' => 'شماره تلفن یا رمز عبور وارد شده نادرست است.'
        ], 401); // 401 Unauthorized
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
