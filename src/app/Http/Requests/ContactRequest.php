<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'family__name' => ['required', 'string', 'max:255'],
            'first__name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'postcode' => ['required', 'regex:/^\d{3}-\d{4}$/'],
            'address' => ['required', 'string', 'max:255'],
            'opinion' => ['required', 'string', 'max:120'],
        ];
    }

    public function messages()
    {
        return [
            'family__name.required' => '苗字を入力してください。',
            'family__name.string' => '苗字を文字列で入力してください。',
            'family__name.max' => '苗字を255文字以内で入力してください。',
            'first__name.required' => '名前を入力してください。',
            'first__name.string' => '名前を文字列で入力してください。',
            'first__name.max' => '名前を255文字以内で入力してください。',
            'gender.required' => '性別を選択してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.string' => 'メールアドレスを文字列で入力してください。',
            'email.email' => '有効なメールアドレス形式で入力してください。',
            'email.max' => 'メールアドレスを255文字以内で入力してください。',
            'postcode.required' => '郵便番号を入力してください。',
            'postcode.regex' => '郵便番号をハイフンありの半角・８文字で入力してください。',
            'address.required' => '住所を入力してください。',
            'address.string' => '住所を文字列で入力してください。',
            'address.max' => '住所を255文字以内で入力してください。',
            'opinion.required' => 'ご意見を入力してください。',
            'opinion.string' => 'ご意見を文字列で入力してください。',
            'opinion.max' => 'ご意見を120文字以内で入力してください。',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'postcode' => $this->convertToHalfWidth($this->input('postcode')),
        ]);
    }

    /**
     * Convert the given value to half-width.
     *
     * @param  string $value
     * @return string
     */
    protected function convertToHalfWidth($value)
    {
        return mb_convert_kana($value, 'a');
    }
}