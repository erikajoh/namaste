<?php namespace App\Http\Controllers;

use App\Models\YogaClass;
use App\Models\Day;
use App\Models\Location;
use App\Models\Rating;
use App\Models\Studio;
use App\Models\Query;
use App\Models\Style;

use App\User;
use Auth;
use Hash;

use Illuminate\Http\Request;

use DB;

class AuthController extends Controller {

	public function signup(Request $request)
	{
		return view('signup');
	}

	public function create(Request $request) {
		$validation = User::validateLogin($request->all());
		if ($validation->passes()) {
			$user = new User();
			$user->username = $request->input('username');
			$user->password = Hash::make($request->input('password'));
			$user->save();
			return redirect('login');
		}
		return redirect('signup')->withErrors($validation->errors());
	}

	public function login()
	{
		return view('login');
	}

	public function authenticate(Request $request)
	{
		$credentials = [
			'username' => $request->input('username'),
			'password' => $request->input('password')
		];
		if (Auth::attempt($credentials)) {
			return redirect('/');
		}
		return redirect('login')->withErrors([ 'errors' => 'Username and/or password invalid.' ]);
	}

	public function profile(Request $request)
	{
		if (Auth::check()) {
			return view('profile');
		}
		return redirect('/');
	}

	public function manage(Request $request)
	{
		if (Auth::check()) {
			return view('manage');
		}
		return redirect('/');
	}

	public function change_username(Request $request)
	{
		if (Auth::check()) {
			$new_username = $request->input('username');
			$user = User::find(Auth::user()->id);
			$validation = User::validateUsername($request->all());
			if ($validation->passes()) {
				$user->username = $new_username;
				$user->save();
				return redirect('/profile')
				->with('success', 'Username successfully saved!');
			}
			return redirect('/profile')
			->withErrors([ 'errors' => 'Username is invalid or already taken.' ]);
		}
		return redirect('/');
	}

	public function change_password(Request $request)
	{
		if (Auth::check()) {
			$new_password = $request->input('password');
			if ($new_password == '') {
				return redirect('/profile')
				->withErrors([ 'errors' => 'Please enter a new password.' ]);
			}
			$user = User::find(Auth::user()->id);
			$user->password = Hash::make($new_password);
			$user->save();
			return redirect('/profile')
			->with('success', 'Password successfully saved!');
		}
		return redirect('/');
	}

	public function delete(Request $request)
	{
		if (Auth::check()) {
			$user = User::find(Auth::user()->id);
			if ($request->input('username') != Auth::user()->username) {
				return redirect('/profile')
				->withErrors([ 'errors' => 'Please make sure your username is entered
					correctly in order to delete your account.' ]);
			}
			$user->delete();
			return redirect('/');
		}
		return redirect('/');
	}

	public function logout(Request $request)
	{
		Auth::logout();
		return redirect('/');
	}

}
