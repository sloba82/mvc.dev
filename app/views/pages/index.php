
<?php require APPROOT . '/views/inc/header.php'?>
<div>Hello   <?php  echo $data['title']?> </div>
<div>Hello   <?php  echo APPROOT?> </div>
<div>from db   <?php  print_r($data['posts']); ?> </div>
<?php require APPROOT . '/views/inc/footer.php'?>