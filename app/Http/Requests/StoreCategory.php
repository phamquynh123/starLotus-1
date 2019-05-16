<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
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
            'name_vi' => 'required', 
            'name_en' => 'required', 
            'name_jp' => 'required', 
        ];
    }

    public function messages()
{
    return [
        'name_vi.required' => 'Danh Mục Tiếng Việt Không được trống',
        'name_en.required' => 'Danh Mục Tiếng Anh Không được trống',
        'name_jp.required' => 'Danh Mục Tiếng Nhật Không được trống',
    ];
}
}
