Clear-Host

Set-Location src

Remove-Item database/database.sqlite -ErrorAction SilentlyContinue
# execute the migration force and seed
php artisan migrate --force --seed

Set-Location ..