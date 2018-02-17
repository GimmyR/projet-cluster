--------------------DATA BASE--------------------------

--------------------Npm de la base : jeux--------------

/* STRUCTURE DE LA BASE : */

Create table Utilisateur(
	id varchar(5),
	username varchar(20),
	email varchar(20),
	password varchar(255),
	admini boolean,
	banni boolean,
	PRIMARY KEY(id)
);

Create table Constructeur(
	id varchar(5),
	nom varchar(20),
	PRIMARY KEY(id)
);

Create table Categorie(
	id varchar(5),
	categorie varchar(20),
	PRIMARY KEY(id)
);

Create table Jeu(
	id varchar(5),
	nom varchar(50),
	description varchar(255),
	categorie varchar(5),
	constructeur varchar(5),
	dateSortie date,
	image varchar(255),
	lien varchar(255),
	note numeric(2, 1),
	prix numeric(10, 2),
	PRIMARY KEY(id),
	FOREIGN KEY(constructeur) REFERENCES Constructeur(id),
	FOREIGN KEY(categorie) REFERENCES Categorie(id)
);

Create table Commentaire(
	id varchar(5),
	utilisateur varchar(5),
	jeu varchar(5),
	dateCom date,
	commentaire varchar(200),
	PRIMARY KEY(id),
	FOREIGN KEY(utilisateur) REFERENCES Utilisateur(id),
	FOREIGN KEY(jeu) REFERENCES Jeu(id)
);

Create table Achat(
	id varchar(5),
	utilisateur varchar(5),
	jeu varchar(5),
	datePayement date,
	pu numeric(10,2),
	PRIMARY KEY(id),
	FOREIGN KEY(utilisateur) REFERENCES Utilisateur(id),
	FOREIGN KEY(jeu) REFERENCES Jeu(id)
);

create table Image(
	id varchar(5),
	jeu varchar(5),
	nom varchar(50),
	PRIMARY KEY(id),
	FOREIGN KEY(jeu) REFERENCES Jeu(id)
);

/* DONNEES DE TESTS UNITAIRES : */

insert into Utilisateur values('U0001', 'Gimmy', 'gimmy@mail.com', 'gptitu','true','false');
insert into Utilisateur values('U0002', 'Pao', 'paopao@mail.com', 'gptitu','true','false');
insert into Utilisateur values('U0003', 'Tiantsoa', 'tiantsoa@mail.com', 'gptitu','true','false');
insert into Utilisateur values('U0004', 'Jean', 'jean@mail.com', 'jean007','false','false');
insert into Utilisateur values('U0005', 'Popey', 'popey@mail.com', 'pops20','false','true');
insert into Utilisateur values('U0006', 'Rakoto', 'rakoto@mail.com', 'rkt2','false','false');
insert into Utilisateur values('U0007', 'Gerrard', 'gerrard@mail.com', 'gg','false','true');
insert into Utilisateur values('U0008', 'Bryan', 'bryan@mail.com', 'tekken','false','false');
insert into Utilisateur values('U0009', 'Dominique', 'dominique@mail.com', 'fast','false','false');
insert into Utilisateur values('U0010', 'Logan', 'logan@mail.com', 'xmen','false','false');

insert into Constructeur values('CO001', 'Ubisoft');
insert into Constructeur values('CO002', 'Blizzard');
insert into Constructeur values('CO003', 'Electronic Arts');
insert into Constructeur values('CO004', 'Activision');
insert into Constructeur values('CO005', 'DICE');
insert into Constructeur values('CO006', 'Square Enix');
insert into Constructeur values('CO007', 'Namco Bandai');
insert into Constructeur values('CO008', 'Valve');
insert into Constructeur values('CO009', 'Konami');
insert into Constructeur values('CO010', 'Rockstar Games');
insert into Constructeur values('CO011', 'Codemasters');
insert into Constructeur values('CO012', 'Red Barrels');
insert into Constructeur values('CO013', '2K Sports');

insert into Categorie values('CA001', 'FPS');
insert into Categorie values('CA002', 'Sport');
insert into Categorie values('CA003', 'Action');
insert into Categorie values('CA004', 'Aventure');
insert into Categorie values('CA005', 'Survival Horror');
insert into Categorie values('CA006', 'MOBA');
insert into Categorie values('CA007', 'Beat Them all');
insert into Categorie values('CA008', 'Infiltration');
insert into Categorie values('CA009', 'Course');
insert into Categorie values('CA010', 'Combat');
insert into Categorie values('CA011', 'MMORPG');

