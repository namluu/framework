<?php
function openDatabaseConnection()
{
    $link = new PDO("mysql:host=localhost;dbname=blueprint", 'root', '');
    return $link;
}

function closeDatabaseConnection(&$link)
{
    $link = null;
}

function getAllPosts()
{
    $link = openDatabaseConnection();

    $result = $link->query('SELECT id, name FROM cms_article');

    $posts = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $posts[] = $row;
    }
    closeDatabaseConnection($link);

    return $posts;
}

function getPostById($id)
{
    $link = openDatabaseConnection();

    $query = 'SELECT created_at, name, content FROM cms_article WHERE id=:id';
    $statement = $link->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    closeDatabaseConnection($link);

    return $row;
}
