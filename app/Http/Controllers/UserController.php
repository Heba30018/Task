<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Get the current user's role
        $role = Auth::user()->role_as;

        // Define a message based on the user's role
        $message = $this->getRoleMessage($role);

        // Return the view with the role message
        return view('home', ['message' => $message]);
    }

    /**
     * Get the message based on the user's role.
     *
     * @param string $role
     * @return string
     */
    private function getRoleMessage(string $role): string
    {
        $roleMessages = [
            'admin' => 'You are logged in as Admin.',
            'customer' => 'You are logged in as Customer.',
            'vendor' => 'You are logged in as Vendor.',
        ];

        // Return the corresponding message or a default message
        return $roleMessages[$role] ?? 'Unknown role.';
    }
}
