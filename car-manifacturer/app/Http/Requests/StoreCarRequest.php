<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreCarRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => [
                'required', 'string',
            ],
            'date_created' => [
                'required', 'date',
            ]
        ];
    }

    public function authorize()
    {
        //return Gate::allows('task_access');

    }
}
