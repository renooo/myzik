<?php namespace App\Http\Requests;

use App\Http\Request\BandRulesTrait;

class StoreBandRequest extends Request
{
    use BandRulesTrait;

	public function authorize()
	{
		return Auth::check();
	}
}
