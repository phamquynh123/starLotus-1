<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNews extends FormRequest
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
        // 'file' => 'required|file',  
        'title_vi' => 'required', 
        'title_en' => 'required', 
        'title_jp' => 'required',
        'content_vi' => 'required',
        'content_en' => 'required',
        'content_jp' => 'required',
        ];
    }
    public function messages()
    {
        return [
        // 'file.file' =>'Ảnh phải được nhâp', 
        'title_vi.required' => 'Tiêu Đề Tiếng Việt Không được trống',
        'title_en.required' => 'Tiêu Đề Tiếng Anh Không được trống',
        'title_jp.required' => 'Tiêu Đề Tiếng Nhật Không được trống',
        'content_vi.required' => 'Nội Dung Tiếng Việt Không được trống',
        'content_en.required' => 'Nội Dung Tiếng Anh Không được trống',
        'content_jp.required' => 'Nội Dung Tiếng Nhật Không được trống', 
        ];
    }
}