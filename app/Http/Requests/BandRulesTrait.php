<?php namespace App\Http\Requests;

Trait BandRulesTrait
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'country_id' => 'exists:countries,id',
            'active' => 'boolean',
            'active_from' => 'date',
            'active_to' => 'required_if:active_from,!null|date|after:active_from'
        ];
    }
}
