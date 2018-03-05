<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserMessageValidation extends FormRequest
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
                    'description' => 'required|max:1000',
//                    'title'       => 'required',
//                    'models'      => 'required',
               ];
    }

    //messages
    public function messages()
    {
        return
            [
               'description.required' => 'پر کردن فیلد توضیحات الزامی است',
               'description.max'      => 'تعداد کارکترهای وارد شده در فیلد توضیحات بیش از حد مجاز است',
            ];
    }
}
