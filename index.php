<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>

        <div class="container">
            <h1>Q{ }qa</h1>
            <nav class="header__nav">
                <a href="./add_message.php">Post</a>
                <a href="./add_channel.php">Create chanel</a>
            </nav>
        </div>
    </header>
    <main>
        <?php
        include 'connect.php';

        $cards = array(
            "Html,Css,Javascript" => array("#html", "css", "js", "javascript"),
            "Angular" => array("#angular", "#angular 16"),
            "React" => array("#react"),
            "Php" => array("#php", "#slonik"),
            "C++" => array("#c++"),
            "C#" => array("#c#"),
        );

        foreach ($cards as $card_name => $hashtags) {
            echo "<section>";
            echo "<h2>$card_name</h2>";
            $condition = "";
            foreach ($hashtags as $index => $hashtag) {
                if ($index > 0) {
                    $condition .= " OR ";
                }
                $condition .= "messages.hashtag='$hashtag'";
            }

            $sql = "SELECT messages.message, users.username, channels.channel_name, channels.trusted
                FROM messages
                INNER JOIN users ON messages.author_id = users.id
                INNER JOIN channels ON messages.channel_id = channels.id
                WHERE $condition";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div>";
                    echo "<p><strong>Message:</strong> " . $row["message"] . "</p>";
                    echo "<p><strong>Author:</strong> " . $row["username"] . "</p>";
                    echo "<p><strong>Chanel:</strong> " . $row["channel_name"];
                    if ($row["trusted"] == 1) {
                        echo " (Trusted)";
                    } else {
                        echo " (Untrusted)";
                    }
                    echo "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>There is nothing just yet</p>";
            }
            echo "</section>";
        }
        ?>
    </main>
    <footer></footer>
</body>

</html>