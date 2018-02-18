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

- Apache :

	- Deployez ce projet ( projet-cluster ) dans le repertoire "/var/www/html/" : sudo git clone https://github.com/GimmyR/projet-cluster.git

- Postgres : N.B : le nom des objets SQL sur ligne de commande doit etre en minuscule lors des RUD ( Read-Update-Delete ) de ceci
	
	- Entrer : sudo -i -u postgres
		
	- Puis : psql
		
	- Creer la base de donnees "GameBuy" : CREATE DATABASE GameBuy;
		
	- Quitter : \q
		
	- Importer le dump SQL du dossier "database-dump/" : cat "path/to/database-dump/dump.sql" | psql -d gamebuy
		
	- Quitter : exit
		
	- Entrer : sudo -i -u postgres psql -d gamebuy
		
	- Verifier si tout est bien importer :
		
		- lister les tables : \dt
		- lister le contenu des tables : SELECT * FROM <table_name> 
		
- Passez au test en lancant : http://localhost/projet-cluster/
