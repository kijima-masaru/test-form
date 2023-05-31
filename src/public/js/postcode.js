// 郵便番号の入力欄の要素を取得
var postcodeInput = document.querySelector('input[name="postcode"]');
// 住所の表示領域の要素を取得
var addressInput = document.querySelector('input[name="address"]');

// 郵便番号が入力された時のイベントリスナーを設定
postcodeInput.addEventListener('input', function () {
    var postcode = this.value.replace(/-/g, ''); // 郵便番号のハイフンを除去

    // Ajaxリクエストを送信して住所を取得
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/api/address/' + postcode, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);

            // 住所をフォームに自動入力
            addressInput.value = response.address;
        }
    };
    xhr.send();
});