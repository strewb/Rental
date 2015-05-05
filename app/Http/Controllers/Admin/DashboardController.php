<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Article;
use App\ArticleCategory;
use App\Places;
use App\User;
use App\Video;
use App\VideoAlbum;
use App\Photo;
use App\PhotoAlbum;

class DashboardController extends AdminController {

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $title = "Dashboard";


        $users = User::count();
        $place = Places::count();
		return view('admin.dashboard.index',  compact('title','users','place'));
	}
}