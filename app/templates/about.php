<?php $this->layout('template', ['title' => 'About page']) ?>
<h1>About page</h1>
<?php foreach ($posts as $post):?>
    <p><?=$post['id']?></p>
    <p><?=$post['title']?></p>
    <br>
    <br>
<?php endforeach;?>
