/* REQUETES : */

SELECT jeu.* FROM Jeu jeu
ORDER BY jeu.note DESC
LIMIT 1;

SELECT jeu, COUNT(*) as nb
FROM Achat GROUP BY jeu
ORDER BY nb DESC
LIMIT 3;

SELECT jeu.* FROM Jeu jeu
ORDER BY jeu.dateSortie DESC
LIMIT 3;

SELECT jeu.* FROM Jeu jeu
WHERE categorie='' AND nom LIKE '%%';

SELECT achat.* FROM Achat achat, Jeu jeu
WHERE achat.jeu=jeu.id AND jeu.nom LIKE '%%';

SELECT date_part('month', now()) FROM Achat;

SELECT SUM(pu) as montant FROM Achat
WHERE date_part('month', datePayement)=date_part('month', now());

SELECT COUNT(id) as nb FROM Achat
WHERE date_part('month', datePayement)=date_part('month', now());

SELECT achat.jeu as jeu FROM Achat achat
WHERE date_part('month', datePayement)=date_part('month', now())
GROUP BY achat.jeu ORDER BY count(achat.jeu) DESC LIMIT 1;

SELECT date_part('month', datePayement) as month, 
count(id) as nb FROM Achat achat
WHERE date_part('year', datePayement)=date_part('year', now())
GROUP BY date_part('month', datePayement)
ORDER BY date_part('month', datePayement);

SELECT date_part('month', datePayement) as month, 
sum(pu) as chif FROM Achat achat
WHERE date_part('year', datePayement)=date_part('year', now())
GROUP BY date_part('month', datePayement)
ORDER BY date_part('month', datePayement);

SELECT date_part('month', datePayement) as month, 
(CAST (COUNT(achat.id) as FLOAT)/n.nba) as nb
FROM Achat achat, NbAnnee n 
GROUP BY date_part('month', datePayement), n.nba
ORDER BY date_part('month', datePayement)