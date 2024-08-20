<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;


class UserFormRequest extends FormRequest
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
            'over_name' => 'required|string|max:10',
            'under_name' => 'required|string|max:10',
            'over_name_kana' => 'required|string|katakana|max:30',
            'under_name_kana' => 'required|string|katakana|max:30',
            'mail_address' => 'required|email|unique:users,mail_address|max:100',
            'sex' => 'required|in:1,2,3',
            'old_year' => 'required|date_format:Y|after_or_equal:2000|before_or_equal:today',
            'old_month' => 'required|date_format:m',
            'old_day' => 'required|date_format:d',
            'role' => 'required|in:1,2,3,4',
            'password' => 'required|string|min:8|max:30|confirmed',
        ];
    }

    /**
     * バリデーションエラーメッセージ
     *
     * @return array
     */
    public function messages()
    {
        return [
            'over_name.required' => '名字は必須項目です。',
            'over_name.max' => '名字は10文字以下で入力してください。',
            'under_name.required' => '名前は必須項目です。',
            'under_name.max' => '名前は10文字以下で入力してください。',
            'over_name_kana.required' => '名字のカナは必須項目です。',
            'over_name_kana.max' => '名字のカナは30文字以下で入力してください。',
            'over_name_kana.katakana' => '名字のカナはカタカナで入力してください。',
            'under_name_kana.required' => '名前のカナは必須項目です。',
            'under_name_kana.max' => '名前のカナは30文字以下で入力してください。',
            'under_name_kana.katakana' => '名前のカナはカタカナで入力してください。',
            'mail_address.required' => 'メールアドレスは必須項目です。',
            'mail_address.email' => '有効なメールアドレスを入力してください。',
            'mail_address.unique' => 'このメールアドレスは既に登録されています。',
            'mail_address.max' => 'メールアドレスは100文字以下で入力してください。',
            'sex.required' => '性別は必須項目です。',
            'sex.in' => '性別は「男性」「女性」「その他」から選択してください。',
            'old_year.required' => '生年は必須項目です。',
            'old_year.after_or_equal' => '生年は2000年以降の日付にしてください。',
            'old_year.before_or_equal' => '生年は今日までの日付にしてください。',
            'old_month.required' => '月は必須項目です。',
            'old_day.required' => '日は必須項目です。',
            'role.required' => '役職は必須項目です。',
            'role.in' => '役職は「教師(国語)」「教師(数学)」「教師(英語)」「生徒」から選択してください。',
            'password.required' => 'パスワードは必須項目です。',
            'password.min' => 'パスワードは8文字以上で入力してください。',
            'password.max' => 'パスワードは30文字以下で入力してください。',
            'password.confirmed' => '確認用パスワードと一致していません。',
        ];
    }
}
