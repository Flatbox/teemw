Bienvenue sur <?php echo $site_name; ?>,

Merci d'avoir rejoint <?php echo $site_name; ?>. Nous vous renseignons vos informations d'identification ci-dessous, gardez-les prudemment.
Pour confirmer votre adresse email, merci de cliquer sur le lien suivant:

<?php echo site_url('/auth/activate/'.$user_id.'/'.$new_email_key); ?>


Merci de vérifier votre adresse email dans les <?php echo $activation_period; ?> heures, autrement votre enregistrement deviendra invalide et vous devrez vous inscrire à nouveau.
<?php if (strlen($username) > 0) { ?>

Votre nom d'utilisateur: <?php echo $username; ?>
<?php } ?>

Votre adresse email: <?php echo $email; ?>
<?php if (isset($password)) { /* ?>

Your password: <?php echo $password; ?>
<?php */ } ?>



Have fun!
L'équipe <?php echo $site_name; ?>
