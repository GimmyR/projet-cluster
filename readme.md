# Installation :

- Apache ( apache2 )

- PHP ( php ) + dans le doute "libapache2-mod-php" 
	
- postgres ( postgres ) + le driver php vers postgres ( php-pgsql )
	
# Configuration :

- Apache : localhost:80
	
- PHP : display_error = on
	
- postgres : 
	
	- Entrer dans la base : sudo -i -u postgres psql ( + password du super-utilisateur ubuntu )
		
	- Changer le mot de passe de base de l'utilisateur "postgres" par "itu" : ALTER USER postgres WITH PASSWORD 'itu';
		
	- Quitter : \q
		
# Test :

- Postgres : N.B : le nom des objets SQL sur ligne de commande doit etre en minuscule lors des RUD ( Read-Update-Delete ) de ceci
	
	- Entrer : sudo -i -u postgres
		
	- Puis : psql
		
	- Creer la base de donnees "GameBuy" : CREATE DATABASE GameBuy;
		
	- Quitter : \q
		
	- Importer le dump SQL du dossier "JeuAchat/database-dump/" vers notre base de donnees : cat "path/to/JeuAchat/database-dump/dump.sql" | psql -d gamebuy
		
	- Quitter : exit
		
	- Entrer : sudo -i -u postgres psql -d gamebuy
		
	- Verifier si tout est bien importer :
		
		. lister les tables : \dt
		. lister le contenu des tables : SELECT * FROM <table_name> 
			
- Apache :
	
	- Copier le dossier "JeuAchat/" vers "/var/www/html/" : sudo cp -R path/to/JeuAchat /var/www/html/
		
	- Tester sur son navigateur si tout marche bien : http://localhost/JeuAchat/
