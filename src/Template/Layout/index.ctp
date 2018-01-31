<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Content</title>
    <?= $this->Html->css('users.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body>
    <div class="container">
        <div class="header_content">
            <a href="/users" class="header_title">User Content</a>
        </div>
    </div>
    <?= $this->fetch('content') ?>
</body>
</html>