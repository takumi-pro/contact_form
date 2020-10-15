<?php
require('function.php');
debug('=================入力画面==================');
$err_msg = getFlash('err_msg');
?>

<?php require('header.php'); ?>
    <h1>お問い合わせ</h1>
    <form action="./confirm.php" method="post">
        <label >お名前<span></span>
            <input class="name" type="text" name="name" placeholder="例）名前　太郎">
            <div class="err_msg name_err"><?php echo err_disp('name'); ?></div>
        </label>
        
        <label>メールアドレス<span></span>
            <input class="email" type="text" name="email" placeholder="例）example@mail.com">
            <div class="err_msg email_err"><?php echo err_disp('email'); ?></div>
        </label>

        <label>電話番号<span></span>
            <input class="tel" type="text" name="tel" placeholder="ハイフン無し">
            <div class="err_msg tel_err"><?php echo err_disp('tel'); ?></div>
        </label>

        <label>件名<span></span>
            <select class="subject" name="subject" id="subject">
                <option value="0">選択してください</option>
                <option value="1">ご意見</option>
                <option value="2">ご感想</option>
                <option value="3">その他</option>
            </select>
            <div class="err_msg select_err"><?php echo err_disp('subject'); ?></div>
        </label>

        <label>お問い合わせ内容<span></span>
            <textarea class="content" name="content" cols="30" rows="10" placeholder=""></textarea>
            <div class="err_msg content_err"><?php echo err_disp('content'); ?></div>
        </label>

        <input class="btn" type="submit" value="送信内容を確認">
    </form>
<?php require('footer.php'); ?>