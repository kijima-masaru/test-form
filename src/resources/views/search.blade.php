<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理システム</title>
    <style>
        svg.w-5.h-5 {
            width: 20px;
            height: 20px;
        }

        .pagination {
        display: flex;
        justify-content: center;
    }

    .pagination li {
        list-style: none;
        margin: 0 5px;
    }
    </style>
    <link rel="stylesheet" href="css/search.css" />
</head>
<body>
    <main>
        <div class="management">
            <div class="management__head">
                <h1>管理システム</h1>
            </div>
            <div class="management__search">
                <form class="form" method="GET" action="{{ route('search') }}">
                    <div class="management__top">
                        <div class="management__fullname">
                            <span class="form__label">お名前</span>
                            <input type="text" name="fullname">
                        </div>
                        <div class="management__gender">
                            <span class="form__label--gender">性別</span>
                            <input type="radio" name="gender" value="全て" {{ request('gender') === '全て' ? 'checked' : '' }} style="transform:scale(3.0)">全て
                            <input type="radio" name="gender" value="男性" {{ request('gender') === '男性' ? 'checked' : '' }} style="transform:scale(3.0)">男性
                            <input type="radio" name="gender" value="女性" {{ request('gender') === '女性' ? 'checked' : '' }} style="transform:scale(3.0)">女性
                        </div>
                    </div>
                    <div class="management__day">
                        <span class="form__label">登録日</span>
                        <input type="date" name="start_day">
                        〜
                        <input type="date" name="end_day">
                    </div>
                    <div class="management__email">
                        <span class="form__label--email">メールアドレス</span>
                        <div class="email__box">
                            <input type="email" name="email">
                        </div>
                    </div>
                    <div class="management__button">
                        <button class="management__button--submit" type="submit">検索</button>
                    </div>
                    <div class="management__reset">
                        <p id="reset-button">リセット</p>
                    </div>
                    <script>
                        // リセットボタンのクリックイベントリスナー
                        document.getElementById("reset-button").addEventListener("click", function() {
                            // 入力フィールドを初期化
                            document.querySelector("input[name='fullname']").value = "";
                            document.querySelector("input[name='gender'][value='全て']").checked = true;
                            document.querySelector("input[name='start_day']").value = "";
                            document.querySelector("input[name='end_day']").value = "";
                            document.querySelector("input[name='email']").value = "";

                            // 検索結果をリセット
                            document.querySelector(".list__content").innerHTML = `
                                <div class="list__content--top">
                                    <p class="list__content--text">
                                        <span class="list__content--id">ID</span>
                                        <span class="list__content--fullname">お名前</span>
                                        <span class="list__content--gender">性別</span>
                                        <span class="list__content--email">メールアドレス</span>
                                        <span class="list__content--opinion">ご意見</span>
                                    </p>
                                </div>
                            `;
                        });
                    </script>
                </form>
            </div>
            <div class="pagination" style="display: flex; justify-content: space-between;">
                <span class="pagination__info">全{{ $contacts->total() }}件中 {{ $contacts->firstItem() }}件〜{{ $contacts->lastItem() }}件</span>
                <span class="pagination__links">{{ $contacts->links('vendor.pagination.default') }}</span>
            </div>
            <div class="list__content">
                <div class="list__content--top">
                    <p class="list__content--text">
                        <span class="list__content--id">ID</span>
                        <span class="list__content--fullname">お名前</span>
                        <span class="list__content--gender">性別</span>
                        <span class="list__content--email">メールアドレス</span>
                        <span class="list__content--opinion">ご意見</span>
                    </p>
                </div>
                @foreach ($contacts as $contact)
                    <div class="list__item">
                        <p class="list__item--info">
                            <span class="item-info__id">{{ $contact->id }}</span>
                            <span class="item-info__item">{{ $contact->fullname }}</span>
                            <span class="item-info__item">{{ $contact->gender }}</span>
                            <span class="item-info__item">{{ $contact->email }}</span>
                            <span class="item-info__item">{{ $contact->opinion }}</span>
                        </p>
                        <form class="list__delete" method="POST" action="{{ route('delete', $contact->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">削除</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
</body>
</html>

<!-- http://localhost/search -->