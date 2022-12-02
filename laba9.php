<?php
if(isset($_POST['IO']))
{

    $fp = fopen("message.txt", "r");

    $ip = fgets($fp);

    $regexp = '/\b((\d|([1-9][0-9])|(1\d\d)|(2[0-5][0-5]))\.(\d|([1-9][0-9])|(1\d\d)|(2[0-5][0-5]))\.(\d|([1-9][0-9])|(1\d\d)|(2[0-5][0-5]))\.((2[0-5][0-5])|(1\d\d)|([1-9][0-9])|\d))\b/i';

    preg_match($regexp, $ip, $arr);
    echo $arr[0];

    fclose($fp);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="submit" name="IO" value="ОК">
    </form>
</body>
</html>