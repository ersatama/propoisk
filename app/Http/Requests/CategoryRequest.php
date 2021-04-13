<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Domain\Contracts\CategoryContract;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            CategoryContract::BLOCKED           =>  'in:'.CategoryContract::ON.','.CategoryContract::OFF,
            CategoryContract::TITLE             =>  'required|string|min:1',
            CategoryContract::TITLE_EN          =>  'nullable|string',
            CategoryContract::TITLE_KZ          =>  'nullable|string',
            CategoryContract::DESCRIPTION       =>  'nullable|string',
            CategoryContract::DESCRIPTION_EN    =>  'nullable|string',
            CategoryContract::DESCRIPTION_KZ    =>  'nullable|string',
            CategoryContract::ICON              =>  'nullable|mimes:jpeg,png,jpg',
            CategoryContract::IMG               =>  'nullable|mimes:jpeg,png,jpg'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
