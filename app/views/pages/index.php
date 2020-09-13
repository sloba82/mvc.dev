
<?php require APPROOT . '/views/inc/header.php'?>

<?php 
foreach ($data['posts'] as $post) {
?>
<div>from db :) <?php echo $post->title; ?> </div>

<?php
}
?>

5. The App [1] - Setup & User Authentication - ovde nastaviti

<?php require APPROOT . '/views/inc/footer.php'?>