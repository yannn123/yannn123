<?php
    session_start();
    session_unset();
    session_destroy();
    echo '<script>alert("Anda Sudah Logout");
          window.location.href = "../index.php";
    </script>'; 
?>