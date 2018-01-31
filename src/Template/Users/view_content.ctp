<div class="container">
    <div class="user_posts_content">
        <div class="content_title">
            投稿一覧<br />
        </div>
        <?php foreach($posts as $i): ?>
        <div class="post_content">
            <li><?php echo  $i['title']."\n".$i['content'] ?></li>
        </div>
        <?php endforeach ?>
    </div>
</div>