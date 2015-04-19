<?php namespace App\Services;

use App\Models\User;
use App\Models\UserProfile;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

/**
 * Class Registrar
 * @package App\Services
 */
class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 * Attach a new profile to created user.
     *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		$user = User::create([
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);

        $user->profile()->create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'gender' => $data['gender'],
        ]);

        return $user;
	}

}
