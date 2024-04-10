<?php

// Set the timezone to India
date_default_timezone_set('Asia/Kolkata');

// Check if today is Monday and the time is 12:01 in India timezone
if (date('N') == 1 && date('H:i') == '12:01') {
    // Execute the JavaScript code to trigger the PHP script
    echo "<script>
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'autoattendaneadd.php', true);
            xhr.send();
          </script>";

    echo "Script triggered successfully.\n";
} else {
    echo "It's not Monday 12:01, no updates executed.\n";
}

?>
