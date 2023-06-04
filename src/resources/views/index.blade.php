<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>

<body>
    <main>
        <div class="form__content">
            <div class="form__head">
                <h1>お問い合わせ</h1>
            </div>
            <form class="form" action="/contacts/confirm" method="post" id="formcheck">
                @csrf
                <!-- お名前記入欄の作成 -->
                <div class="form__name">
                    <div class="form__group">
                        <div class="form__group--title">
                            <span class="form__label--item">名前</span>
                            <span class="form__label--required">※</span>
                        </div>
                        <div class="form__group--content">
                            <div class="form__group--name">
                                <div class="form__input--name">
                                    <input type="text" name="family__name" id="family__name" value="{{ old('family__name') }}"/>
                                    <p class="input__text">例）山田</p>
                                </div>
                                <div class="form__input--name">
                                    <input type="text" name="first__name" id="first__name" value="{{ old('first__name') }}"/>
                                    <p class="input__text">例）太郎</p>
                                </div>
                            </div>
                            <div class="form__error" style="height: 20px; color: red; text-align: left;" data-field="family__name">
                                @error('family__name')
                                <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form__error" style="height: 20px; color: red; text-align: left;" data-field="first__name">
                                @error('first__name')
                                <p>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 性別記入欄の作成 -->
                <div class="form__gender">
                    <div class="form__group">
                        <div class="form__group--title">
                            <span class="form__label--item">性別</span>
                            <span class="form__label--required">※</span>
                        </div>
                        <div class="form__group--content">
                            <div class="form__input--gender">
                                <input type="radio" name="gender" value="男性" checked style="transform:scale(3.0)">男性
                                <input type="radio" name="gender" value="女性" style="transform:scale(3.0)">女性
                            </div>
                            <div class="form__error" style="height: 20px; color: red; text-align: left;" data-field="gender">
                                @error('gender')
                                <p>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- メールアドレス記入欄の作成 -->
                <div class="form__mail">
                    <div class="form__group">
                        <div class="form__group--title">
                            <span class="form__label--item">メールアドレス</span>
                            <span class="form__label--required">※</span>
                        </div>
                        <div class="form__group--content">
                            <div class="form__input--text">
                                <input type="email" name="email" id="email" value="{{ old('email') }}"/>
                                <p class="input__text">例）test@example.com</p>
                            </div>
                            <div class="form__error" style="height: 20px; color: red; text-align: left;" data-field="email">
                                @error('email')
                                <p>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 郵便番号記入欄の作成 -->
                <div class="form__post">
                    <div class="form__group">
                        <div class="form__group--title">
                            <span class="form__label--item">郵便番号</span>
                            <span class="form__label--required">※</span>
                        </div>
                        <div class="form__group--content">
                            <div class="form__input--post">
                                〒<input type="text" name="postcode"  value="{{ old('postcode') }}"/>
                                <p class="input__text">例）123-4567</p>
                            </div>
                            <div class="form__error" style="height: 20px; color: red; text-align: left;" data-field="postcode">
                                @error('postcode')
                                <p>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 住所記入欄の作成 -->
                <div class="form__address">
                    <div class="form__group">
                        <div class="form__group--title">
                            <span class="form__label--item">住所</span>
                            <span class="form__label--required">※</span>
                        </div>
                        <div class="form__group--content">
                            <div class="form__input--text">
                                <input type="text" name="address" id="address" value="{{ old('address') }}"/>
                                <p class="input__text">例）東京都渋谷区千駄々谷1-2-3</p>
                            </div>
                            <div class="form__error" style="height: 20px; color: red; text-align: left;" data-field="address">
                                @error('address')
                                <p>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 建物名記入欄の作成 -->
                <div class="form__building">
                    <div class="form__group">
                        <div class="form__group--title">
                            <span class="form__label--item">建物名</span>
                        </div>
                        <div class="form__group--content">
                            <div class="form__input--text">
                                <input type="text" name="building_name" value="{{ old('building_name') }}"/>
                                <p class="input__text">例）千駄々谷マンション101</p>
                            </div>
                            <div class="form__error" style="height: 20px; color: red; text-align: left;" data-field="building_name">
                                @error('building_name')
                                <p>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ご意見記入欄の作成 -->
                <div class="form__option">
                    <div class="form__group">
                        <div class="form__group--title">
                            <span class="form__label--item">ご意見</span>
                            <span class="form__label--required">※</span>
                        </div>
                        <div class="form__group--content">
                            <div class="form__input--textarea">
                                <textarea name="opinion">{{ old('opinion') }}</textarea>
                            </div>
                            <div class="form__error" style="height: 20px; color: red; text-align: left;" data-field="opinion">
                                @error('opinion')
                                <p>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 確認ボタンの作成 -->
                <div class="form__button">
                    <button class="form__button--submit" type="submit">確認</button>
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // 入力イベントのリスナーを設定
    document.getElementById('email').addEventListener('input', function () {
        // フォームの値を取得
        var email = document.getElementById('email').value;

        // サーバーへAjaxリクエストを送信
        axios.post('/your-validation-route', {
            email: email
        })
        .then(function (response) {
            // バリデーションが成功した場合の処理
            document.getElementById('email-error').textContent = '';
        })
        .catch(function (error) {
            // バリデーションが失敗した場合の処理
            var errors = error.response.data.errors;
            if (errors && errors.email) {
                document.getElementById('email-error').textContent = errors.email[0];
            }
        });
    });

    // 名前のリアルタイムバリデーション
    $(document).ready(function() {
  // 入力フィールドの変更を監視
    $('#family__name, #first__name').on('input', function() {
        // バリデーションエラーをリセット
        $('.form__error').empty();

        // フォームデータを取得
        var formData = {
            family__name: $('#family__name').val(),
            first__name: $('#first__name').val(),
        };

        // バリデーションリクエストを送信
        $.ajax({
        url: '/validate-form', // バリデーション処理を行うルートのURLを指定
        type: 'POST',
        data: formData,
        success: function(response) {
           // バリデーション成功時の処理（エラーメッセージを表示しない）
        },
        error: function(xhr) {
            if (xhr.status === 422) {
                var errors = xhr.responseJSON;
                $.each(errors, function(field, messages) {
                   // エラーメッセージを表示
                    $('[data-field="' + field + '"]').html('<p>' + messages[0] + '</p>');
                });
        }
        }
        });
    });
});

    //　メールアドレスのリアルタイムバリデーション
    $(document).ready(function() {
        $('#email').on('input', function() {
            var email = $(this).val();
            var errorContainer = $('.form__error[data-field="email"]');
            errorContainer.empty(); // エラーメッセージを初期化

            if (!email) {
                errorContainer.append('<p>メールアドレスは必須です。</p>');
            } else if (!isValidEmail(email)) {
                errorContainer.append('<p>メールアドレスの形式が正しくありません。</p>');
            } else if (email.length > 255) {
                errorContainer.append('<p>メールアドレスは255文字以下で入力してください。</p>');
            }
        });

        function isValidEmail(email) {
            // 正規表現を使った簡易的なメールアドレス形式チェック
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    });

//　郵便番号のリアルタイムバリデーション
    $(document).ready(function() {
        $('input[name="postcode"]').on('input', function() {
        var value = $(this).val();
        var regex = /^\d{3}-\d{4}$/;

        if (!regex.test(value)) {
            $('div[data-field="postcode"]').html('<p>郵便番号は例）123-4567 の形式で入力してください。</p>');
        } else {
            $('div[data-field="postcode"]').empty();
        }
        });
    });

    // 郵便番号を入力すると住所が自動で反映される
    $(document).ready(function() {
        $('input[name="postcode"]').on('blur', function() {
            var postcode = $(this).val();
            if (postcode) {
                $.ajax({
                    url: 'https://api.zipaddress.net/',
                    data: {
                        zipcode: postcode
                    },
                    success: function(response) {
                        if (response.code === 200) {
                            var address = response.data.fullAddress;
                            $('input[name="address"]').val(address);
                        }
                    }
                });
            }
        });
    });
    </script>
</body>
</html>