insert into Jeu values('J0001', 'Overwatch', 'Overwatch est un jeu vidéo de tir en vue subjective en ligne développé et publié par Blizzard Entertainment.', 'CA001', 'CO002', '24-05-2016', 'ow.jpg', 'https://www.youtube.com/watch?v=FqnKB22pOC0', '5.0', '39.99');
insert into Jeu values('J0002', 'Fifa 17', 'FIFA 17 est un jeu vidéo de football développé par EA Canada et édité par Electronic Arts.', 'CA002', 'CO003', '27-09-2016', 'ff17.jpg', 'https://www.youtube.com/watch?v=yYjD78X1d9Q', '4.5', '19.99');
insert into Jeu values('J0003', 'Assassins Creed Syndicate', 'Assassins Creed Syndicate est un jeu vidéo d action-aventure et d infiltration développé par Ubisoft Québec et édité par Ubisoft.', 'CA003', 'CO001', '23-10-2015', 'asscs.jpg', 'https://www.youtube.com/watch?v=WTBbwgsyxvg', '4.0', '39.99');
insert into Jeu values('J0004', 'The Division', 'Tom Clancy’s The Division est un jeu vidéo en ligne à monde ouvert de tir tactique et d action-RPG développé par Ubisoft.', 'CA003', 'CO001', '08-03-2016', 'td.jpg', 'https://www.youtube.com/watch?v=yPq_NVi-TC4', '4.0', '49.99');
insert into Jeu values('J0005', 'Watch Dogs 2', 'Watch Dogs 2, typographié WATCH_DOGS 2, est un jeu vidéo d action-aventure et d infiltration développé par le studio Ubisoft Montréal et édité par Ubisoft.', 'CA008', 'CO001', '29-11-2016', 'wd2.jpg', 'https://www.youtube.com/watch?v=ixDxJ_X1pfo', '4.5', '59.99');
insert into Jeu values('J0006', 'Far Cry Primal', 'Far Cry Primal est un jeu vidéo d action-aventure à la première personne développé par Ubisoft Montréal se déroulant dans un monde ouvert à l Âge de la pierre.', 'CA004', 'CO001', '23-02-2016', 'fcp.jpg', 'https://www.youtube.com/watch?v=LJ2iH57Fs3M', '4.0', '49.99');
insert into Jeu values('J0007', 'Call of Duty: Infinite Warfare', 'Call of Duty: Infinite Warfare est un jeu vidéo de tir à la première personne développé par Infinity Ward et édité par Activision.', 'CA001', 'CO004', '04-11-2016', 'cod.jpg', 'https://www.youtube.com/watch?v=EeF3UTkCoxY', '4.5', '59.99');
insert into Jeu values('J0008', 'Counter-Strike: Global Offensive', 'Counter-Strike: Global Offensive est un jeu de tir à la première personne multijoueur en ligne basé sur le jeu d équipe développé par Valve Corporation.', 'CA001', 'CO008', '21-08-2012', 'csgo.jpg', 'https://www.youtube.com/watch?v=edYCtaNueQY', '4.0', '14.99');
insert into Jeu values('J0009', 'Dota', 'Dota 2 est un jeu vidéo de type arène de bataille en ligne multijoueur développé et édité par Valve Corporation.', 'CA006', 'CO008', '09-07-2013', 'dota.jpg', 'https://www.youtube.com/watch?v=-cSFPIwMEq4', '4.0', '0.00');
insert into Jeu values('J0010', 'NBA 2k17', 'NBA 2K17 est un jeu vidéo de basket-ball dévéloppé par Visual Concepts et édité par 2K Sports.', 'CA002', 'CO013', '20-09-2016', 'nba2k17.jpg', 'https://www.youtube.com/watch?v=cQKDcMxTAfw', '4.5', '59.99');
insert into Jeu values('J0011', 'Titanfall 2', 'Titanfall 2 est un jeu vidéo de tir en vue à la première personne développé par Respawn Entertainment et édité par Electronic Arts.', 'CA001', 'CO003', '28-10-2016', 'tf2.jpg', 'https://www.youtube.com/watch?v=EXwdWuSuiYA', '4.0', '39.99');
insert into Jeu values('J0012', 'Dirt 4', 'Dirt 4 est un jeu vidéo de course de rallye automobile et il est le quatrième de la série DiRT développé et publié par Codemasters.', 'CA009', 'CO011', '09-06-2017', 'dirt4.jpg', 'https://www.youtube.com/watch?v=uPGxOIXSAG4', '4.5', '59.99');
insert into Jeu values('J0013', 'Outlast 2', 'Outlast 2 est un jeu vidéo de survival horror en vue à la première personne développé et édité par Red Barrels.', 'CA005', 'CO001', '25-04-2017', 'ol2.jpg', 'https://www.youtube.com/watch?v=EOrTuPljfPU', '4.0', '29.99');
insert into Jeu values('J0014', 'Battlefield 1', 'Battlefield 1 est un jeu vidéo de tir à la première personne développé par DICE.', 'CA001', 'CO005', '21-10-2016', 'bf1.jpg', 'https://www.youtube.com/watch?v=O3zza3ofZ0Q', '4.0', '23.99');
insert into Jeu values('J0015', 'Mirrors Edge Catalyst', 'Mirrors Edge Catalyst est un jeu vidéo développé par DICE et édité par Electronic Arts.', 'CA003', 'CO005', '09-06-2016', 'mec.jpg', 'https://www.youtube.com/watch?v=r6GQEtUREWY', '3.5', '12.99');
insert into Jeu values('J0016', 'Grand Theft Auto V', 'Grand Theft Auto V est un jeu vidéo d action-aventure édité Rockstar Games', 'CA004', 'CO010', '17-09-2013', 'gta5.jpg', 'https://www.youtube.com/watch?v=QkkoHAzjnUs', '4.0', '59.99');
insert into Jeu values('J0017', 'Tekken 7', 'Tekken 7 est un jeu vidéo de combat de la série Tekken développé et édité par Bandai Namco Games.', 'CA010', 'CO007', '02-06-2017', 't7.jpg', 'https://www.youtube.com/watch?v=uEnz36xOSs4', '4.5', '49.99');
insert into Jeu values('J0018', 'NieR Automata', 'Nier: Automata est un jeu vidéo de type action-RPG édité par Square Enix.', 'CA007', 'CO006', '23-02-2017', 'na.jpg', 'https://www.youtube.com/watch?v=VtakOsHZPDE', '5.0', '59.99');
insert into Jeu values('J0019', 'Final Fantasy XIV', 'Final Fantasy XIV : A Realm Reborn est un jeu de rôle en ligne massivement multijoueur sur PC développé par Square Enix', 'CA011', 'CO006', '27-08-2013', 'ff14.jpg', 'https://www.youtube.com/watch?v=39j5v8jlndM', '4.0', '19.99');
insert into Jeu values('J0020', 'Rise of the Tomb Raider', 'Rise of the Tomb Raider est un jeu vidéo d action-aventure de Square Enix', 'CA004', 'CO006', '13-11-2015', 'rottr.jpg', 'https://www.youtube.com/watch?v=WZhb8ZipUyc', '5.0', '59.99');

