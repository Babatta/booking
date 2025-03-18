<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Réservation</title>
</head>
<body>
    <h2>Bonjour {{ $booking->user->name }},</h2>
    <p>Votre réservation a bien été confirmée !</p>

    <p><strong>Propriété :</strong> {{ $booking->property->name }}</p>
    <p><strong>Date de début :</strong> {{ $booking->start_date }}</p>
    <p><strong>Date de fin :</strong> {{ $booking->end_date }}</p>

    <p>Merci pour votre confiance !</p>
</body>
</html>
