<?php
ini_set('display_errors', 1);
require 'includes/setup.php';

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
    header('Location: index.php');
}

if(isset($_POST['submit'])){
    $newpost = new Post($user);
    $newpost->setNew($_POST['postcont']);
    $query->pushPost($newpost);
}

$posts = $query->allPosts();

$i=0;
foreach ($posts as $post){
    //$readpost[$i] = $post;
    $readpost[$i] = new Post();
    $readpost[$i]->setRead(
        $post['postid'],
        $post['userid'],
        $post['postcont'],
        $post['postdesc'],
        $post['canexpand'],
        $post['postdate']
    );
    $i++;
}

require 'views/home.view.php';