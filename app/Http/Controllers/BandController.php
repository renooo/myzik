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

    private function getCountryList()
    {
        $countries  = ['' => ' --- inconnu --- '];
        $countries += Country::all()->lists('name', 'id');

        return $countries;
    }

    private function getGenreList()
    {
        return Genre::all()->lists('name', 'id');
    }

    private function syncGenres(Band $band, array $genres)
    {
        $band->genres()->sync($genres);
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
        $countries = $this->getCountryList();
        $genres = $this->getGenreList();

		return view('band.create', compact('countries', 'genres'));
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
        $this->syncGenres($band, Input::get('genre_list', []));

        flash()->overlay('Le groupe a bien  été créé.', 'Confirmation');

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
        $countries = $this->getCountryList();
        $genres = $this->getGenreList();

        return view('band.edit', compact('band', 'countries', 'genres'));
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
        $this->syncGenres($band, Input::get('genre_list', []));

        flash()->overlay('Le groupe a bien été modifié.', 'Confirmation');

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
