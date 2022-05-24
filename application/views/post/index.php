<h1>Все посты</h1>

<p><a href="create">Добавить пост</a></p></br>

<?php foreach ($post as $key => $value): ?>
	<p><a href="view/<?php echo $value['slug']; ?>"><?php echo $value['title']; ?></a> |  <a href="edit/<?php echo $value['slug']; ?>">edit</a> | <a href="delete/<?php echo $value['slug']; ?>">X</a></p>
<?php endforeach ?>