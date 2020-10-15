<?php
ini_set('log_errors','on');
ini_set('error_log','php.log');

$debug = false;
function debug($str){
    global $debug;
    if($debug){
        
        error_log('debug:'.$str);
    }
}

session_save_path("/var/tmp/");
ini_set('session.gc_maxlifetime',60*60*24*30);
ini_set('session.cookie_lifetime',60*60*24*30);
session_start();
session_regenerate_id();

$err_msg = array();
define('MSG01','入力必須です');
define('MSG02','email形式で入力してください');
define('MSG03','半角数字のみご利用いただけます');
define('MSG04','エラーが発生しました。しばらく経ってからやり直してください。');
define('MSG05','メールが送信されました！');


//DB接続
function dbConnect(){
    $dsn = 'mysql:dbname=xs324271_contact;host=mysql10069.xserver.jp;charset=utf8';
    $user = 'xs324271_takumi';
    $pass = 'tfic0927';

    /*$dsn = 'mysql:dbname=contact;host=localhost;charset=utf8';
    $user = 'root';
    $pass = 'root';*/
    $option = array(
        // SQL実行失敗時にはエラーコードのみ設定
        PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
        // デフォルトフェッチモードを連想配列形式に設定
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        // バッファードクエリを使う(一度に結果セットをすべて取得し、サーバー負荷を軽減)
        // SELECTで得た結果に対してもrowCountメソッドを使えるようにする
        PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
      );
    $dbh = new PDO($dsn,$user,$pass,$option);
    return $dbh;
}

function query($dbh,$sql,$data){
    $stmt = $dbh->prepare($sql);
    if(!$stmt->execute($data)){
        debug('クエリ失敗');
        $err_msg['common'] = MSG04;
        return false;
    }else{
        debug('クエリ成功');
        return $stmt;
    }
    return $stmt;
}

//未入力チェック
function validRequired($str,$key){
    global $err_msg;
    if(empty($str)){
        $err_msg[$key] = MSG01;
    }
}

//未入力チェック（selectbox用）
function selectRequired($str,$key){
    global $err_msg;
    debug($str);
    if(!preg_match("/^[1-3]+$/",$str)){
        $err_msg[$key] = MSG01;
    }
}

//email形式チェック
function email($str){
    global $err_msg;
    if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$str)){
        $err_msg['email'] = MSG02;
    }
}

//半角数字チェック
function half($str,$key){
    global $err_msg;
    if(!preg_match("/^[0-9]+$/",$str)){
        $err_msg[$key] = MSG03;
    }
}

//エラーメッセージ表示
function err_disp($key){
    global $err_msg;
    if(!empty($err_msg[$key])){
        return $err_msg[$key];
    }
}

//表示キープ
function keep($key){
    if(!empty($_SESSION[$key])){
        return $_SESSION[$key];
    }
}

function getFlash($key){
    if(!empty($_SESSION[$key])){
        $data = $_SESSION[$key];
        $_SESSION[$key] = '';
        return $data;
    }
}

function sendMail($to,$subject,$comment,$from){
    if(!empty($to) && !empty($subject) && !empty($comment)){
        //文字化けしないように
        mb_language('Japanese');
        mb_internal_encoding("UTF-8");

        $resu = mb_send_mail($to,$subject,$comment,"From:".$from);
        if($resu){
            debug('メール送信成功');
        }else{
            debug('メール送信失敗');
        }
    }
}
?>
