<h1>List of Posts</h1>
<ul>
    <?php foreach ($posts as $post): ?>
    <li>
        <a href="/framework/index.php/show?id=<?php echo $post['id'] ?>">
            <?php echo $post['name'] ?>
        </a>
    </li>
    <?php endforeach ?>
</ul>
