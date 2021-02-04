<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
