<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
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
    $contact = $request->validated();

    $contact['fullname'] = $contact['family__name'] . ' ' . $contact['first__name'];

    if ($request->expectsJson()) {
        return response()->json([
            'errors' => [],
        ]);
    }

    return view('confirm', compact('contact'));
}

    //　内容確認ページの送信ボタンクリック時の処理　//
    public function store(Request $request)
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