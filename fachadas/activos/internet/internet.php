<?php

if (!$sock = @fsockopen('www.hospitalsatelite.com', 80, $num, $error, 5)) {
   echo '{"status": "fail"}';
} else {
   echo '{"status": "ok"}';
   fclose($sock);
}
?>