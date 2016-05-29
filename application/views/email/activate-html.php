<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>Bienvenue sur <?php echo $site_name; ?>!</title></head>
<body>
<div style="max-width: 800px; margin: 0; padding: 30px 0;">
<table width="80%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="5%"></td>
<td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">
<h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">Bienvenue sur <?php echo $site_name; ?>!</h2>
Merci d'avoir rejoint <?php echo $site_name; ?>. Nous vous renseignons vos informations d'identification ci-dessous, gardez-les prudemment.<br />
Pour confirmer votre adresse email, merci de cliquer sur le lien suivant:<br />
<br />
<big style="font: 16px/18px Arial, Helvetica, sans-serif;"><b><a href="<?php echo site_url('/auth/activate/'.$user_id.'/'.$new_email_key); ?>" style="color: #3366cc;">Terminer votre enregistrement...</a></b></big><br />
<br />
Le lien ne fonctionne pas ? Copier le lien suivant dans la barre d'adresse de votre navigateur:<br />
<nobr><a href="<?php echo site_url('/auth/activate/'.$user_id.'/'.$new_email_key); ?>" style="color: #3366cc;"><?php echo site_url('/auth/activate/'.$user_id.'/'.$new_email_key); ?></a></nobr><br />
<br />
Merci de vérifier votre adresse email dans les <?php echo $activation_period; ?> heures, autrement votre enregistrement deviendra invalide et vous devrez vous inscrire à nouveau.<br />
<br />
<br />
<?php if (strlen($username) > 0) { ?>Votre nom d'utilisateur: <?php echo $username; ?><br /><?php } ?>
Votre adresse email: <?php echo $email; ?><br />
<?php if (isset($password)) { /* ?>Your password: <?php echo $password; ?><br /><?php */ } ?>
<br />
<br />
Have fun!<br />
L'équipe <?php echo $site_name; ?>
</td>
</tr>
</table>
</div>
</body>
</html>
