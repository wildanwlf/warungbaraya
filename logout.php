<?php
session_start();
session_destroy();
echo "<script>location='log-reg.php'</script>";
