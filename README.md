Korisnički podaci za administratora:
ime: Admin
lozinka: 1.admin.1

Za običnog korisnika odraditi registraciju ili se prijaviti sa
ime: korisnik
lozinka: korisnik123

 
1. Preimenovati .env.example u .env
2. Iz root direktorija:
  <ul>
    <li><b>composer install</b></li>
    <li><b>docker-compose build</b></li>
    <li><b>docker-compose up</b></li>
  </ul>
3. Import u bazu testne podatke  
4. Otvoriti u browseru localhost za aplikaciju i localhost:1080 za mailcatcher

-----------------------------------------------
1. ```make start``` -> starts the environment
2. ```make stop``` -> stops the environment
3. ```make setup``` -> sets up the entire environment
4. ```make run-migrations``` -> executes migrations
5. ```make clear-cache``` -> clears twig cache
6. ```make seed``` -> runs the fixtures (seeds the database)
7. ```make recreate-database``` -> recreates the database (drops database, runs migrations and fixtures)
8. ```make composer-install``` -> runs composer install from php container