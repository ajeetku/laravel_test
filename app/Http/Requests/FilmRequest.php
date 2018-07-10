<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name'          => 'required|max:127|unique:users,name',
            'description'   => 'required|integer|max:5|min:1',
            'realease_date' => 'required',
            'rating'        => 'required',
            'ticket_price'  => 'required',
            'country'       => 'required',
            'genre'         => 'required',
            'photo'         => 'required',
        ];
    }
}
