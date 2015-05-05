<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function welcome()
	{
		return view('pages.welcome');
	}

	public function about()
	{
		return view('pages.about');
	}

	public function contact()
	{
		return view('pages.contact');
	}


    // add a new method name pricing

    public function pricing(){
        // now open then pricing view so return to pricing view
        // need to correct folder name

        return view('pages.pricing');
    }

}
