<?php namespace App\Http\Controllers;

use App\Band;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BandController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bands = Band::all()->forPage(Input::get('page', 1), 10);
		return view('band.index', compact('bands'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('band.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        return redirect('bands');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Band  $band
	 * @return Response
	 */
	public function show(Band $band)
	{
        return view('band.show', compact('band'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Band  $band
	 * @return Response
	 */
	public function edit(Band $band)
	{
        return view('band.edit', compact('band'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Band  $band
	 * @return Response
	 */
	public function update(Band $band)
	{
        return redirect('bands');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
