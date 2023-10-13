<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle alerte de candidature!</title>
</head>
<body>
    <h1>Nouvelle Requete de locataire.</h1>
    <p>Un nouveau locataire vient de candidater pour un logement. ci-apres sont marquees ses informations:</p>
    <ul>
        <li>Name: {{ $tenant->first_name }} {{ $tenant->last_name }}</li>
        <li>Email: {{ $tenant->email }}</li>
        <li>Phone: {{ $tenant->phone }}</li>
    </ul>
</body>
</html>