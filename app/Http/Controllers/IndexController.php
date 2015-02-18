<?php namespace App\Http\Controllers;

use App\Artist;
use App\Band;
use App\Label;
use App\Record;

class IndexController extends Controller {

    public function index()
    {
        $bands = Band::latestSubmissions()->get();
        $artists = Artist::latestSubmissions()->get();
        $records = Record::latestSubmissions()->get();
        $labels = Label::latestSubmissions()->get();

        return view('index.index', compact('bands', 'artists', 'records', 'labels'));
    }

}
