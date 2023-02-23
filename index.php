<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download File</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Download File</h2>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="download_file" class="form-control">
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
<?php
require('connect_db.php');
if(isset($_FILES['download_file'])) {
    $uploaded_file = move_uploaded_file($_FILES['download_file']['tmp_name'], 'img/'.$_FILES['download_file']['name']);
    $file_path =  './img/'.basename($_FILES['download_file']['name']);

    if($_FILES['download_file']['error'] == 0) {
        $sql = "INSERT INTO `files` (`id`, `filename`) VALUES (NULL, '$file_path')"; 
    }

    if($_FILES['download_file']['error'] == 4) {
        print "<p style='position: relative;
                         padding: 1rem 1rem;
                         margin-bottom: 1rem;
                         border: 1px solid transparent;
                         border-radius: 0.25rem;
                         color: #842029;
                         background-color: #f8d7da;
                         border-color: #f5c2c7;'>
                Файл не был загружен.</p>";
        exit;
    }

    if($result = mysqli_query($conn, $sql)){
        header("Location: index.php");  
        exit;
    } else{
        echo "Ошибка: " . mysqli_error($conn);
    }
}
?>
</div>
</body>
</html>