<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\GraphQLException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class Login
{
    /**
     * Invoke the login mutation.
     *
     * @param null $_ The unused parameter.
     * @param array $args The arguments passed to the mutation.
     *                    - email: The email of the user.
     *                    - password: The password of the user.
     * @return array The response containing the access token and the user.
     * @throws GraphQLException If the user does not exist or the password is incorrect.
     */
    public function __invoke($_, array $args): array
    {
        // Check if the user exists
        if (!User::query()->where('email', $args['email'])->exists()) {
            $this->error();
        }

        /** @var User $user */
        $user = User::query()
            ->where('email', $args['email'])
            ->first();

        if (!Hash::check($args['password'], $user->password)) {
            $this->error();
        }

        $token = $user->createToken(config('app.name'))->plainTextToken;

        return [
            'accessToken' => $token,
            'user' => $user
        ];
    }

    protected function error()
    {
        throw new GraphQLException('Неверный логин или пароль!');
    }
}
