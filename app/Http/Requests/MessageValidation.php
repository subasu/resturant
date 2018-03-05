<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageValidation extends FormRequest
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
        return
            [
                 'message' => 'required|max:1000'
            ];
    }

    public function messages()
    {
          return
              [
                 'message.required' => 'لطفا پیامی را وارد نمائید سپس دکمه ثبت را بزنید',
                 'message.max'      => 'تعداد کارکترهای وارد شده در متن پیام بیش از حد مجاز است'
              ];
    }
}
