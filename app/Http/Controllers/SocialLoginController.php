<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    // по хорошму надо разбить класс или переписать на фабричный патерн, но пока оставляю так
    public function loginVK() {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVK(UserRepository $userRepository) {
        if (!Auth::check()) {
            $user = Socialite::with('vkontakte')->user();
            $userInSystem = $userRepository->getUserBySocId($user, 'vk');
            Auth::login($userInSystem);
        }
        return redirect()->route('home');
    }

    public function loginOK() {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return Socialite::driver('odnoklassniki')->redirect();
    }

    public function responseOK(UserRepository $userRepository) {
        if (!Auth::check()) {
            $user = Socialite::driver('odnoklassniki')->user();
            $userInSystem = $userRepository->getUserBySocId($user, 'ok');
            Auth::login($userInSystem);
        }
        return redirect()->route('home');
    }

    public function loginGit() {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return Socialite::driver('github')->redirect();
    }

    public function responseGit(UserRepository $userRepository) {
        if (!Auth::check()) {
            $user = Socialite::driver('github')->user();
            $userInSystem = $userRepository->getUserBySocId($user, 'github');
            Auth::login($userInSystem);
        }
        return redirect()->route('home');
    }
    public function loginFB() {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return Socialite::driver('facebook')->redirect();
    }

    public function responseFB(UserRepository $userRepository) {
        if (!Auth::check()) {
            $user = Socialite::driver('facebook')->user();
            $userInSystem = $userRepository->getUserBySocId($user, 'fb');
            Auth::login($userInSystem);
        }
        return redirect()->route('home');
    }


}
