<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>内容確認</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
</head>

<body>
    <main>
        <div class="confirm__content">
            <div class="confirm__head">
                <h2>内容確認</h2>
            </div>
            <form class="form" action="/contacts" method="post">
                @csrf
                <div class="confirm__table">
                    <table class="confirm__table--inner">
                        <tr class="confirm__table--row">
                            <th class="confirm__table--header">お名前</th>
                            <td class="confirm__table--text">
                                <input type="text" name="fullname" value="{{ $contact['fullname'] }}" readonly/>
                            </td>
                        </tr>
                        <tr class="confirm__table--row">
                            <th class="confirm__table--header">性別</th>
                            <td class="confirm__table--text">
                                <input type="text" name="gender" value="{{ $contact['gender'] }}" readonly/>
                            </td>
                        </tr>
                        <tr class="confirm__table--row">
                            <th class="confirm__table--header">メールアドレス</th>
                            <td class="confirm__table--text">
                                <input type="text" name="email" value="{{ $contact['email'] }}" readonly/>
                            </td>
                        </tr>
                        <tr class="confirm__table--row">
                            <th class="confirm__table--header">郵便番号</th>
                            <td class="confirm__table--text">
                                <input type="text" name="postcode" value="{{ $contact['postcode'] }}" readonly/>
                            </td>
                        </tr>
                        <tr class="confirm__table--row">
                            <th class="confirm__table--header">住所</th>
                            <td class="confirm__table--text">
                                <input type="text" name="address" value="{{ $contact['address'] }}" readonly/>
                            </td>
                        </tr>
                        <tr class="confirm__table--row">
                            <th class="confirm__table--header">建物名</th>
                            <td class="confirm__table--text">
                                <input type="text" name="building_name" value="{{ $contact['building_name'] }}" readonly/>
                            </td>
                        </tr>
                        <tr class="confirm__table--row">
                            <th class="confirm__table--header">ご意見</th>
                            <td class="confirm__table--opinion">
                                <div class="confirm__opinion">{{ $contact['opinion'] }}</div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="form__button">
                    <button class="form__button--submit" type="submit">送信</button>
                </div>
                <div class="form__back">
                <a href="javascript:void(0);" onclick="history.back();">
                    <p>修正する</p>
                </a>
            </div>
            </form>
        </div>
    </main>
</body>

</html>