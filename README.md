# contact_form

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
input、textarea,selectタグの中身が変更されるとバリデーションを行い、
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

