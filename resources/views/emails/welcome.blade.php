<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenu sur la plateforme Logez-vous!</title>
</head>
<body>
   
    <h1>Bienvenue, M/Mme {{ $landlord->name }} sur la plateforme Logez-vous!</h1>
    <h4>Nous avons le plaisir de vous informer que votre compte a été créé avec succès. Veuillez trouver ci-dessous les informations de connexion associées à votre compte :</h4>
    <h3>Email: {{ $landlord->email }}</h3>
    <h3>Mot de passe: <b> {{ $password }} </b></h3>
    <h3>Connectez vous ici: <b> https://www.Logez-vous.com/ </b></h3>
    <p>Nous vous prions de veiller à la sécurité de ces informations confidentielles pour garantir leur protection.</p>
</body>
</html>