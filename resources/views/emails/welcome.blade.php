<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenu sur la plateforme Logez-vous!</title>
</head>
<body>
   
    <h1>Bienvenue, {{ $landlord->name }}!</h1>
<h2>Votre compte a ete cree avec les informations de connection suivante:</h2>
<h3>Email: {{ $landlord->email }}</h3>
<h3>Password: <b> {{ $password }} </b></h3>
<p>SVP securisez ses informations!</p>
</body>
</html>