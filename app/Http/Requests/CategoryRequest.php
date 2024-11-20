<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule as ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'name' => ['required'],
            'name' => ['required'], //$this->validateName()
            'icon' => ['required'],
        ];
    }

    private function validateName()
    {
        // if ($this->has('id'))
        //     return Rule::exists('categories')->where('id', $this->id);
    }
}
