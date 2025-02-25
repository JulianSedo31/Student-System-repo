<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentAuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.student-register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'age' => 'required|integer',
            'moto' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'college_level' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $student = Student::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'age' => $request->age,
            'moto' => $request->moto,
            'password' => Hash::make($request->password),
            'college_level' => $request->college_level,
        ]);

        Auth::guard('student')->login($student);

        return redirect()->route('student.dashboard');
    }

    public function showLoginForm()
    {
        return view('auth.student-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('student')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('student.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('student')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function showGrades()
    {
        $student = Auth::guard('student')->user();
        $grades = $student->grades; // Assuming you have a relationship set up

        return view('student.grades', compact('student', 'grades'));
    }
}
