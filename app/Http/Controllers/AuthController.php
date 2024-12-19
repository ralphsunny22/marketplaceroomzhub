<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;
use Exception;
use Illuminate\Support\Facades\Session;
use App\CentralLogics\Helpers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        // if (!Auth::guest()) {
        //     return back();
        // }
        // return '123';
        // Session::flush();
        return view('pages.auth.login');
    }

    public function loginPost(Request $request)
    {
        $rules = array(
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string',
        );
        $messages = [
            'email.required' => '* Your Email is required',
            'email.string' => '* Invalid Characters',
            'email.email' => '* Must be of Email format with \'@\' symbol',

            'password.required'   => 'This field is required',
            'password.string'   => 'Invalid Characters',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $user = User::where('email',$request->email)->first();

            $credentials = $request->only('email', 'password');
            $check = Auth::attempt($credentials);
            if (!$check) {
                return back()->with('login_error', 'Invalid email or password, please check your credentials and try again');
            }
            $user = Auth::getProvider()->retrieveByCredentials($credentials); //full user details
            Auth::user($user);

            //multiplatform encryption
            $data = [
                'name' => $user->name,
                'email' => $request->email,
                'password' => $request->password,
            ];

            $auto_login_token = Helpers::generateJWT($user);
            $user->auto_login_token = $auto_login_token;
            $user->save();

            return redirect()->route('landing');
        }
    }

    public function register()
    {
        return view('pages.auth.register');
    }

    public function registerPost(Request $request)
    {
        $rules = array(
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string',
        );
        $messages = [
            'name.required' => '* Your Name is required',

            'email.required' => '* Your Email is required',
            'email.string' => '* Invalid Characters',
            'email.email' => '* Must be of Email format with \'@\' symbol',

            'password.required'   => 'This field is required',
            'password.string'   => 'Invalid Characters',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            //
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ];

            $auto_login_token = Helpers::generateJWT($user);
            $user->auto_login_token = $auto_login_token;
            $user->save();

            Auth::login($user);
            return redirect()->route('landing');
        }
    }

    public function logout()
    {
        $authUser = auth()->user();

        Auth::guard('web')->logout($authUser);
        // Session::flush();

        return redirect()->route('loginFront');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function account()
    {
        $authUser = auth()->user();
        return view('pages.account.accountSetting', compact('authUser'));
    }

    public function decryptUserData()
    {
        $encryptedData = Session::get('encryptedData');
        $secretKey = env('LOGIN_SECRET');

        if ($encryptedData) {
            $decryptedData = Helpers::decryptData($encryptedData, $secretKey);

            return response()->json([
                'success' => true,
                'data' => json_decode($decryptedData, true), // Convert JSON back to array
            ]);
        }

        return response()->json(['success' => false, 'message' => 'No encrypted data found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function handleAutoLogin(Request $request)
    {
        try {
            // Get the token from the query parameter
            $auto_login_token = (string) $request->query('auto_login_token');

            // Decode the token
            $payload = JWT::decode($auto_login_token, new Key(env('LOGIN_SECRET'), 'HS256'));

            // Validate timestamp
            if (now()->timestamp - $payload->timestamp > 28000000) { // 8 mths expiration
                return response('Token expired', 403);
            }

            $user = User::where('email', $payload->email)->first();
            if ($user) {
                $user->name = $payload->name;
                $user->email = $payload->email;
                $user->password = $payload->password;
                $user->auto_login_token = $auto_login_token;
                $user->save();
            } else {
                $user = new User();
                $user->name = $payload->name;
                $user->email = $payload->email;
                $user->password = $payload->password;
                $user->auto_login_token = $auto_login_token;
                $user->save();
            }

            // Log the user in
            $token = Auth::login($user);

            return redirect()->route('landing');
        } catch (\Exception $e) {
            // return response()->json([
            //     'success' => false,
            //     'message' => $e->getMessage(),

            // ],500);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
