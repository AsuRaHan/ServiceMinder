<?php

namespace App\GraphQL\Mutations;

use App\Models\User;

final class Logout
{
    /**
     * @param null $_
     * @param array{} $args
     * @return User|null
     */
    public function __invoke($_, array $args): ?User
    {
        /** @var User $user */
        $user = auth()->user();
        $user->currentAccessToken()?->delete();

        return $user;
    }
}
