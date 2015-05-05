<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Places;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class PlaceController extends Controller {

    /**
     *  add auth
     */


    public function __construct()
    {
        $this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */


	public function index()
	{
        $places = Places::orderBy('created_at', 'desc')->paginate(5);

        return view('pages.home',compact('places'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('place.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * @param  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
        $rules = array(
            'title'             => 'required',
            'description'       => 'required',
            'room'              => 'required',
            'property_type'     => 'required',
            'location'          => 'required',
            'email'             => 'required|email',
            'price'             => 'required',
        );
		$this->validate($request, $rules ); // Uncomment and modify if needed.
        $inputs = $request->except('pictures');

        // getting all of the post data
        if ($request->hasFile('pictures'))
        {
            $files = $request->file('pictures');
            foreach($files as $file) {
                if ($file->isValid()) {
                    $destinationPath = 'uploads/';
                    $filename = $file->getClientOriginalName();
                    $extension = $file -> getClientOriginalExtension();
                    $newfilename = sha1($filename . time()) . '.' . $extension;
                    $file->move($destinationPath, $newfilename);
                    $pictures[] = $destinationPath.$newfilename;
                }
            }
            $inputs = array_merge($inputs, array(
                'pictures' => serialize($pictures)
            ));
        }else{

                return redirect()->back()->with('error', ['Image filed required']);
        }
        Places::create($inputs);
        return redirect('place');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
     * this is the single view method
     * get places id and query with eloquent and pass data to show view
	 * @return Response
	 */
	public function show($id)
	{
		$place = Places::findOrFail($id);
		return view('place.show', compact('place'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$place = Places::findOrFail($id);
		return view('place.edit', compact('place'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
        $rules = array(
            'title'             => 'required',
            'description'       => 'required',
            'room'              => 'required',
            'property_type'     => 'required',
            'location'          => 'required',
        );
        $this->validate($request, $rules );
        $inputs = $request->except('pictures');
        // getting all of the post data
        if ($request->hasFile('pictures'))
        {
            $files = $request->file('pictures');
            foreach($files as $file) {
                if ($file->isValid()) {
                    $destinationPath = public_path().'uploads';
                    $filename = $file->getClientOriginalName();
                    $extension = $file -> getClientOriginalExtension();
                    $newfilename = sha1($filename . time()) . '.' . $extension;
                    $file->move($destinationPath, $newfilename);
                    $pictures[] = $destinationPath.$newfilename;
                }
            }
            $inputs = array_merge($inputs, array(
                'pictures' => serialize($pictures)
            ));
        }

		$place = Places::findOrFail($id);
		$place->update($inputs);
		return redirect('place');
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