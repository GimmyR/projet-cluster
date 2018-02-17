--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: achat; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE achat (
    id character varying(5) NOT NULL,
    utilisateur character varying(5),
    jeu character varying(5),
    datepayement date,
    pu numeric(10,2)
);


ALTER TABLE achat OWNER TO postgres;

--
-- Name: categorie; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE categorie (
    id character varying(5) NOT NULL,
    categorie character varying(20)
);


ALTER TABLE categorie OWNER TO postgres;

--
-- Name: commentaire; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE commentaire (
    id character varying(5) NOT NULL,
    utilisateur character varying(5),
    jeu character varying(5),
    datecom date,
    commentaire character varying(200)
);


ALTER TABLE commentaire OWNER TO postgres;

--
-- Name: constructeur; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE constructeur (
    id character varying(5) NOT NULL,
    nom character varying(20)
);


ALTER TABLE constructeur OWNER TO postgres;

--
-- Name: image; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE image (
    id character varying(5) NOT NULL,
    jeu character varying(5),
    nom character varying(50)
);


ALTER TABLE image OWNER TO postgres;

--
-- Name: jeu; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE jeu (
    id character varying(5) NOT NULL,
    nom character varying(50),
    description character varying(255),
    categorie character varying(5),
    constructeur character varying(5),
    datesortie date,
    image character varying(255),
    lien character varying(255),
    note numeric(2,1),
    prix numeric(10,2)
);


ALTER TABLE jeu OWNER TO postgres;

--
-- Name: nbannee; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW nbannee AS
 SELECT count(DISTINCT date_part('year'::text, achat.datepayement)) AS nba
   FROM achat;


ALTER TABLE nbannee OWNER TO postgres;

--
-- Name: seqachat; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE seqachat
    START WITH 41
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seqachat OWNER TO postgres;

--
-- Name: seqcategorie; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE seqcategorie
    START WITH 12
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seqcategorie OWNER TO postgres;

--
-- Name: seqcom; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE seqcom
    START WITH 7
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seqcom OWNER TO postgres;

--
-- Name: seqconstructeur; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE seqconstructeur
    START WITH 14
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seqconstructeur OWNER TO postgres;

--
-- Name: seqimage; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE seqimage
    START WITH 121
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seqimage OWNER TO postgres;

--
-- Name: seqjeu; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE seqjeu
    START WITH 21
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seqjeu OWNER TO postgres;

--
-- Name: sequtilisateur; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE sequtilisateur
    START WITH 11
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sequtilisateur OWNER TO postgres;

--
-- Name: utilisateur; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE utilisateur (
    id character varying(5) NOT NULL,
    username character varying(20),
    email character varying(20),
    password character varying(255),
    admini boolean,
    banni boolean
);


ALTER TABLE utilisateur OWNER TO postgres;

--
-- Data for Name: achat; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY achat (id, utilisateur, jeu, datepayement, pu) FROM stdin;
A0001	U0001	J0002	2016-12-10	19.99
A0002	U0003	J0003	2017-01-02	39.99
A0003	U0001	J0002	2017-01-08	39.99
A0004	U0002	J0005	2017-02-05	59.99
A0005	U0003	J0010	2017-02-10	59.99
A0006	U0002	J0018	2017-02-22	59.99
A0007	U0002	J0003	2017-03-12	39.99
A0008	U0003	J0002	2017-03-15	19.99
A0009	U0001	J0020	2017-03-30	59.99
A0010	U0002	J0010	2017-04-28	59.99
A0011	U0003	J0005	2017-05-02	59.99
A0012	U0001	J0014	2017-05-03	23.99
A0013	U0001	J0009	2017-05-08	0.00
A0014	U0003	J0012	2017-05-10	59.99
A0015	U0003	J0007	2017-05-15	59.99
A0016	U0002	J0008	2017-05-23	14.99
A0017	U0001	J0001	2017-06-05	39.99
A0018	U0003	J0015	2017-06-06	12.99
A0019	U0002	J0001	2017-06-15	39.99
A0020	U0001	J0003	2017-06-17	39.99
A0021	U0004	J0012	2017-06-10	59.99
A0022	U0006	J0020	2017-05-15	59.99
A0023	U0008	J0002	2017-06-09	19.99
A0024	U0008	J0005	2017-04-04	59.99
A0025	U0010	J0010	2017-02-16	59.99
A0026	U0009	J0015	2017-03-25	12.99
A0027	U0003	J0007	2017-03-18	59.99
A0028	U0002	J0004	2017-06-06	49.99
A0029	U0004	J0005	2017-01-06	59.99
A0030	U0008	J0014	2017-05-27	23.99
A0031	U0010	J0013	2017-05-06	29.99
A0032	U0009	J0009	2017-05-07	0.00
A0033	U0004	J0017	2017-04-15	49.99
A0034	U0006	J0018	2017-01-13	59.99
A0035	U0008	J0007	2017-02-12	59.99
A0036	U0004	J0002	2017-03-27	19.99
A0037	U0006	J0001	2017-06-17	39.99
A0038	U0009	J0006	2017-04-19	49.99
A0039	U0010	J0014	2017-04-01	23.99
A0040	U0009	J0007	2017-04-13	59.99
\.


