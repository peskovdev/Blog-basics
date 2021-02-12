<?php $_SESSION['title'] = "Админ панель"; ?>
<table class="table">
	<tr> 
		<th>Id</th>
		<th>Login</th>
		<th>Email</th>
		<th>NickName</th>
		<th>rank</th>
	</tr>

	<?php foreach ($users as $user):?>
	<tr> 
		<td><?php echo $user['id']; ?></td>
		<td><?php echo $user['login']; ?></td>
		<td><?php echo $user['email']; ?></td> 
		<td><?php echo $user['nickName']; ?></td>
		<td><?php echo $user['rank']; ?></td>
		
		<td><a href="/account/update/<?php echo $user['login']; ?>"><p class="btn btn-outline-secondary">Изменить</p></a>
			<a href="/account/delete/<?php echo $user['id']; ?>"><p class="btn btn-outline-secondary">Удалить</p></a>
		</td>
	</tr>		
	<?php endforeach; ?>
	
	
</table>
	