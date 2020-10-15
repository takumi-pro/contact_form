<?php
require('function.php');
debug('==================確認画面===================');

if(!empty($_POST)){
    //POST内容を変数に格納
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $content = $_POST['content'];
    $subject = $_POST['subject'];
    
    $subject_content = '';
    if($subject == 1){
        $subject_content = 'ご意見';
    }elseif($subject == 2){
        $subject_content = 'ご感想';
    }elseif($subject == 3){
        $subject_content = 'その他';
    }
    //未入力チェック
    validRequired($name,'name');
    validRequired($email,'email');
    validRequired($tel,'tel');
    validRequired($content,'content');
    selectRequired($subject,'subject');

    if(empty($err_msg)){
        //email形式チェック
        email($email,'email');
        //半角数字チェック
        half($tel,'tel');

        if(empty($err_msg)){
            debug('バリデーションOK');
            if(isset($_POST["submit"])){
                
                try{
                    $dbh = dbConnect();
                    debug($tel);
                    $sql = 'INSERT INTO inquiry set name=?,email=?,tel=?,subject=?,content=?,created_at=?,updated_at=?';
                    $data = array($name,$email,$tel,$subject_content,$content,date('Y-m-d H:i:s'),date('Y-m-d H:i:s'));
                    $stmt = query($dbh,$sql,$data);
                    if($stmt){
                        $to = 'takumidiary.0927@gmail.com';
                        $header = "From: " . mb_encode_mimeheader($name) ."<" . $email . ">\n";
                        $mail_body = <<<EOT
                        {$name}様からお問い合わせが届いています
                        
                        【メールアドレス】
                        {$email}

                        【電話番号】
                        {$tel}

                        【お問い合わせ内容】
                        {$content}
                        EOT;

                        $from = 'takumidiary.0927@gmail.com';
                        $self_subject = 'お問い合わせ内容確認';
                        $self_mail_body = <<<EOT
                        お問い合わせ内容の確認

                        【件名】
                        {$subject_content}

                        【内容】
                        {$content}
                        EOT;
                        mb_language('Japanese');
                        mb_internal_encoding("UTF-8");
                        $resu1 = mb_send_mail($to,$subject_content,$mail_body,$header);
                        $resu2 = mb_send_mail($email,$self_subject,$self_mail_body,"From:".$from);
                        if($resu1 && $resu2){
                            debug('メール送信成功');
                            $_SESSION['mail'] = MSG05;
                            header("Location:complite.php");
                        }else{
                            debug('メール送信失敗');
                            $err_msg['common'] = MSG04;
                        }
                    }
                    
                }catch(Exception $e){
                    error_log('エラー発生:'.$e->getMessage());
                }
            }
        }else{
            $_SESSION['err_msg'] = $err_msg;
            
            header("Location:index.php");
        }
    }else{
        debug('入力エラーがあります');
        debug(print_r($_SESSION,true));
        $_SESSION['err_msg'] = $err_msg;
        
        header("Location:index.php");
    }
}

?>