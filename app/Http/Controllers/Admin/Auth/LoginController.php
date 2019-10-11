<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;


class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return Response
     */
    public function showLoginForm()
    {
//      Here we define the values for $title and $loginRoute in the admin login blade.
        return view('auth.login',[
            'title' => 'Admin Login',
            'loginRoute' => 'admin.login',
        ]);
    }

    /**
     * Login the admin.
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {
        $this->validator($request);
        /* $request->only() will return an array of specified fields
         * and $request->filled(‘remember’) will see if the remember me checkbox was checked or not.
         * */
        if(Auth::guard('admin')->attempt($request->only('email','password'), $request->filled('remember'))) {
            //Authentication passed...
            return redirect()
                // Admin.home - product page with changeable options.
                ->intended(route('admin.home'))
                ->with('status','You are Logged in as Admin!');
        }
        //Authentication failed...
        return $this->loginFailed();
    }

    /**
     * Logout the admin.
     *
     * @return void
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()
            ->route('admin.login')
            ->with('status','Admin has been logged out!');
    }

    /**
     * Validate the form data.
     *
     * @param Request $request
     * @return void
     */
    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email'    => 'required|email|exists:admins|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];
        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];
        //validate the request.
        $request->validate($rules,$messages);
    }

    /**
     * Redirect back after a failed login.
     *
     */
    private function loginFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Login failed, please try again!');
    }
}
