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
                                    <input type="text" name="family__name" value="{{ old('family__name') }}"/>
                                    <p class="input__text">例）山田</p>
                                </div>
                                <div class="form__input--name">
                                    <input type="text" name="first__name" value="{{ old('first__name') }}"/>
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
                                <input type="email" name="email" value="{{ old('email') }}"/>
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
                                〒<input type="text" name="postcode" value="{{ old('postcode') }}"/>
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
                                <input type="text" name="address" value="{{ old('address') }}"/>
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
    <script>
    const form = document.getElementById('myForm');
    const familyNameField = document.getElementById('family__name');
    const firstNameField = document.getElementById('first__name');
    const genderField = document.getElementById('gender');
    const emailField = document.getElementById('email');
    const postcodeField = document.getElementById('postcode');
    const addressField = document.getElementById('address');
    const opinionField = document.getElementById('opinion');

    form.addEventListener('submit', function(event) {
        // フォーム送信イベントのデフォルト動作をキャンセル
        event.preventDefault();

        // バリデーションエラーメッセージをリセット
        resetErrorMessages();

        // 各フィールドのバリデーションを実行
        validateFamilyName();
        validateFirstName();
        validateGender();
        validateEmail();
        validatePostcode();
        validateAddress();
        validateOpinion();

        // バリデーションエラーがない場合にフォームを送信
        if (isFormValid()) {
            form.submit();
        }
    });

    // 各フィールドの入力イベントを監視してリアルタイムバリデーションを実行
    familyNameField.addEventListener('input', validateFamilyName);
    firstNameField.addEventListener('input', validateFirstName);
    genderField.addEventListener('input', validateGender);
    emailField.addEventListener('input', validateEmail);
    postcodeField.addEventListener('input', validatePostcode);
    addressField.addEventListener('input', validateAddress);
    opinionField.addEventListener('input', validateOpinion);

    function resetErrorMessages() {
        const errorElements = document.querySelectorAll('.form__error');
        errorElements.forEach(function(element) {
            element.textContent = '';
        });
    }

    function validateFamilyName() {
        const errorElement = document.querySelector('[data-field="family__name"]');
        if (familyNameField.value.trim() === '') {
            errorElement.textContent = '姓を入力してください。';
        } else {
            errorElement.textContent = '';
        }
    }

    function validateFirstName() {
        const errorElement = document.querySelector('[data-field="first__name"]');
        if (firstNameField.value.trim() === '') {
            errorElement.textContent = '名を入力してください。';
        } else {
            errorElement.textContent = '';
        }
    }

    function validateGender() {
        const errorElement = document.querySelector('[data-field="gender"]');
        if (genderField.value === '') {
            errorElement.textContent = '性別を選択してください。';
        } else {
            errorElement.textContent = '';
        }
    }

    function validateEmail() {
        const errorElement = document.querySelector('[data-field="email"]');
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailField.value.trim() === '') {
            errorElement.textContent = 'メールアドレスを入力してください。';
        } else if (!emailPattern.test(emailField.value)) {
            errorElement.textContent = '正しい形式のメールアドレスを入力してください。';
        } else {
            errorElement.textContent = '';
        }
    }

    function validatePostcode() {
        const errorElement = document.querySelector('[data-field="postcode"]');
        const postcodePattern = /^\d{3}-?\d{4}$/;
        if (postcodeField.value.trim() === '') {
            errorElement.textContent = '郵便番号を入力してください。';
        } else if (!postcodePattern.test(postcodeField.value)) {
            errorElement.textContent = '正しい形式の郵便番号を入力してください。';
        } else {
            errorElement.textContent = '';
        }
    }

    function validateAddress() {
        const errorElement = document.querySelector('[data-field="address"]');
        if (addressField.value.trim() === '') {
            errorElement.textContent = '住所を入力してください。';
        } else {
            errorElement.textContent = '';
        }
    }

    function validateOpinion() {
        const errorElement = document.querySelector('[data-field="opinion"]');
        if (opinionField.value.trim() === '') {
            errorElement.textContent = 'ご意見を入力してください。';
        } else {
            errorElement.textContent = '';
        }
    }

    function isFormValid() {
        const errorElements = document.querySelectorAll('.form__error');
        let isValid = true;
        errorElements.forEach(function(element) {
            if (element.textContent !== '') {
                isValid = false;
            }
        });
        return isValid;
    }
</script>
</body>
</html>