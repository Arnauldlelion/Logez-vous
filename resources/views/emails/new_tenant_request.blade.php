<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nouvelle requete de locataire</title>
</head>
<body>
    <h2>Nouvelle requete de locataire</h2>
    <p>Nous avons reçu une demande de candidature d'un nouveau locataire. En voici les détails :</p>

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
      
    </table>

    <p>Veuillez prendre les mesures qui s'imposent et assurer le suivi avec le locataire si nécessaire.</p>

    <p>Merci bien!</p>
</body>
</html>