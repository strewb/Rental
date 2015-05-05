<?php namespace App\Http\Controllers;

use App\Places;

use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

//this is the index method its query on places model and pass the data to home view. 1st check  model

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

        // we use laravel eloquent model query to show all place with pagination .here 10 means get 10 post
        // lets see the model
        $places = Places::orderBy('created_at', 'desc')->paginate(5);



        // So now we get the data form database and now pass this data as a array with laravel compact method. to video
        // here view name pages.home means Pages folder home.blade.php file
        // lets check the view folder

        return view('pages.home',compact('places'));
	}

}