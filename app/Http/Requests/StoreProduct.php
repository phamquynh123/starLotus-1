<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'name'=>'required',
            'quantity'=>'required|numeric',
            'price_vi' => 'numeric|nullable', 
            'price_en' => 'numeric|nullable',
            'price_jp' => 'numeric|nullable',
            'content_vi' => 'required',
            'content_en' => 'required',
            'content_jp' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name'=>'Tên sản phẩm không được trống',
            'quantity.required'=>'Số lượng sản phẩm không được trống',
            'quantity.numeric'=>'Số lượng sản phẩm phải là số',
            'price_vi.numeric' => 'Giá tiền Việt phải là số',
            'price_en.numeric' => 'Giá tiền Anh phải là số',
            'price_jp.numeric' => 'Giá tiền Tiếng Nhật phải là số',
            'content_vi.required' => 'Nội Dung Tiếng Việt Không được trống',
            'content_en.required' => 'Nội Dung Tiếng Anh Không được trống',
            'content_jp.required' => 'Nội Dung Tiếng Nhật Không được trống',
        ];
    }
}
