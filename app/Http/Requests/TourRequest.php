<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
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

            'tour_name'=> 'required',
            'img'=> 'required',
            'description'=> 'required',
            'date_start'=> 'required',
            'date_end'=> 'required',
            'max_people'=> 'required',
            'price'=> 'required',
            'detail'=> 'required',
            'type_tour'=> 'required',
            'location'=> 'required',
        ];
    }
}
