<?php

namespace App\Http\Controllers;

use App\Models\DeaneryWorker;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class DeaneryWorkerController extends Controller
{
    public function login(Request $request) 
    {
        $validated = $request->validate([
            'email' => 'required|max:255|exists:deanery_workers',
            'password' => 'required|max:255',
        ]);

        $deaneryWorker = DeaneryWorker::where([['email','=',$validated["email"]],['password','=', $validated['password']]])->first();
        if ($deaneryWorker !== null) {
            $_SESSION['worker']['name'] = $deaneryWorker->fullname;
            $_SESSION['worker']['department_id'] = $deaneryWorker->department_id;
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    public function logout()
    {
        if (isset($_SESSION['worker'])) {
            unset($_SESSION['worker']);
        } 
        return redirect('/');
    }
}
