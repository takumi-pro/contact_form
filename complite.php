<?php
require('function.php');
debug('=================完了画面==================');
?>

<?php require('header.php'); ?>
<h1>送信完了</h1>
<div class="complite_msg" style="text-align:center;margin-top:24px">
    <?php echo $_SESSION['mail']; ?>
    <a href="index.php" style="display:block;">フォームへ戻る</a>
</div>
<?php require('footer.php'); ?>