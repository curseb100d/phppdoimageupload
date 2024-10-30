<?php

include ('connect.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $mobile = $_POST['mobile'];
    $image = $_FILES['file'];

    $imagefilename = $image['name'];
    $imagefileerror = $image['error'];
    $imagefiletemp = $image['tmp_name'];

    $filename_separate = explode('.', $imagefilename);
    $file_extension = strtolower(end($filename_separate));

    $allowed_extensions = array('jpeg', 'jpg', 'png');
    if (in_array($file_extension, $allowed_extensions)) {
        $upload_image = 'images/' . $imagefilename;
        move_uploaded_file($imagefiletemp, $upload_image);

        $sql = "INSERT INTO `registration` (username, mobile, image) VALUES (:username, :mobile, :image)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':mobile', $mobile);
        $stmt->bindParam(':image', $upload_image);

        if ($stmt->execute()) {
            echo "Data inserted successfully";
        } else {
            echo "Failed to insert data";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
</head>
<body>
    <h1>Displaying data</h1>
    <div>
        <table>
            <tr>
                <th>id</th>
                <th>username</th>
                <th>mobile</th>
                <th>image</th>
            </tr>
            <?php
                $sql = "SELECT * FROM `registration`";
                $stmt = $pdo->query($sql);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $id = $row['id'];
                    $username = $row['username'];
                    $mobile = $row['mobile'];
                    $image = $row['image'];

                    echo '
                        <tr>
                            <td>'.$id.'</td>
                            <td>'.$username.'</td>
                            <td>'.$mobile.'</td>
                            <td><img src='.$image.' /></td>
                        </tr>';
                }
            ?>
        </table>
    </div>
</body>
</html>
