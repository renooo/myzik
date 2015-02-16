<?php namespace App\Http\Requests;

use Auth;

class StoreBandRequest extends Request
{
    use BandRulesTrait;

	public function authorize()
	{
		return Auth::check();
	}
}