--
-- Data for Name: categorie; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY categorie (id, categorie) FROM stdin;
CA001	FPS
CA002	Sport
CA003	Action
CA004	Aventure
CA005	Survival Horror
CA006	MOBA
CA007	Beat Them all
CA008	Infiltration
CA009	Course
CA010	Combat
CA011	MMORPG
\.


--
-- Data for Name: commentaire; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY commentaire (id, utilisateur, jeu, datecom, commentaire) FROM stdin;
CM001	U0001	J0002	2016-12-12	Nice game
CM002	U0003	J0003	2017-01-11	Super, jadore
CM003	U0002	J0001	2017-02-02	Je suis satisfait
CM004	U0003	J0012	2017-02-02	Trop Chere xD
CM005	U0002	J0007	2017-02-02	Il est pas mal
CM006	U0002	J0020	2017-02-02	GG WP
\.


--
-- Data for Name: constructeur; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY constructeur (id, nom) FROM stdin;
CO001	Ubisoft
CO002	Blizzard
CO003	Electronic Arts
CO004	Activision
CO005	DICE
CO006	Square Enix
CO007	Namco Bandai
CO008	Valve
CO009	Konami
CO010	Rockstar Games
CO011	Codemasters
CO012	Red Barrels
CO013	2K Sports
\.


