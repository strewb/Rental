<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\User;
use App\Places;
use Datatables;


class PlaceController extends AdminController {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        $places = Places::all();
        // Show the page
        return view('admin.places.index', compact('places'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Places::destroy($id);
        return redirect('place');
    }


}
