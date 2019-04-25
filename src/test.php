<?php
require ('inc/connection.php');
if (checkUsername($conn,'dipta') || checkEmail($conn, 'dip9623@gmail.com')) {
  echo 'duplicate';
} else {
  echo 'no user name like that';
}
?>



