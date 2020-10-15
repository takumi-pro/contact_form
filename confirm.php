<?php
require('confirm_process.php');
?>

<?php require('header.php'); ?>
    <h1>お問い合わせ（確認）</h1>        
    <form action="" method="post">
        <input type="hidden" name="name" value="<?php echo $name; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="tel" value="<?php echo $tel; ?>">            
        <input type="hidden" name="content" value="<?php echo $content; ?>">
        <input type="hidden" name="subject" value="<?php echo $subject; ?>">
            
        <div>
            <div>
                <label>お名前</label>
                <p><?php echo $name; ?></p>
            </div>
            
            <div>
                <label>メールアドレス</label>
                <p><?php echo $email; ?></p>
            </div>

            <div>
                <label>電話番号</label>
                <p><?php echo $tel; ?></p>
            </div>

            <div>
                <label>件名</label>
                <p><?php echo $subject_content; ?></p>
            </div>
            
            <div>
                <label>お問い合わせ内容</label>
                <p><?php echo $content; ?></p>
            </div>

        </div>
        <input type="button" value="内容を修正する" onclick="history.back(-1)">
        <input class="submit" type="submit" name="submit" value="送信する">
    </form>
    
<?php require('footer.php'); ?>