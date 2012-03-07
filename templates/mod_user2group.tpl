
<div id="user2group_viewer">
	<h2><?php echo $this->label['title']; ?></h2>

	<h3><?php echo $this->label['group']; ?></h3>

	<ul class="groups">
	<?php if ($this->groups): foreach ($this->groups as $group): ?>
		<li>
			<table class="user">
			<thead>
				<tr>
					<th colspan="3"><?php echo $group['name']; ?></th>
				</tr>
			</head>
			<tbody>
			<?php $i=0; foreach ($group['user'] as $user): ?>
			  <tr class="<?php echo ($i++ %2 == 0) ? 'odd':'even' ; ?>">
				<td class="name"><?php echo $user['name']; ?></td>
				<td class="username"><?php echo $user['username']; ?></td>
				<td class="email"><a href="mailto:<?php echo $user['email']; ?>"><?php echo $user['email']; ?></a></td>
			  </tr>
			<?php endforeach; ?>
			</tbody></table>
		</li>
	<?php endforeach; else: echo $this->label['no_groups']; endif; ?>
	</ul>
	
	<h3>Benutzer</h3>
	<table class="allUser">
	<thead>
		<tr>
			<th><?php echo $this->label['user']; ?></th>
			<th><?php echo $this->label['group']; ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($this->allUser as $user): ?>
		<tr class="<?php echo ($i++ %2 == 0) ? 'odd':'even' ; ?>">
			<td class="name">
				<a href="mailto:<?php echo $user['email']; ?>"><?php echo $user['name']; ?></a>
			</td>

			<td class="groups">
				<?php if($user['groups']): foreach ($user['groups'] as $g):
						echo '<span>'.$this->groups[$g]['name'].'</span> ';
					endforeach; endif;
				if ($user['admin']) { echo '<span class="admin">'.$this->label['admin'].'</span>'; } ?>
			</td>
			
		</tr>
	<?php endforeach; ?>
	</tbody></table>
	
	<div class="clear"/></div>
</div>