--
-- Data for Name: image; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY image (id, jeu, nom) FROM stdin;
IM001	J0001	Overwatch/1.jpg
IM002	J0001	Overwatch/2.jpg
IM003	J0001	Overwatch/3.jpg
IM004	J0001	Overwatch/4.jpg
IM005	J0001	Overwatch/5.jpg
IM006	J0002	fifa 17/1.jpg
IM007	J0002	fifa 17/2.jpg
IM008	J0002	fifa 17/3.jpg
IM009	J0002	fifa 17/4.jpg
IM010	J0002	fifa 17/5.jpg
IM011	J0003	Assassins Creed Syndicate/1.jpg
IM012	J0003	Assassins Creed Syndicate/2.jpg
IM013	J0003	Assassins Creed Syndicate/3.jpg
IM014	J0003	Assassins Creed Syndicate/4.jpg
IM015	J0003	Assassins Creed Syndicate/5.jpg
IM016	J0004	The Division/1.jpg
IM017	J0004	The Division/2.jpg
IM018	J0004	The Division/3.jpg
IM019	J0004	The Division/4.jpg
IM020	J0004	The Division/5.jpg
IM021	J0005	Watch Dogs2/1.jpg
IM022	J0005	Watch Dogs2/2.jpg
IM023	J0005	Watch Dogs2/3.jpg
IM024	J0005	Watch Dogs2/4.jpg
IM025	J0005	Watch Dogs2/5.jpg
IM026	J0006	Far Cry Primal/1.jpg
IM027	J0006	Far Cry Primal/2.jpg
IM028	J0006	Far Cry Primal/3.jpg
IM029	J0006	Far Cry Primal/4.jpg
IM030	J0006	Far Cry Primal/5.jpg
IM031	J0007	Infinite Warfare/1.jpg
IM032	J0007	Infinite Warfare/2.jpg
IM033	J0007	Infinite Warfare/3.jpg
IM034	J0007	Infinite Warfare/4.jpg
IM035	J0007	Infinite Warfare/5.jpg
IM036	J0008	CS go/1.jpg
IM037	J0008	CS go/2.jpg
IM038	J0008	CS go/3.jpg
IM039	J0008	CS go/4.jpg
IM040	J0008	CS go/5.jpg
IM041	J0009	Dota/1.jpg
IM042	J0009	Dota/2.jpg
IM043	J0009	Dota/3.jpg
IM044	J0009	Dota/4.jpg
IM045	J0009	Dota/5.jpg
IM046	J0010	Nba 2k17/1.jpg
IM047	J0010	Nba 2k17/2.jpg
IM048	J0010	Nba 2k17/3.jpg
IM049	J0010	Nba 2k17/4.jpg
IM050	J0010	Nba 2k17/5.jpg
IM051	J0011	Titanfall 2/1.jpg
IM052	J0011	Titanfall 2/2.jpg
IM053	J0011	Titanfall 2/3.jpg
IM054	J0011	Titanfall 2/4.jpg
IM055	J0011	Titanfall 2/5.jpg
IM056	J0012	Dirt 4/1.jpg
IM057	J0012	Dirt 4/2.jpg
IM058	J0012	Dirt 4/3.jpg
IM059	J0012	Dirt 4/4.jpg
IM060	J0012	Dirt 4/5.jpg
IM061	J0013	Outlast 2/1.jpg
IM062	J0013	Outlast 2/2.jpg
IM063	J0013	Outlast 2/3.jpg
IM064	J0013	Outlast 2/4.jpg
IM065	J0013	Outlast 2/5.jpg
IM066	J0014	Battlefield 1/1.jpg
IM067	J0014	Battlefield 1/2.jpg
IM068	J0014	Battlefield 1/3.jpg
IM069	J0014	Battlefield 1/4.jpg
IM070	J0014	Battlefield 1/5.jpg
IM071	J0015	Mirros edge catalyst/1.jpg
IM072	J0015	Mirros edge catalyst/2.jpg
IM073	J0015	Mirros edge catalyst/3.jpg
IM074	J0015	Mirros edge catalyst/4.jpg
IM075	J0015	Mirros edge catalyst/5.jpg
IM076	J0016	gta5/1.jpg
IM077	J0016	gta5/2.jpg
IM078	J0016	gta5/3.jpg
IM079	J0016	gta5/4.jpg
IM080	J0016	gta5/5.jpg
IM081	J0017	tekken 7/1.jpg
IM082	J0017	tekken 7/2.jpg
IM083	J0017	tekken 7/3.jpg
IM084	J0017	tekken 7/4.jpg
IM085	J0017	tekken 7/5.jpg
IM086	J0018	Nier Automata/1.jpg
IM087	J0018	Nier Automata/2.jpg
IM088	J0018	Nier Automata/3.jpg
IM089	J0018	Nier Automata/4.jpg
IM090	J0018	Nier Automata/5.jpg
IM091	J0019	FF A Realm Reborn/1.jpg
IM092	J0019	FF A Realm Reborn/2.jpg
IM093	J0019	FF A Realm Reborn/3.jpg
IM094	J0019	FF A Realm Reborn/4.jpg
IM095	J0019	FF A Realm Reborn/5.jpg
IM096	J0020	Rottr/1.jpg
IM097	J0020	Rottr/2.jpg
IM098	J0020	Rottr/3.jpg
IM099	J0020	Rottr/4.jpg
IM100	J0020	Rottr/5.jpg
IM101	J0001	front/01.jpg
IM102	J0002	front/02.jpg
IM103	J0003	front/03.jpg
IM104	J0004	front/04.jpg
IM105	J0005	front/05.jpg
IM106	J0006	front/06.jpg
IM107	J0007	front/07.jpg
IM108	J0008	front/08.jpg
IM109	J0009	front/09.jpg
IM110	J0010	front/10.jpg
IM111	J0011	front/11.jpg
IM112	J0012	front/12.jpg
IM113	J0013	front/13.jpg
IM114	J0014	front/14.jpg
IM115	J0015	front/15.jpg
IM116	J0016	front/16.jpg
IM117	J0017	front/17.jpg
IM118	J0018	front/18.jpg
IM119	J0019	front/19.jpg
IM120	J0020	front/20.jpg
\.


