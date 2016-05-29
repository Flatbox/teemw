<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class'       => 'form-control',
	'style'       => 'max-width: 400px',
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email ou nom d\'utilisateur';
} else {
	$login_label = 'Email';
}
?>
<?php echo form_open($this->uri->uri_string()); ?>

<div class="form-group">
  <?php
		echo form_label($login_label, $login['id']);
		echo form_input($login);
		echo '<div style="color: red">' . form_error($login['name']) . (isset($errors[$login['name']])?$errors[$login['name']]:'') .'</div>';
	?>
</div>

<!-- <table>
	<tr>
		<td><?php echo form_label($login_label, $login['id']); ?></td>
		<td><?php echo form_input($login); ?></td>
		<td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td>
	</tr>
</table> -->
<?php echo form_submit('reset', 'Reçevoir un nouveau mot de passe', "class='btn btn-default'"); ?>
<?php echo form_close(); ?>
