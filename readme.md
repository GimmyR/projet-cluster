# Installation :

- Apache ( apache2 )

- PHP ( php ) + dans le doute "libapache2-mod-php" 
	
- postgres ( postgres ) + le driver php vers postgres ( php-pgsql )
	
# Configuration :

- Apache : localhost:80
	
- PHP : display_error = on
	
- ## postgres : 
	
		c . 1 - Entrer dans la base : sudo -i -u postgres psql ( + password du super-utilisateur ubuntu )
		
		c . 2 - Changer le mot de passe de base de l'utilisateur "postgres" par "itu" : ALTER USER postgres WITH PASSWORD 'itu';
		
		c . 3 - Quitter : \q
		
3) Test :

	a - Postgres : N.B : le nom des objets SQL sur ligne de commande doit etre en minuscule lors des RUD ( Read-Update-Delete ) de ceci
	
		a . 1 - Entrer : sudo -i -u postgres
		
		a . 2 - Puis : psql
		
		a . 3 - Creer la base de donnees "GameBuy" : CREATE DATABASE GameBuy;
		
		a . 4 - Quitter : \q
		
		a . 5 - Importer le dump SQL du dossier "JeuAchat/database-dump/" vers notre base de donnees : cat "path/to/JeuAchat/database-dump/dump.sql" | psql -d gamebuy
		
		a . 6 - Quitter : exit
		
		a . 7 - Entrer : sudo -i -u postgres psql -d gamebuy
		
		a . 8 - Verifier si tout est bien importer :
		
			- lister les tables : \dt
			- lister le contenu des tables : SELECT * FROM <table_name> 
			
	b - Apache :
	
		b . 1 - Copier le dossier "JeuAchat/" vers "/var/www/html/" : sudo cp -R path/to/JeuAchat /var/www/html/
		
		b . 2 - Tester sur son navigateur si tout marche bien : http://localhost/JeuAchat/
