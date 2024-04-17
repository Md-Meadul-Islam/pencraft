<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:30'],
            'nickname' => ['nullable', 'string', 'unique:' . User::class, 'max:15'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone' => ['required', 'string', 'unique:' . User::class],
            'avater' => ['nullable', 'mimes:jpg,png,jpeg,webp'],
            'country' => ['nullable', 'string', 'max:50'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $flattenedErrors = Arr::flatten($errors);
            return back()->with('errors', $flattenedErrors);
        } else {
            $userId = Str::random(30);
            $imageName = 'default.png';
            $image = $request->file('avater');
            if (isset($image)) {
                $imagePath = Storage::putFile('public/avater', $image);
                $imageName = basename($imagePath);
            }
            $data = $validator->validated();
            $user = User::create([
                'user_id' => $userId,
                'name' => $data['name'],
                'nickname' => $data['nickname'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'avater' => $imageName,
                'country' => $data['country'],
                'password' => Hash::make($data['password']),
                'remember_token' => Str::random(10)
            ]);
            event(new Registered($user));
            $user->sendEmailVerificationNotification();
            Auth::login($user);
            return redirect()->route('post.index')->with('success', 'Account Created and Logged In Successful !');
        }
    }
}
