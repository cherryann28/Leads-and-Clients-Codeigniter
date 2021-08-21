<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_POST['update'])){
    $data = '';

    foreach($up as $value){ 
        echo $data .= '{ y: ' . $value['number_of_leads'].', label: ' .'"' . $value['client_name']. '"'.'},';
    }
    echo $data;
}

else {
    echo 'effective';
}
?>
 

</body>
</html>