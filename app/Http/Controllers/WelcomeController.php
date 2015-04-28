<?php namespace App\Http\Controllers;

use App\Models\YogaClass;
use App\Models\Day;
use App\Models\Location;
use App\Models\Rating;
use App\Models\Studio;
use App\Models\Query;
use App\Models\Style;

use Illuminate\Http\Request;

use DB;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{

	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$locations = Location::all();

	    return view('welcome', [
	      'locations' => $locations
	    ]);
	}

	public function about()
	{
		return view('about');
	}

}
