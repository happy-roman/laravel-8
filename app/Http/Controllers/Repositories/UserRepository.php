<?php


namespace App\Http\Controllers\Repositories;

use App\Models\User;
use Laravel\Socialite\Two\User as UserOAuth;

class UserRepository
{
    public function getUserBySocId( UserOAuth $user, string $socialNet)
    {
        $userInSystem = User::query()
            ->where('id_in_soc', $user->id)
            ->where('type_auth', $socialNet)
            ->first();

        if(is_null($userInSystem)) {
            $userInSystem = new User();
            $userInSystem->fill([
                'name' => !empty($user->getName()) ? $user->getName() : '',
                'email' => !empty($user->getEmail()) ? $user->getEmail() : '',
                'password' => '',
                'email_verified_at' => (now()),
                'avatar' => !empty($user->getAvatar()) ? $user->getAvatar() : '',
                'id_in_soc' => !empty($user->getId()) ? $user->getId() : '',
                'type_auth' => $socialNet,
            ]);
        }
        $userInSystem->save();

        return $userInSystem;
    }
}
