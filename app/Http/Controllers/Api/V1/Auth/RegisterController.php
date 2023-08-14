<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $role = Role::where('name', $request->role)->value('id');

        $validated = $request->validated();

        DB::transaction(function () use ($validated, $role, $request) {
            $validated['password'] = $request->password();
            $user = User::create($validated);
            $user->roles()->attach($role->id);
        });

        return response()->json(['status' => 'User registered']);
    }
}
