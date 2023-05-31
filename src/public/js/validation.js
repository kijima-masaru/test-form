// フォームの各フィールドのID
const formFields = {
    familyName: '#family__name',
    firstName: '#first__name',
    gender: '#gender',
    email: '#email',
    postcode: '#postcode',
    address: '#address',
    opinion: '#opinion'
};

// バリデーションエラーメッセージを表示する要素のID
const errorFields = {
    familyName: '#family__name__error',
    firstName: '#first__name__error',
    gender: '#gender__error',
    email: '#email__error',
    postcode: '#postcode__error',
    address: '#address__error',
    opinion: '#opinion__error'
};

// 各フィールドのバリデーションルールを定義
const fieldRules = {
    familyName: ['required', 'string', 'max:255'],
    firstName: ['required', 'string', 'max:255'],
    gender: ['required'],
    email: ['required', 'string', 'email', 'max:255'],
    postcode: ['required', 'regex:/^\d{3}-\d{4}$/'],
    address: ['required', 'string', 'max:255'],
    opinion: ['required', 'string', 'max:120']
};

// バリデーションエラーメッセージを表示する関数
function showErrorMessage(field, message) {
    const errorField = errorFields[field];
    const errorMessage = `<span class="text-red-500">${message}</span>`;
    $(errorField).html(errorMessage);
}

// バリデーションエラーメッセージをクリアする関数
function clearErrorMessage(field) {
    const errorField = errorFields[field];
    $(errorField).empty();
}

// バリデーションを実行する関数
function validateField(field, value) {
    const rules = fieldRules[field];

  // バリデーションルールを順にチェック
    for (const rule of rules) {
    const [ruleName, ...parameters] = rule.split(':');
    let errorMessage = '';

    // 各ルールに対応するバリデーション処理を実行
    switch (ruleName) {
        case 'required':
        if (value.trim() === '') {
            errorMessage = 'This field is required.';
        }
        break;
        case 'string':
        if (typeof value !== 'string') {
            errorMessage = 'This field must be a string.';
        }
        break;
        case 'max':
        const maxLength = parseInt(parameters[0]);
        if (value.length > maxLength) {
            errorMessage = `This field must be at most ${maxLength} characters long.`;
        }
        break;
        case 'email':
        const emailPattern = /^\S+@\S+\.\S+$/;
        if (!emailPattern.test(value)) {
            errorMessage = 'Invalid email address format.';
        }
        break;
        case 'regex':
        const regexPattern = new RegExp(parameters[0]);
        if (!regexPattern.test(value)) {
            errorMessage = 'Invalid format.';
        }
        break;
        default:
        break;
    }

    // エラーメッセージがあれば表示
    if (errorMessage !== '') {
        showErrorMessage(field, errorMessage);
      return false; // バリデーションエラー
        }
    }

    clearErrorMessage(field);
  return true; // バリデーションOK
}

// フォームの入力値が変更された時にバリデーションを実行
for (const [field, selector] of Object.entries(formFields)) {
    $(selector).on('input', function () {
    const value = $(this).val();
    validateField(field, value);
    });
}