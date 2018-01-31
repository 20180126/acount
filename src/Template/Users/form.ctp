<div class="container">
    <div class="user" style="padding: 30px 0;font-size: 1.6em;">
        Login: <?= $user['name'] ?>
    </div>
</div>
<div class="container">
<div class="items_title" style="padding: 30px 0;font-size: 1.6em;">Items</div>
<?php foreach($posts as $i): ?>
    <div class="items">
        <li><?= $i->content ?></li>
    </div>
<?php endforeach ?>
</div>