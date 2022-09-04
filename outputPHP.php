<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<script>

function sayHello() {
    alert ("Hello!");
}

</script>

</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <?php
        //output a paragraph that says "I was written by PHP"
        echo "<p>I was written by PHP.</p>";
    ?>

    <ul>
        <li>PHP can send content back to the client</li>
        <?php
        echo "<li>The browser can only read HTML, CSS, JS.</li>";
        ?>
    </ul>

    <?php
        echo "<button onclick='sayHello()'>Button</button>";
    ?>
</body>
</html>