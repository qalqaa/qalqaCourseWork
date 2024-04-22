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
        $message = $_POST['message'];
        $hashtag = $_POST['hashtag'];
        $author = $_POST['author'];
        $channel_id = $_POST['channel_id'];
        $user_check_sql = "SELECT id FROM users WHERE username='$author'";
        $user_check_result = $conn->query($user_check_sql);
        if ($user_check_result->num_rows > 0) {
            $row = $user_check_result->fetch_assoc();
            $author_id = $row["id"];
        } else {
            $add_user_sql = "INSERT INTO users (username) VALUES ('$author')";
            if ($conn->query($add_user_sql) === TRUE) {
                $author_id = $conn->insert_id;
            } else {
                echo "Error user! " . $conn->error;
                exit();
            }
        }
        $sql = "INSERT INTO messages (message, hashtag, author_id, channel_id) VALUES ('$message', '$hashtag', '$author_id', '$channel_id')";
        if ($conn->query($sql) === TRUE) {
            echo "Susccesfully added message!<br>";
        } else {
            echo "Error message! " . $conn->error;
        }
        echo "<a href='./index.php'>Back to main screen</a>";
        $conn->close();
        ?>
    </div>

</body>

</html>