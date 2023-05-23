<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;


class ContactController extends Controller
{
    //　お問い合わせフォームの表示　//
    public function index()
    {
        return view('index');
    }

    //　お問い合わせフォームの確認ボタンクリック時の処理　//
    public function confirm(ContactRequest $request)
    {
        //　取得した入力情報を$contactに格納　//
        $contact = $request->only(['family__name', 'first__name', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);

        //　'family__name'と'first__name'を結合して、$contactの中に'fullname'という新しいキーを作成する　//
        $contact['fullname'] = $contact['family__name'] . ' ' . $contact['first__name'];

        return view('confirm', compact('contact'));
    }

    //　内容確認ページの送信ボタンクリック時の処理　//
    public function store(ContactRequest $request)
    {
        $contact = $request->only(['family__name', 'first__name', 'fullname', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);

        //　Contactモデルを使ったデータの保存処理　//
        //　createで$contactの変数に格納されたデータを保存　//
        Contact::create($contact);

        //　thanks.blade.php を呼び出す記述　//
        return view('thanks');
    }

    //　削除ボタンクリック時の処理　//
    public function destroy($id)
    {
    $contact = Contact::findOrFail($id);
    $contact->delete();

    return redirect()->route('search');
    }

}
