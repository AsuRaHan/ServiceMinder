<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\GraphQLException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class Login
{
    /**
     * @param null $_
     * @param array{} $args
     * @return array
     * @throws GraphQLException
     */
    public function __invoke($_, array $args): array
    {
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
