<?php
function listAction()
{
    $title = 'List of Posts';
    $posts = getAllPosts();
    renderTemplate('templates/list.php', array(
        'title' => $title,
        'posts' => $posts
    ));
}

function showAction($id)
{
    $post = getPostById($id);
    $title = $post['name'];
    renderTemplate('templates/show.php', array(
        'title' => $title,
        'post' => $post
    ));
}

function renderTemplate($path, array $args)
{
    extract($args);
    ob_start();
    require $path;
    $content = ob_get_clean();
    include 'templates/layout.php';
}