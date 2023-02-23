<?php
require('connect_db.php');
?>
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
        <div class="row">
        <?php
        $select_files = "SELECT * FROM `files`";
        $result = mysqli_query($conn, $select_files);
        if($result) {
            if(mysqli_num_rows($result) > 0) {
                foreach($result as $img) { 
                        print "<img src='".$img['filename']."' class='img-thumbnail m-1' alt='IMG'>";
                }
            } else {
                print "<p style='position: relative;
                         padding: 1rem 1rem;
                         margin-bottom: 1rem;
                         border: 1px solid transparent;
                         border-radius: 0.25rem;
                         color: #084298;
                         background-color: #cfe2ff;
                         border-color: #b6d4fe'>
                В базе данных нет загруженных изображений!</p>";
            }
        } 
        
        ?>
        </div>
    </div>
</body>
</html>
