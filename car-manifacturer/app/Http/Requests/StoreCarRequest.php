<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreCarRequest extends FormRequest
{
    public function authorize(): bool
    {
        //return Gate::allows('task_access');
        return true;
    }

    public function rules(): array
    {
        return [
            'year_created' => [
                'required'
            ],
            'kilometers' => [
                'required'
            ],
            'car_model_id' => [
                'required'
            ]
        ];
    }
}
