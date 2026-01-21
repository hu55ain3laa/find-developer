<?php

namespace App\Repositories;

use App\Models\User;
use App\Enums\UserType;
use App\Enums\DeveloperStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class DeveloperAuthRepository
{
    /**
     * Attempt to authenticate a developer user.
     *
     * @param array $credentials
     * @param bool $remember
     * @return bool
     * @throws ValidationException
     */
    public function attemptLogin(array $credentials, bool $remember = false): bool
    {
        $user = User::where('email', $credentials['email'])->first();

        // Check if user exists, has developer type, and has an associated developer record
        if (!$user || $user->user_type !== UserType::DEVELOPER || !$user->developer) {
            throw ValidationException::withMessages([
                'email' => ['These credentials do not match our records.'],
            ]);
        }

        // Check if the user's developer account is approved
        if ($user->developer->status !== DeveloperStatus::APPROVED) {
            throw ValidationException::withMessages([
                'email' => ['Your developer account is not approved yet.'],
            ]);
        }

        // Attempt authentication
        if (Auth::attempt($credentials, $remember)) {
            return true;
        }

        throw ValidationException::withMessages([
            'email' => ['These credentials do not match our records.'],
        ]);
    }

    /**
     * Logout the authenticated user.
     *
     * @return void
     */
    public function logout(): void
    {
        Auth::logout();
    }

    /**
     * Check if a user is a developer and is approved.
     *
     * @param User $user
     * @return bool
     */
    public function isDeveloperApproved(User $user): bool
    {
        return $user->user_type === UserType::DEVELOPER
            && $user->developer
            && $user->developer->status === DeveloperStatus::APPROVED;
    }
}