--
-- Data for Name: jeu; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY jeu (id, nom, description, categorie, constructeur, datesortie, image, lien, note, prix) FROM stdin;
J0001	Overwatch	Overwatch est un jeu vidéo de tir en vue subjective en ligne développé et publié par Blizzard Entertainment.	CA001	CO002	2016-05-24	ow.jpg	https://www.youtube.com/watch?v=FqnKB22pOC0	5.0	39.99
J0002	Fifa 17	FIFA 17 est un jeu vidéo de football développé par EA Canada et édité par Electronic Arts.	CA002	CO003	2016-09-27	ff17.jpg	https://www.youtube.com/watch?v=yYjD78X1d9Q	4.5	19.99
J0003	Assassins Creed Syndicate	Assassins Creed Syndicate est un jeu vidéo d action-aventure et d infiltration développé par Ubisoft Québec et édité par Ubisoft.	CA003	CO001	2015-10-23	asscs.jpg	https://www.youtube.com/watch?v=WTBbwgsyxvg	4.0	39.99
J0004	The Division	Tom Clancy’s The Division est un jeu vidéo en ligne à monde ouvert de tir tactique et d action-RPG développé par Ubisoft.	CA003	CO001	2016-03-08	td.jpg	https://www.youtube.com/watch?v=yPq_NVi-TC4	4.0	49.99
J0005	Watch Dogs 2	Watch Dogs 2, typographié WATCH_DOGS 2, est un jeu vidéo d action-aventure et d infiltration développé par le studio Ubisoft Montréal et édité par Ubisoft.	CA008	CO001	2016-11-29	wd2.jpg	https://www.youtube.com/watch?v=ixDxJ_X1pfo	4.5	59.99
J0006	Far Cry Primal	Far Cry Primal est un jeu vidéo d action-aventure à la première personne développé par Ubisoft Montréal se déroulant dans un monde ouvert à l Âge de la pierre.	CA004	CO001	2016-02-23	fcp.jpg	https://www.youtube.com/watch?v=LJ2iH57Fs3M	4.0	49.99
J0007	Call of Duty: Infinite Warfare	Call of Duty: Infinite Warfare est un jeu vidéo de tir à la première personne développé par Infinity Ward et édité par Activision.	CA001	CO004	2016-11-04	cod.jpg	https://www.youtube.com/watch?v=EeF3UTkCoxY	4.5	59.99
J0008	Counter-Strike: Global Offensive	Counter-Strike: Global Offensive est un jeu de tir à la première personne multijoueur en ligne basé sur le jeu d équipe développé par Valve Corporation.	CA001	CO008	2012-08-21	csgo.jpg	https://www.youtube.com/watch?v=edYCtaNueQY	4.0	14.99
J0009	Dota	Dota 2 est un jeu vidéo de type arène de bataille en ligne multijoueur développé et édité par Valve Corporation.	CA006	CO008	2013-07-09	dota.jpg	https://www.youtube.com/watch?v=-cSFPIwMEq4	4.0	0.00
J0010	NBA 2k17	NBA 2K17 est un jeu vidéo de basket-ball dévéloppé par Visual Concepts et édité par 2K Sports.	CA002	CO013	2016-09-20	nba2k17.jpg	https://www.youtube.com/watch?v=cQKDcMxTAfw	4.5	59.99
J0011	Titanfall 2	Titanfall 2 est un jeu vidéo de tir en vue à la première personne développé par Respawn Entertainment et édité par Electronic Arts.	CA001	CO003	2016-10-28	tf2.jpg	https://www.youtube.com/watch?v=EXwdWuSuiYA	4.0	39.99
J0012	Dirt 4	Dirt 4 est un jeu vidéo de course de rallye automobile et il est le quatrième de la série DiRT développé et publié par Codemasters.	CA009	CO011	2017-06-09	dirt4.jpg	https://www.youtube.com/watch?v=uPGxOIXSAG4	4.5	59.99
J0013	Outlast 2	Outlast 2 est un jeu vidéo de survival horror en vue à la première personne développé et édité par Red Barrels.	CA005	CO001	2017-04-25	ol2.jpg	https://www.youtube.com/watch?v=EOrTuPljfPU	4.0	29.99
J0014	Battlefield 1	Battlefield 1 est un jeu vidéo de tir à la première personne développé par DICE.	CA001	CO005	2016-10-21	bf1.jpg	https://www.youtube.com/watch?v=O3zza3ofZ0Q	4.0	23.99
J0015	Mirrors Edge Catalyst	Mirrors Edge Catalyst est un jeu vidéo développé par DICE et édité par Electronic Arts.	CA003	CO005	2016-06-09	mec.jpg	https://www.youtube.com/watch?v=r6GQEtUREWY	3.5	12.99
J0016	Grand Theft Auto V	Grand Theft Auto V est un jeu vidéo d action-aventure édité Rockstar Games	CA004	CO010	2013-09-17	gta5.jpg	https://www.youtube.com/watch?v=QkkoHAzjnUs	4.0	59.99
J0017	Tekken 7	Tekken 7 est un jeu vidéo de combat de la série Tekken développé et édité par Bandai Namco Games.	CA010	CO007	2017-06-02	t7.jpg	https://www.youtube.com/watch?v=uEnz36xOSs4	4.5	49.99
J0018	NieR Automata	Nier: Automata est un jeu vidéo de type action-RPG édité par Square Enix.	CA007	CO006	2017-02-23	na.jpg	https://www.youtube.com/watch?v=VtakOsHZPDE	5.0	59.99
J0019	Final Fantasy XIV	Final Fantasy XIV : A Realm Reborn est un jeu de rôle en ligne massivement multijoueur sur PC développé par Square Enix	CA011	CO006	2013-08-27	ff14.jpg	https://www.youtube.com/watch?v=39j5v8jlndM	4.0	19.99
J0020	Rise of the Tomb Raider	Rise of the Tomb Raider est un jeu vidéo d action-aventure de Square Enix	CA004	CO006	2015-11-13	rottr.jpg	https://www.youtube.com/watch?v=WZhb8ZipUyc	5.0	59.99
\.


