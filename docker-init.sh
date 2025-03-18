#!/bin/bash

echo "📌 Attente de la disponibilité de MySQL..."

# Boucle pour attendre que MySQL soit prêt
until mysql -h db -u root -p"$DB_PASSWORD" -e "SELECT 1" &> /dev/null; do
    echo "⏳ En attente de MySQL..."
    sleep 5
done

echo "✅ MySQL est prêt, exécution des migrations et seeders..."

# Exécuter les migrations et seeders
php artisan migrate --force
php artisan db:seed --force

echo "✅ Migrations et seeders exécutés avec succès."

# Lancer Apache en arrière-plan
apache2-foreground
