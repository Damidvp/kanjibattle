<?php
    session_start();
    session_unset(); 
    session_destroy();
    header("Location: http://127.0.0.1/kanji_learn/index.php");
?>