--
-- Name: seqachat; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('seqachat', 41, false);


--
-- Name: seqcategorie; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('seqcategorie', 12, false);


--
-- Name: seqcom; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('seqcom', 7, false);


--
-- Name: seqconstructeur; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('seqconstructeur', 14, false);


--
-- Name: seqimage; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('seqimage', 121, false);


--
-- Name: seqjeu; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('seqjeu', 21, false);


--
-- Name: sequtilisateur; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('sequtilisateur', 11, false);


--
-- Data for Name: utilisateur; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY utilisateur (id, username, email, password, admini, banni) FROM stdin;
U0001	Gimmy	gimmy@mail.com	gptitu	t	f
U0002	Pao	paopao@mail.com	gptitu	t	f
U0003	Tiantsoa	tiantsoa@mail.com	gptitu	t	f
U0004	Jean	jean@mail.com	jean007	f	f
U0005	Popey	popey@mail.com	pops20	f	t
U0006	Rakoto	rakoto@mail.com	rkt2	f	f
U0007	Gerrard	gerrard@mail.com	gg	f	t
U0008	Bryan	bryan@mail.com	tekken	f	f
U0009	Dominique	dominique@mail.com	fast	f	f
U0010	Logan	logan@mail.com	xmen	f	f
\.


--
-- Name: achat_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY achat
    ADD CONSTRAINT achat_pkey PRIMARY KEY (id);


--
-- Name: categorie_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY categorie
    ADD CONSTRAINT categorie_pkey PRIMARY KEY (id);


--
-- Name: commentaire_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY commentaire
    ADD CONSTRAINT commentaire_pkey PRIMARY KEY (id);


--
-- Name: constructeur_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY constructeur
    ADD CONSTRAINT constructeur_pkey PRIMARY KEY (id);


--
-- Name: image_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY image
    ADD CONSTRAINT image_pkey PRIMARY KEY (id);


--
-- Name: jeu_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY jeu
    ADD CONSTRAINT jeu_pkey PRIMARY KEY (id);


--
-- Name: utilisateur_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY utilisateur
    ADD CONSTRAINT utilisateur_pkey PRIMARY KEY (id);


--
-- Name: achat_jeu_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY achat
    ADD CONSTRAINT achat_jeu_fkey FOREIGN KEY (jeu) REFERENCES jeu(id);


--
-- Name: achat_utilisateur_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY achat
    ADD CONSTRAINT achat_utilisateur_fkey FOREIGN KEY (utilisateur) REFERENCES utilisateur(id);


--
-- Name: commentaire_jeu_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY commentaire
    ADD CONSTRAINT commentaire_jeu_fkey FOREIGN KEY (jeu) REFERENCES jeu(id);


--
-- Name: commentaire_utilisateur_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY commentaire
    ADD CONSTRAINT commentaire_utilisateur_fkey FOREIGN KEY (utilisateur) REFERENCES utilisateur(id);


--
-- Name: image_jeu_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY image
    ADD CONSTRAINT image_jeu_fkey FOREIGN KEY (jeu) REFERENCES jeu(id);


--
-- Name: jeu_categorie_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY jeu
    ADD CONSTRAINT jeu_categorie_fkey FOREIGN KEY (categorie) REFERENCES categorie(id);


--
-- Name: jeu_constructeur_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY jeu
    ADD CONSTRAINT jeu_constructeur_fkey FOREIGN KEY (constructeur) REFERENCES constructeur(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

