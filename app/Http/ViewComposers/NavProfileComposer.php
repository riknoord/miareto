<?php namespace App\Http\ViewComposers;


use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NavProfileComposer {

    public function compose(View $view){

        $profile = Auth::user()->profile;
        $view->with('profile',$profile);

    }

} 