insert into Commentaire values('CM001', 'U0001', 'J0002', '12-12-2016', 'Nice game');
insert into Commentaire values('CM002', 'U0003', 'J0003', '11-01-2017', 'Super, jadore');
insert into Commentaire values('CM003', 'U0002', 'J0001', '02-02-2017', 'Je suis satisfait');
insert into Commentaire values('CM004', 'U0003', 'J0012', '02-02-2017', 'Trop Chere xD');
insert into Commentaire values('CM005', 'U0002', 'J0007', '02-02-2017', 'Il est pas mal');
insert into Commentaire values('CM006', 'U0002', 'J0020', '02-02-2017', 'GG WP');

insert into Achat values('A0001', 'U0001', 'J0002', '10-12-2016', '19.99');
insert into Achat values('A0002', 'U0003', 'J0003', '02-01-2017', '39.99');
insert into Achat values('A0003', 'U0001', 'J0002', '08-01-2017', '39.99');
insert into Achat values('A0004', 'U0002', 'J0005', '05-02-2017', '59.99');
insert into Achat values('A0005', 'U0003', 'J0010', '10-02-2017', '59.99');
insert into Achat values('A0006', 'U0002', 'J0018', '22-02-2017', '59.99');
insert into Achat values('A0007', 'U0002', 'J0003', '12-03-2017', '39.99');
insert into Achat values('A0008', 'U0003', 'J0002', '15-03-2017', '19.99');
insert into Achat values('A0009', 'U0001', 'J0020', '30-03-2017', '59.99');
insert into Achat values('A0010', 'U0002', 'J0010', '28-04-2017', '59.99');
insert into Achat values('A0011', 'U0003', 'J0005', '02-05-2017', '59.99');
insert into Achat values('A0012', 'U0001', 'J0014', '03-05-2017', '23.99');
insert into Achat values('A0013', 'U0001', 'J0009', '08-05-2017', '0.00');
insert into Achat values('A0014', 'U0003', 'J0012', '10-05-2017', '59.99');
insert into Achat values('A0015', 'U0003', 'J0007', '15-05-2017', '59.99');
insert into Achat values('A0016', 'U0002', 'J0008', '23-05-2017', '14.99');
insert into Achat values('A0017', 'U0001', 'J0001', '05-06-2017', '39.99');
insert into Achat values('A0018', 'U0003', 'J0015', '06-06-2017', '12.99');
insert into Achat values('A0019', 'U0002', 'J0001', '15-06-2017', '39.99');
insert into Achat values('A0020', 'U0001', 'J0003', '17-06-2017', '39.99');
insert into Achat values('A0021', 'U0004', 'J0012', '10-06-2017', '59.99');
insert into Achat values('A0022', 'U0006', 'J0020', '15-05-2017', '59.99');
insert into Achat values('A0023', 'U0008', 'J0002', '09-06-2017', '19.99');
insert into Achat values('A0024', 'U0008', 'J0005', '04-04-2017', '59.99');
insert into Achat values('A0025', 'U0010', 'J0010', '16-02-2017', '59.99');
insert into Achat values('A0026', 'U0009', 'J0015', '25-03-2017', '12.99');
insert into Achat values('A0027', 'U0003', 'J0007', '18-03-2017', '59.99');
insert into Achat values('A0028', 'U0002', 'J0004', '06-06-2017', '49.99');
insert into Achat values('A0029', 'U0004', 'J0005', '06-01-2017', '59.99');
insert into Achat values('A0030', 'U0008', 'J0014', '27-05-2017', '23.99');
insert into Achat values('A0031', 'U0010', 'J0013', '06-05-2017', '29.99');
insert into Achat values('A0032', 'U0009', 'J0009', '07-05-2017', '0.00');
insert into Achat values('A0033', 'U0004', 'J0017', '15-04-2017', '49.99');
insert into Achat values('A0034', 'U0006', 'J0018', '13-01-2017', '59.99');
insert into Achat values('A0035', 'U0008', 'J0007', '12-02-2017', '59.99');
insert into Achat values('A0036', 'U0004', 'J0002', '27-03-2017', '19.99');
insert into Achat values('A0037', 'U0006', 'J0001', '17-06-2017', '39.99');
insert into Achat values('A0038', 'U0009', 'J0006', '19-04-2017', '49.99');
insert into Achat values('A0039', 'U0010', 'J0014', '01-04-2017', '23.99');
insert into Achat values('A0040', 'U0009', 'J0007', '13-04-2017', '59.99');


