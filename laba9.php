<?php 
include('connect.php');
if(isset($_POST['txt']))
{
	$query = "SELECT * FROM `table1`";
	$sql = mysqli_query($mysqli, $query);
	
	if(mysqli_num_rows($sql) > 0 )
	{
		$file = "message.txt";
		$fileopen = fopen($file, "w");	
    	while( $row = mysqli_fetch_assoc( $sql ) )
    	{
    		$str = $row['name']." ".$row['text']." ";
        	fwrite( $fileopen, $str );
    	}
    	fclose( $fileopen );
	}
	/*if($sql = mysqli_query($mysqli, $query))
	{
		    while($row = mysqli_fetch_array($sql))
		    {
		    	$str = $row['name'].": ".$row['text']."<br>";
		        echo $str;
		        //file_put_contents('message.txt', $str);
		    }
	}*/

	//Записан файл
	$fileopen = fopen($file, "r");
	$filevalue = fread($fileopen, filesize("message.txt"));
	$massiv = explode(" ", $filevalue);
	unset($massiv[count($massiv) - 1]);
	print_r($massiv);

	fclose($fileopen);

	$i1 = 1;
	for($i = 0; $i < count($massiv); $i++)
	{
		$query1 = "INSERT INTO `table2` ( `name`, `text`) VALUES ('$massiv[$i]', '$massiv[$i1]')";
		$sql = mysqli_query($mysqli, $query1);
        if ($sql) 
        {
            echo 'Регистрация прошла успешно!';
                    
        } 
        else 
        {
            echo 'Неверные данные!';
        }
		$i++;
		$i1 += 2;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="post">
	<button type="submit" name="txt" value="txt">Отправить</button>
</form>
</body>
</html>