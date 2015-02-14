<?php namespace App\Http\Requests;

use Auth;
use Route;

class EditBandRequest extends Request
{
	public function authorize()
	{
        $band = Route::getCurrentRoute()->getParameter('bands');

		return (Auth::check() && $band && $band->user_id == Auth::id());
	}

    public function rules()
    {
        return [];
    }
}