insert into Image values('IM001' , 'J0001', 'Overwatch/1.jpg');
insert into Image values('IM002' , 'J0001', 'Overwatch/2.jpg');
insert into Image values('IM003' , 'J0001', 'Overwatch/3.jpg');
insert into Image values('IM004' , 'J0001', 'Overwatch/4.jpg');
insert into Image values('IM005' , 'J0001', 'Overwatch/5.jpg');
insert into Image values('IM006' , 'J0002', 'fifa 17/1.jpg');
insert into Image values('IM007' , 'J0002', 'fifa 17/2.jpg');
insert into Image values('IM008' , 'J0002', 'fifa 17/3.jpg');
insert into Image values('IM009' , 'J0002', 'fifa 17/4.jpg');
insert into Image values('IM010' , 'J0002', 'fifa 17/5.jpg');
insert into Image values('IM011' , 'J0003', 'Assassins Creed Syndicate/1.jpg');
insert into Image values('IM012' , 'J0003', 'Assassins Creed Syndicate/2.jpg');
insert into Image values('IM013' , 'J0003', 'Assassins Creed Syndicate/3.jpg');
insert into Image values('IM014' , 'J0003', 'Assassins Creed Syndicate/4.jpg');
insert into Image values('IM015' , 'J0003', 'Assassins Creed Syndicate/5.jpg');
insert into Image values('IM016' , 'J0004', 'The Division/1.jpg');
insert into Image values('IM017' , 'J0004', 'The Division/2.jpg');
insert into Image values('IM018' , 'J0004', 'The Division/3.jpg');
insert into Image values('IM019' , 'J0004', 'The Division/4.jpg');
insert into Image values('IM020' , 'J0004', 'The Division/5.jpg');
insert into Image values('IM021' , 'J0005', 'Watch Dogs2/1.jpg');
insert into Image values('IM022' , 'J0005', 'Watch Dogs2/2.jpg');
insert into Image values('IM023' , 'J0005', 'Watch Dogs2/3.jpg');
insert into Image values('IM024' , 'J0005', 'Watch Dogs2/4.jpg');
insert into Image values('IM025' , 'J0005', 'Watch Dogs2/5.jpg');
insert into Image values('IM026' , 'J0006', 'Far Cry Primal/1.jpg');
insert into Image values('IM027' , 'J0006', 'Far Cry Primal/2.jpg');
insert into Image values('IM028' , 'J0006', 'Far Cry Primal/3.jpg');
insert into Image values('IM029' , 'J0006', 'Far Cry Primal/4.jpg');
insert into Image values('IM030' , 'J0006', 'Far Cry Primal/5.jpg');
insert into Image values('IM031' , 'J0007', 'Infinite Warfare/1.jpg');
insert into Image values('IM032' , 'J0007', 'Infinite Warfare/2.jpg');
insert into Image values('IM033' , 'J0007', 'Infinite Warfare/3.jpg');
insert into Image values('IM034' , 'J0007', 'Infinite Warfare/4.jpg');
insert into Image values('IM035' , 'J0007', 'Infinite Warfare/5.jpg');
insert into Image values('IM036' , 'J0008', 'CS go/1.jpg');
insert into Image values('IM037' , 'J0008', 'CS go/2.jpg');
insert into Image values('IM038' , 'J0008', 'CS go/3.jpg');
insert into Image values('IM039' , 'J0008', 'CS go/4.jpg');
insert into Image values('IM040' , 'J0008', 'CS go/5.jpg');
insert into Image values('IM041' , 'J0009', 'Dota/1.jpg');
insert into Image values('IM042' , 'J0009', 'Dota/2.jpg');
insert into Image values('IM043' , 'J0009', 'Dota/3.jpg');
insert into Image values('IM044' , 'J0009', 'Dota/4.jpg');
insert into Image values('IM045' , 'J0009', 'Dota/5.jpg');
insert into Image values('IM046' , 'J0010', 'Nba 2k17/1.jpg');
insert into Image values('IM047' , 'J0010', 'Nba 2k17/2.jpg');
insert into Image values('IM048' , 'J0010', 'Nba 2k17/3.jpg');
insert into Image values('IM049' , 'J0010', 'Nba 2k17/4.jpg');
insert into Image values('IM050' , 'J0010', 'Nba 2k17/5.jpg');
insert into Image values('IM051' , 'J0011', 'Titanfall 2/1.jpg');
insert into Image values('IM052' , 'J0011', 'Titanfall 2/2.jpg');
insert into Image values('IM053' , 'J0011', 'Titanfall 2/3.jpg');
insert into Image values('IM054' , 'J0011', 'Titanfall 2/4.jpg');
insert into Image values('IM055' , 'J0011', 'Titanfall 2/5.jpg');
insert into Image values('IM056' , 'J0012', 'Dirt 4/1.jpg');
insert into Image values('IM057' , 'J0012', 'Dirt 4/2.jpg');
insert into Image values('IM058' , 'J0012', 'Dirt 4/3.jpg');
insert into Image values('IM059' , 'J0012', 'Dirt 4/4.jpg');
insert into Image values('IM060' , 'J0012', 'Dirt 4/5.jpg');
insert into Image values('IM061' , 'J0013', 'Outlast 2/1.jpg');
insert into Image values('IM062' , 'J0013', 'Outlast 2/2.jpg');
insert into Image values('IM063' , 'J0013', 'Outlast 2/3.jpg');
insert into Image values('IM064' , 'J0013', 'Outlast 2/4.jpg');
insert into Image values('IM065' , 'J0013', 'Outlast 2/5.jpg');
insert into Image values('IM066' , 'J0014', 'Battlefield 1/1.jpg');
insert into Image values('IM067' , 'J0014', 'Battlefield 1/2.jpg');
insert into Image values('IM068' , 'J0014', 'Battlefield 1/3.jpg');
insert into Image values('IM069' , 'J0014', 'Battlefield 1/4.jpg');
insert into Image values('IM070' , 'J0014', 'Battlefield 1/5.jpg');
insert into Image values('IM071' , 'J0015', 'Mirros edge catalyst/1.jpg');
insert into Image values('IM072' , 'J0015', 'Mirros edge catalyst/2.jpg');
insert into Image values('IM073' , 'J0015', 'Mirros edge catalyst/3.jpg');
insert into Image values('IM074' , 'J0015', 'Mirros edge catalyst/4.jpg');
insert into Image values('IM075' , 'J0015', 'Mirros edge catalyst/5.jpg');
insert into Image values('IM076' , 'J0016', 'gta5/1.jpg');
insert into Image values('IM077' , 'J0016', 'gta5/2.jpg');
insert into Image values('IM078' , 'J0016', 'gta5/3.jpg');
insert into Image values('IM079' , 'J0016', 'gta5/4.jpg');
insert into Image values('IM080' , 'J0016', 'gta5/5.jpg');
insert into Image values('IM081' , 'J0017', 'tekken 7/1.jpg');
insert into Image values('IM082' , 'J0017', 'tekken 7/2.jpg');
insert into Image values('IM083' , 'J0017', 'tekken 7/3.jpg');
insert into Image values('IM084' , 'J0017', 'tekken 7/4.jpg');
insert into Image values('IM085' , 'J0017', 'tekken 7/5.jpg');
insert into Image values('IM086' , 'J0018', 'Nier Automata/1.jpg');
insert into Image values('IM087' , 'J0018', 'Nier Automata/2.jpg');
insert into Image values('IM088' , 'J0018', 'Nier Automata/3.jpg');
insert into Image values('IM089' , 'J0018', 'Nier Automata/4.jpg');
insert into Image values('IM090' , 'J0018', 'Nier Automata/5.jpg');
insert into Image values('IM091' , 'J0019', 'FF A Realm Reborn/1.jpg');
insert into Image values('IM092' , 'J0019', 'FF A Realm Reborn/2.jpg');
insert into Image values('IM093' , 'J0019', 'FF A Realm Reborn/3.jpg');
insert into Image values('IM094' , 'J0019', 'FF A Realm Reborn/4.jpg');
insert into Image values('IM095' , 'J0019', 'FF A Realm Reborn/5.jpg');
insert into Image values('IM096' , 'J0020', 'Rottr/1.jpg');
insert into Image values('IM097' , 'J0020', 'Rottr/2.jpg');
insert into Image values('IM098' , 'J0020', 'Rottr/3.jpg');
insert into Image values('IM099' , 'J0020', 'Rottr/4.jpg');
insert into Image values('IM100' , 'J0020', 'Rottr/5.jpg');
insert into Image values('IM101' , 'J0001', 'front/01.jpg');
insert into Image values('IM102' , 'J0002', 'front/02.jpg');
insert into Image values('IM103' , 'J0003', 'front/03.jpg');
insert into Image values('IM104' , 'J0004', 'front/04.jpg');
insert into Image values('IM105' , 'J0005', 'front/05.jpg');
insert into Image values('IM106' , 'J0006', 'front/06.jpg');
insert into Image values('IM107' , 'J0007', 'front/07.jpg');
insert into Image values('IM108' , 'J0008', 'front/08.jpg');
insert into Image values('IM109' , 'J0009', 'front/09.jpg');
insert into Image values('IM110' , 'J0010', 'front/10.jpg');
insert into Image values('IM111' , 'J0011', 'front/11.jpg');
insert into Image values('IM112' , 'J0012', 'front/12.jpg');
insert into Image values('IM113' , 'J0013', 'front/13.jpg');
insert into Image values('IM114' , 'J0014', 'front/14.jpg');
insert into Image values('IM115' , 'J0015', 'front/15.jpg');
insert into Image values('IM116' , 'J0016', 'front/16.jpg');
insert into Image values('IM117' , 'J0017', 'front/17.jpg');
insert into Image values('IM118' , 'J0018', 'front/18.jpg');
insert into Image values('IM119' , 'J0019', 'front/19.jpg');
insert into Image values('IM120' , 'J0020', 'front/20.jpg');

/* Sequences ;  */

create Sequence seqUtilisateur START 11;
create Sequence seqJeu START 21;
create Sequence seqConstructeur START 14;
create Sequence seqCom START 7;
create Sequence seqCategorie START 12;
create Sequence seqAchat START 41;
create Sequence seqImage START 121;

/* VIEWS */

CREATE VIEW NbAnnee AS
SELECT count(DISTINCT date_part('year', datePayement)) as nbA FROM Achat;

