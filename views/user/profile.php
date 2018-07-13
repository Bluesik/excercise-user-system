<?php 


if(! $user = \App\Auth::user()){
    die('You must log in to view this page');
}

?>

<p>ID:       <?= $user['id'] ?></p>
<p>Username: <?= $user['username'] ?></p>
<p>Email:    <?= $user['email'] ?></p>
<p>Name:     <?= $user['name'] ?></p>