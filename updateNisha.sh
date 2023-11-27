#! /bin/bash
cd /var/www/html/TheNishaProject
git pull origin main
composer i
npm run build
