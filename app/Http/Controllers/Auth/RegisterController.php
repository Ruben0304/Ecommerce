<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class RegisterController extends Controller
{
    protected CreatesNewUsers $createsNewUsers;

    public function __construct()
    {
        $this->createsNewUsers = new CreateNewUser();
    }

    public function register(Request $request)
    {
        $user = $this->createsNewUsers->create($request->all());


        return response()->json([
            'user' => $user,
            'token' => $user->createToken('api')->plainTextToken,
        ], 201);
    }
}
