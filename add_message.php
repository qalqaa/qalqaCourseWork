<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section class="section__add-message">
        <div class="containter">
            <h1>Add message</h1>
            <form action="add_message_complete.php" method="post">
                <ul class="message__list">
                    <li class="list-item"><label>Message</label>
                        <input class="item-input" placeholder="Type message..." type="text" name="message" required>
                    </li>
                    <li class="list-item">
                        <label>Hashtag</label>
                        <input class="item-input" placeholder="#example" type="text" name="hashtag" required>
                    </li>
                    <li class="list-item">
                        <label>Author</label>
                        <input class="item-input" placeholder="Type your nick..." type="text" name="author" required>
                    </li>
                    <li class="list-item">
                        <label>Chanel</label>
                        <select class="item-select" name="channel_id">
                    </li>
                </ul>


                <?php
                include 'connect.php';

                $sql = "SELECT * FROM channels";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["id"] . "'>" . $row["channel_name"] . "</option>";
                    }
                } else {
                    echo "<option value=''>Нет каналов</option>";
                }
                ?>
                </select><br>
                <input class="submit-btn" type="submit" value="Submit">
            </form>
            <a href="./index.php">Back to main page</a>
        </div>
    </section>
</body>

</html>