# contact_form（アルバイト用）

# 開発環境

- PC --macOS 10.15.7
- エディタ --Visual Studio Code 1.50.1
- PHP --7.3.11
- MAMP --5.7
- MySQL --5.7.26

# 実装に費やした時間

- バックエンド（PHP） --3.5時間
- フロントエンド（HTML,CSS,JavaScript） --2時間

# 実装中に問題となったこと

### 1.バリデーションの問題
フロント側（JavaScript）でinput,textarea,selectタグの中身が変更されるとバリデーションを行い、
エラーがある場合にはボタン要素にdisabledを付与し送信できないようにした。
しかし、これではタグの中身が変更した場合のみバリデーションを行うことになり、
アクセス直後にもボタンが押せるようになってしまう。

### 解決策
これを解決するために、PHP側でもバリデーションを行うことでこの問題を解決した。
アクセス直後にボタンを押しても確認画面でPHPでのバリデーションを行い、
エラーメッセージを入力画面に渡して表示することで入力が空の状態での送信を防ぐことができた。

### 2.エラーメッセージの問題
上の解決策でエラーメッセージを入力画面に渡して表示するとあるが、はじめはセッションを用いて
入力画面にメッセージを渡す方法を考えていた。しかし、この方法だとcomfirm_process.phpでエラーメッセージのif文に引っかかってしまう。

### 解決策
解決策として以下の関数を作り入力画面にエラーメッセージを渡すことにした。

```
function getFlash($key){
    if(!empty($_SESSION[$key])){
        $data = $_SESSION[$key];
        $_SESSION[$key] = '';
        return $data;
    }
}
```

画面遷移すると一度だけセッションを取得する関数。

# 動作確認テスト
入力画面から確認画面に遷移するまでのバリデーションの確認を重点的に行った。
PHPとJavaScriptでそれぞれバリデーションを行っているため両方とも確認した。
JavaScriptで、フォームに変更がありエラーがある場合はボタンを押せなくしているため、
アクセス直後のボタンが押せる状態ではPHPのバリデーションが動作する。

<img width="1440" alt="スクリーンショット 2020-10-20 21 33 17" src="https://user-images.githubusercontent.com/65642316/96586385-e4498400-131b-11eb-8477-790da0d430b5.png">
PHPのバリデーション確認は、上のような状態でエラー表示がなくボタンが押せる状態で行った。


<img width="1438" alt="スクリーンショット 2020-10-20 22 04 28" src="https://user-images.githubusercontent.com/65642316/96589824-3ee4df00-1320-11eb-8ea8-d0e1f3f3cafa.png">
JavaScriptのバリデーション確認は、フォーム内容を一つ一つ変更しながら行った。

# 参考サイト

- [お問い合わせフォーム 確認画面](http://www.kanda-it-school.com/sample/php/seminar/php_seminar_sample_code/ch04_2.php)
- [素のJavaScriptでFormバリデーション](https://qiita.com/zaburo/items/a8fdcb0e1237f6ef97ff)
- [今時JSのバリデーションチェック](https://qiita.com/__init__/items/4ca0d14c26b81b15e3db)
- [過去の制作物のコード](https://github.com/takumi-pro/tshop)


# 補足
- inquiry.sqlがデータベース情報をエクスポートしたものです。
