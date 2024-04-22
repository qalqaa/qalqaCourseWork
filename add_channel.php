<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section class="section__add-message">
        <div class="containter">
            <h1>Add chanel</h1>
            <form action="add_channel_complete.php" method="post">
                <ul class="message__list">
                    <li class="list-item"><label>Chanel name</label>
                        <input class="item-input" type="text" name="channel_name" required><br>
                    </li>
                    <li class="list-item"><label>Trusted?</label>
                        <input class="item-select" type="checkbox" name="trusted"><br>
                    </li>
                    <input class="submit-btn" type="submit" value="Добавить">
                </ul>
            </form>
            <a href="./index.php">Back to main page</a>
        </div>
    </section>
</body>

</html>