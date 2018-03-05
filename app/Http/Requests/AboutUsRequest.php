<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsRequest extends FormRequest
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
        return  [
            //
                        'description' => 'required'
                ];
    }

    public function messages()
    {
        return
            [
                'description.required' => 'لطفا توضیحات و متن مورد نظر خود را وارد نمائید ، سپس دکمه ثبت نهایی را بزنید'
            ];
    }
}
