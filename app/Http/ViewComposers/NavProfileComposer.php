<?php namespace App\Http\ViewComposers;


use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NavProfileComposer {

    public function compose(View $view){
        $this->CreateNavProfile($view);
    }

    private function CreateNavProfile(View $view){
        $authcheck = (Auth::check() ? true : false);
        $profile = ($authcheck ? Auth::user()->profile : null);

        $data = [
            'profile' => $profile,
            'ShowNavProfile' => $authcheck
        ];

        $view->with($data);
    }

} 