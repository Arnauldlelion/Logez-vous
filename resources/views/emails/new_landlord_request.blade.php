<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nouvelle requete de proprietaire</title>
</head>
<body>
    <h2>Nouvelle requete de proprietaire</h2>
    <p>Nous avons reçu une demande d'enregistrement d'un nouveau propriétaire. Voici les détails :</p>

    <table>
        <tr>
            <td><strong>Nom:</strong></td>
            <td>{{ $emailData['first_name'] }}</td>
        </tr>
        <tr>
            <td><strong>Prenom:</strong></td>
            <td>{{ $emailData['last_name'] }}</td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td>{{ $emailData['email'] }}</td>
        </tr>
        <tr>
            <td><strong>Numero:</strong></td>
            <td>{{ $emailData['phone'] }}</td>
        </tr>
        <tr>
            <td><strong>Localisation:</strong></td>
            <td>{{ $emailData['location'] }}</td>
        </tr>
        <tr>
            <td><strong>Description:</strong></td>
            <td>{{ $emailData['description'] }}</td>
        </tr>
    </table>
    
    <p>Veuillez prendre les mesures qui s'imposent et assurer le suivi avec le propriétaire si nécessaire.</p>

    <p>Merci!</p>
</body>
</html>