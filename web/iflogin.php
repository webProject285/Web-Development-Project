<?php
require('db.php');
session_start();
if(isset($_SESSION['USER_ID'])){
    
    echo '<i class="bi bi-person-circle fa-lg"></i>';
    echo' <span id="profile" class="button-text">'.$_SESSION['USER_NAME'].'</span>';
    
}
else{
    echo '<i class="bi bi-person-circle fa-lg"></i>';
   echo' <span id="profile" class="button-text">Sign in</span>';
}
?>