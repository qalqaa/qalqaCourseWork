<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="centered">
        <?php
        include 'connect.php';

        $channel_name = $_POST['channel_name'];
        $trusted = isset($_POST['trusted']) ? 1 : 0;
        $sql = "INSERT INTO channels (channel_name, trusted) VALUES ('$channel_name', '$trusted')";
        if ($conn->query($sql) === TRUE) {
            echo "Chanel created!<br>";
        } else {
            echo "Error! " . $sql . "<br>" . $conn->error;
        }
        echo "<a href='./index.php'>Back to main screen</a>";
        $conn->close();
        ?>

    </div>

</body>

</html>