<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenu sur la plateforme Logez-vous!</title>
</head>
<body>
   
    <h2>Bienvenue, M/Mme {{ $landlord->name }} sur la plateforme Logez-vous!</h2>
    <p>Nous avons le plaisir de vous informer que votre compte a été créé avec succès. Veuillez trouver ci-dessous les informations de connexion associées à votre compte :</p>
    <p>Email: {{ $landlord->email }}</p>
    <p>Mot de passe: <b> {{ $password }} </b></p>
    <p>Connectez vous ici: <b> https://www.Logez-vous.com/ </b></p>
    <p>Nous vous prions de veiller à la sécurité de ces informations confidentielles pour garantir leur protection.</p>
</body>
</html>