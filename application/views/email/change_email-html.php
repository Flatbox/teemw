<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>Votre nouvelle adresse email sur <?php echo $site_name; ?></title></head>
<body>
<div style="max-width: 800px; margin: 0; padding: 30px 0;">
<table width="80%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="5%"></td>
<td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">
<h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">Votre nouvelle adresse email sur <?php echo $site_name; ?></h2>
Vous avez changé votre adresse email sur <?php echo $site_name; ?>.<br />
Suivez ce lien pour confirmer votre nouvelle adresse email:<br />
<br />
<big style="font: 16px/18px Arial, Helvetica, sans-serif;"><b><a href="<?php echo site_url('/auth/reset_email/'.$user_id.'/'.$new_email_key); ?>" style="color: #3366cc;">Confirmer votre nouveal email</a></b></big><br />
<br />
Le lien ne fonctionne pas ? Copier le lien suivant dans la barre d'adresse de votre navigateur:<br />
<nobr><a href="<?php echo site_url('/auth/reset_email/'.$user_id.'/'.$new_email_key); ?>" style="color: #3366cc;"><?php echo site_url('/auth/reset_email/'.$user_id.'/'.$new_email_key); ?></a></nobr><br />
<br />
<br />
Votre adresse email: <?php echo $new_email; ?><br />
<br />
<br />
Vous recevez cet email, parce il a été demandé par un utilisateur <a href="<?php echo site_url(''); ?>" style="color: #3366cc;"><?php echo $site_name; ?></a>. Si vous avez reçu ce message par erreur, merci de ne PAS cliquer sur le lien de confirmation, et supprimez simplement cet email. Après une courte période de temps, la demande sera supprimée du système.<br />
<br />
<br />
Merci,<br />
L'équipe <?php echo $site_name; ?>
</td>
</tr>
</table>
</div>
</body>
</html>
