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
            <form class="form" action="/contacts/confirm" method="post">
                @csrf
                <!--　お名前記入欄の作成　-->
                <div class="form__name">
                    <div class="form__group">
                        <div class="form__group--title">
                            <span class="form__label--item">名前</span>
                            <span class="form__label--required">※</span>
                        </div>
                        <div class="form__group--content">
                            <div class="form__group--name">
                                <div class="form__input--name">
                                    <input type="text" name="family__name" value="{{ old('family__name') }}"/>
                                    <p class="input__text">例）山田</p>
                                </div>
                                <div class="form__input--name">
                                    <input type="text" name="first__name" value="{{ old('first__name') }}"/>
                                    <p class="input__text">例）太郎</p>
                                </div>
                            </div>
                            <div class="form__error" style="height: 20px; color: red; text-align: left;">
                                @error('family__name')
                                {{ $message }}
                                @enderror
                            </div>
                            <div class="form__error" style="height: 20px; color: red; text-align: left;">
                                @error('first__name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!--　性別記入欄の作成　-->
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
                            <div class="form__error" style="height: 20px; color: red; text-align: left;">
                                @error('gender')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!--　メールアドレス記入欄の作成　-->
                <div class="form__mail">
                    <div class="form__group">
                        <div class="form__group--title">
                            <span class="form__label--item">メールアドレス</span>
                            <span class="form__label--required">※</span>
                        </div>
                        <div class="form__group--content">
                            <div class="form__input--text">
                                <input type="email" name="email" value="{{ old('email') }}"/>
                                <p class="input__text">例）test@example.com</p>
                            </div>
                            <div class="form__error" style="height: 20px; color: red; text-align: left;">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!--　郵便番号記入欄の作成　-->
                <div class="form__post">
                    <div class="form__group">
                        <div class="form__group--title">
                            <span class="form__label--item">郵便番号</span>
                            <span class="form__label--required">※</span>
                        </div>
                        <div class="form__group--content">
                            <div class="form__input--post">
                                〒<input type="text" name="postcode" value="{{ old('postcode') }}"/>
                                <p class="input__text">例）123-4567</p>
                            </div>
                            <div class="form__error" style="height: 20px; color: red; text-align: left;">
                                @error('postcode')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!--　住所記入欄の作成　-->
                <div class="form__address">
                    <div class="form__group">
                        <div class="form__group--title">
                            <span class="form__label--item">住所</span>
                            <span class="form__label--required">※</span>
                        </div>
                        <div class="form__group--content">
                            <div class="form__input--text">
                                <input type="text" name="address" value="{{ old('address') }}"/>
                                <p class="input__text">例）東京都渋谷区千駄々谷1-2-3</p>
                            </div>
                            <div class="form__error" style="height: 20px; color: red; text-align: left;">
                                @error('address')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!--　建物名記入欄の作成　-->
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
                            <div class="form__error" style="height: 20px; color: red; text-align: left;">
                                @error('building_name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!--　ご意見記入欄の作成　-->
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
                            <div class="form__error" style="height: 20px; color: red; text-align: left;">
                                @error('opinion')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!--　確認ボタンの作成-->
                <div class="form__button">
                    <button class="form__button--submit" type="submit">確認</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>