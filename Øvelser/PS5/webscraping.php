<html>
<head>
<title>Test: World population</title>
</head>
<body>
<?php
$content = file_get_contents("http://www.census.gov/cgi-bin/ipc/popclockw");
eregi("<div id=\"worldnumber\">([0-9,]+)</div>", $content, $result);
echo "Der er $result[1] mennesker i verden.";
?>
</body>
</html>
