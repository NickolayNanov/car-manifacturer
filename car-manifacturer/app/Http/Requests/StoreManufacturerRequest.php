<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreManufacturerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'name' => [
                'required'
            ],
            'date_created' => [
                'required'
            ]
        ];
    }

    public function authorize()
    {
        //return Gate::allows('task_access');
        return true;
    }
}
