<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Prise de contact sur mon site JusteUnRegard</h2>
<p>Réception d'une prise de contact avec les éléments suivants :</p>
<ul>
    <li><strong>Nom</strong> : {{ $contact['nom'] }}</li>
    <li><strong>Email</strong> : {{ $contact['email'] }}</li>
    <li><strong>Message</strong> : {{ $contact['texte'] }}</li>
</ul>
</body>
</html>
