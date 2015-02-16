<?php namespace App\Http\Controllers;

use Auth;
use App\Band;
use App\Genre;
use App\Country;
use App\Http\Requests;
use App\Http\Requests\StoreBandRequest;
use App\Http\Requests\EditBandRequest;
use App\Http\Requests\UpdateBandRequest;

use Illuminate\Support\Facades\Input;

class BandController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    function getCountries()
    {
        $countries  = ['' => ' --- inconnu --- '];
        $countries += Country::all()->lists('name', 'id');

        return $countries;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $qb = Band::query()->orderBy('name');

        $genre = Input::get('genre');

        if($genre){
            $genre = Genre::find($genre);

            $qb->whereHas('genres', function($q) use($genre){
                $q->where('genres.id', '=', $genre->id);
            });
        }

        $country = Input::get('country');

        if($country){
            $country = Country::find($country);
            $qb->where('country_id', '=', $country->id);
        }

        $bands = $qb->paginate(10);

		return view('band.index', compact('bands', 'genre', 'country'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $countries = $this->getCountries();

		return view('band.create', compact('countries'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreBandRequest $request)
	{
        $band = new Band($request->all());

        Auth::user()->submittedBands()->save($band);

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
     * @param EditBandRequest $request
     * @param  Band $band
     * @return Response
     */
	public function edit(EditBandRequest $request, Band $band)
	{
        $countries = $this->getCountries();

        return view('band.edit', compact('band', 'countries'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBandRequest $request
     * @param  Band $band
     * @return Response
     */
	public function update(UpdateBandRequest $request, Band $band)
	{
        $band->update($request->all());

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
