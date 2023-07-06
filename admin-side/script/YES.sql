CREATE SEQUENCE "public".absence_idabsence_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".admin_idadmin_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".avertisement_employer_idavertisment_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".categorie_idcategorie_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".centre_departement_iddepartement_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".client_idclient_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".codejournal_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".composition_idcomposant_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".compte_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".emp START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".emploie_du_temp_idemploiedutemp_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".employe_du_temps_idtemps_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".employee_idemployee_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".employer_emplois_dutemps_idemplois_post_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".employer_idemployer_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".entree_matiere_premiere_identreematiere_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".facture_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".historiquetravail_idemploye_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".journal_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".matiere_premiere_idmatierepremiere_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public"."paiement_salaire_idpaiment _seq" START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".post_emplois_dutemps_idemplois_post_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".poste_idposte_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".poste_idposte_seq1 START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".prix_produit_idprixproduit_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".produit_idproduit_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".restematierepremiere_idrestematierepremiere_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".restestock_idrestestock_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".salaire_employer_idsalaire_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".salaireposte_idsalaireposte_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".semaine_idsemaine_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".sortie_matiere_premiere_idsortie_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".sortie_produit_idsortieproduit_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".specificite_idspecificite_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".stock_produits_finis_idstockproduitfini_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".tachespecifique_emp_idtache_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".unite_id_seq START WITH 1 INCREMENT BY 1;

CREATE  TABLE "public"."admin" ( 
	idadmin              integer DEFAULT nextval('admin_idadmin_seq'::regclass) NOT NULL  ,
	nom                  varchar(50)  NOT NULL  ,
	motdepasse           varchar(10)  NOT NULL  ,
	dtn                  date  NOT NULL  ,
	contact              varchar(50)  NOT NULL  ,
	description          text  NOT NULL  ,
	CONSTRAINT pk_tbl PRIMARY KEY ( idadmin )
 );

CREATE  TABLE "public".categorie ( 
	idcategorie          integer DEFAULT nextval('categorie_idcategorie_seq'::regclass) NOT NULL  ,
	salaire              double precision  NOT NULL  ,
	intitule             varchar  NOT NULL  ,
	CONSTRAINT pk_categorie PRIMARY KEY ( idcategorie )
 );

CREATE  TABLE "public".centre_departement ( 
	iddepartement        integer DEFAULT nextval('centre_departement_iddepartement_seq'::regclass) NOT NULL  ,
	nom_centre           varchar(50)    ,
	CONSTRAINT centre_departement_pkey PRIMARY KEY ( iddepartement )
 );

CREATE  TABLE "public".codejournal ( 
	id                   integer DEFAULT nextval('codejournal_id_seq'::regclass) NOT NULL  ,
	code                 varchar(2)    ,
	intitule             varchar(20)    ,
	CONSTRAINT codejournal_pkey PRIMARY KEY ( id )
 );

CREATE  TABLE "public".compte ( 
	id                   integer DEFAULT nextval('compte_id_seq'::regclass) NOT NULL  ,
	numero               varchar(5)    ,
	intitule             varchar(100)    ,
	CONSTRAINT compte_pkey PRIMARY KEY ( id )
 );

CREATE  TABLE "public".emploie_du_temp ( 
	idemploiedutemp      integer DEFAULT nextval('emploie_du_temp_idemploiedutemp_seq'::regclass) NOT NULL  ,
	daterdv              varchar(50)  NOT NULL  ,
	evenement            text  NOT NULL  ,
	faisabilite          varchar(15)  NOT NULL  ,
	CONSTRAINT pk_emploie_du_temp PRIMARY KEY ( idemploiedutemp )
 );

CREATE  TABLE "public".employee ( 
	idemployee           integer DEFAULT nextval('employee_idemployee_seq'::regclass) NOT NULL  ,
	idposte              integer    ,
	nomemploye           varchar(50)  NOT NULL  ,
	"dtn "               date  NOT NULL  ,
	contact              varchar(50)  NOT NULL  ,
	CONSTRAINT pk_employee PRIMARY KEY ( idemployee )
 );

CREATE  TABLE "public".historiquetravail ( 
	idemploye            integer DEFAULT nextval('historiquetravail_idemploye_seq'::regclass) NOT NULL  ,
	datedebut            date  NOT NULL  ,
	datefin              date  NOT NULL  ,
	raison               text  NOT NULL  
 );

CREATE  TABLE "public".matiere_premiere ( 
	idmatierepremiere    integer DEFAULT nextval('matiere_premiere_idmatierepremiere_seq'::regclass) NOT NULL  ,
	nommatierepremiere   varchar(50)  NOT NULL  ,
	unite                varchar(10)  NOT NULL  ,
	date_                date DEFAULT CURRENT_DATE NOT NULL  ,
	idcompte             integer  NOT NULL  ,
	CONSTRAINT pk_matiere_premiere PRIMARY KEY ( idmatierepremiere )
 );

CREATE  TABLE "public".paiement_salaire ( 
	"idpaiment "         integer DEFAULT nextval('"paiement_salaire_idpaiment _seq"'::regclass) NOT NULL  ,
	idemploye            integer  NOT NULL  ,
	datepaiement         date DEFAULT CURRENT_DATE   ,
	CONSTRAINT pk_paiement_salaire PRIMARY KEY ( "idpaiment " )
 );

CREATE  TABLE "public".poste ( 
	idposte              integer DEFAULT nextval('poste_idposte_seq1'::regclass) NOT NULL  ,
	nomposte             varchar(50)    ,
	CONSTRAINT poste_pkey PRIMARY KEY ( idposte )
 );

CREATE  TABLE "public".produit ( 
	idproduit            integer DEFAULT nextval('produit_idproduit_seq'::regclass) NOT NULL  ,
	nomproduit           varchar(50)  NOT NULL  ,
	volume_unitaire      double precision  NOT NULL  ,
	date_                date DEFAULT CURRENT_DATE NOT NULL  ,
	unite                varchar(10)  NOT NULL  ,
	idcompte             integer  NOT NULL  ,
	CONSTRAINT pk_produit PRIMARY KEY ( idproduit )
 );

CREATE  TABLE "public".restematierepremiere ( 
	idrestematierepremiere integer DEFAULT nextval('restematierepremiere_idrestematierepremiere_seq'::regclass) NOT NULL  ,
	idmatierepremiere    integer  NOT NULL  ,
	datereste            date  NOT NULL  ,
	quantitematierepremiere double precision  NOT NULL  ,
	pumatierepremiere    double precision  NOT NULL  ,
	report               integer  NOT NULL  ,
	CONSTRAINT pk_restematierepremiere PRIMARY KEY ( idrestematierepremiere )
 );

CREATE  TABLE "public".restestock ( 
	idrestestock         integer DEFAULT nextval('restestock_idrestestock_seq'::regclass) NOT NULL  ,
	idproduit            integer  NOT NULL  ,
	datereste            date  NOT NULL  ,
	quantitereste        double precision  NOT NULL  ,
	report               integer    ,
	remiseproduit        double precision  NOT NULL  ,
	CONSTRAINT pk_restestock PRIMARY KEY ( idrestestock )
 );

CREATE  TABLE "public".semaine ( 
	idsemaine            integer DEFAULT nextval('semaine_idsemaine_seq'::regclass) NOT NULL  ,
	nom_semain           varchar(50)    ,
	CONSTRAINT semaine_pkey PRIMARY KEY ( idsemaine )
 );

CREATE  TABLE "public".sortie_matiere_premiere ( 
	idsortie             integer DEFAULT nextval('sortie_matiere_premiere_idsortie_seq'::regclass) NOT NULL  ,
	idmatierepremiere    integer  NOT NULL  ,
	datesortiematierepremiere date DEFAULT CURRENT_DATE NOT NULL  ,
	quantitematierepremiere double precision  NOT NULL  ,
	pumatierepremiere    double precision  NOT NULL  ,
	CONSTRAINT pk_sortie_matiere_premiere PRIMARY KEY ( idsortie )
 );

CREATE  TABLE "public".sortie_produit ( 
	idsortieproduit      integer DEFAULT nextval('sortie_produit_idsortieproduit_seq'::regclass) NOT NULL  ,
	idproduit            integer  NOT NULL  ,
	idclient             integer  NOT NULL  ,
	datesortieproduit    date DEFAULT CURRENT_DATE NOT NULL  ,
	quantiteproduit      double precision  NOT NULL  ,
	etatcommande         integer    ,
	CONSTRAINT pk_sortie_produit PRIMARY KEY ( idsortieproduit )
 );

CREATE  TABLE "public".specificite ( 
	idspecificite        integer DEFAULT nextval('specificite_idspecificite_seq'::regclass) NOT NULL  ,
	nom                  varchar(50)    ,
	remise               double precision  NOT NULL  ,
	CONSTRAINT pk_specificite PRIMARY KEY ( idspecificite )
 );

CREATE  TABLE "public".stock_produits_finis ( 
	idstockproduitfini   integer DEFAULT nextval('stock_produits_finis_idstockproduitfini_seq'::regclass) NOT NULL  ,
	idproduit            integer  NOT NULL  ,
	dateentreestock      date DEFAULT CURRENT_DATE NOT NULL  ,
	quantite             double precision  NOT NULL  ,
	puenstock            double precision  NOT NULL  ,
	CONSTRAINT pk_stock_produits_finis PRIMARY KEY ( idstockproduitfini )
 );

CREATE  TABLE "public".unite ( 
	id                   integer DEFAULT nextval('unite_id_seq'::regclass) NOT NULL  ,
	unite                varchar(10)    ,
	CONSTRAINT unite_pkey PRIMARY KEY ( id )
 );

CREATE  TABLE "public".client ( 
	idclient             integer DEFAULT nextval('client_idclient_seq'::regclass) NOT NULL  ,
	idspecificite        integer    ,
	nomclient            varchar(50)  NOT NULL  ,
	datearrivee          date DEFAULT CURRENT_DATE   ,
	adresse              varchar(50)    ,
	mail                 varchar(60)    ,
	tel                  varchar(14)    ,
	CONSTRAINT pk_client PRIMARY KEY ( idclient )
 );

CREATE  TABLE "public".composition ( 
	idcomposant          integer DEFAULT nextval('composition_idcomposant_seq'::regclass) NOT NULL  ,
	idproduit            integer  NOT NULL  ,
	idmatierepremiere    integer  NOT NULL  ,
	quantite             double precision  NOT NULL  ,
	date_                date DEFAULT CURRENT_DATE NOT NULL  ,
	CONSTRAINT pk_composition PRIMARY KEY ( idcomposant )
 );

CREATE  TABLE "public".employer ( 
	idemployer           integer DEFAULT nextval('employer_idemployer_seq'::regclass) NOT NULL  ,
	nom_employer         varchar(70)    ,
	prenom_employer      varchar(70)    ,
	idposte              integer    ,
	date_entrer          date    ,
	contact              varchar(20)    ,
	dtn                  date    ,
	identifiant          varchar(8)    ,
	CONSTRAINT employer_pkey PRIMARY KEY ( idemployer ),
	CONSTRAINT employer_identifiant_key UNIQUE ( identifiant ) 
 );

CREATE  TABLE "public".employer_emplois_dutemps ( 
	idemplois_post       integer DEFAULT nextval('employer_emplois_dutemps_idemplois_post_seq'::regclass) NOT NULL  ,
	idsemaine            integer    ,
	identifiant          varchar(8)    ,
	t_debut              time    ,
	t_fin                time    ,
	p_debut              time    ,
	p_fin                time    ,
	date_insertion       date    ,
	date_modif           date    ,
	CONSTRAINT employer_emplois_dutemps_pkey PRIMARY KEY ( idemplois_post )
 );

CREATE  TABLE "public".entree_matiere_premiere ( 
	identreematiere      integer DEFAULT nextval('entree_matiere_premiere_identreematiere_seq'::regclass) NOT NULL  ,
	idmatierepremiere    integer  NOT NULL  ,
	pumatierepremiere    double precision  NOT NULL  ,
	dateentreematierepremiere date DEFAULT CURRENT_DATE NOT NULL  ,
	quantitematierepremiere double precision  NOT NULL  ,
	CONSTRAINT pk_entree_matiere_premiere PRIMARY KEY ( identreematiere )
 );

CREATE  TABLE "public".facture ( 
	id                   integer DEFAULT nextval('facture_id_seq'::regclass) NOT NULL  ,
	idclient             integer    ,
	nomresp              varchar(40)    ,
	dat                  date    ,
	numero               varchar(20)    ,
	objet                varchar(50)    ,
	"ref"                varchar(50)    ,
	ht                   numeric    ,
	tva                  numeric DEFAULT 20 NOT NULL  ,
	ttc                  numeric    ,
	avance               numeric    ,
	net                  numeric    ,
	CONSTRAINT facture_pkey PRIMARY KEY ( id )
 );

CREATE  TABLE "public".journal ( 
	id                   integer DEFAULT nextval('journal_id_seq'::regclass) NOT NULL  ,
	idcodejournal        integer    ,
	dat                  date    ,
	piece                varchar(100)    ,
	idcompte             integer    ,
	libelle              varchar(100)    ,
	quantite             numeric    ,
	idunite              integer    ,
	prixunitaire         numeric    ,
	debit                numeric    ,
	credit               numeric    ,
	CONSTRAINT journal_pkey PRIMARY KEY ( id )
 );

CREATE  TABLE "public".post_emplois_dutemps ( 
	idemplois_post       integer DEFAULT nextval('post_emplois_dutemps_idemplois_post_seq'::regclass) NOT NULL  ,
	idsemaine            integer    ,
	idposte              integer    ,
	t_debut              time    ,
	t_fin                time    ,
	p_debut              time    ,
	p_fin                time    ,
	date_insertion       date    ,
	CONSTRAINT post_emplois_dutemps_pkey PRIMARY KEY ( idemplois_post )
 );

CREATE  TABLE "public".prix_produit ( 
	idprixproduit        integer DEFAULT nextval('prix_produit_idprixproduit_seq'::regclass) NOT NULL  ,
	idproduit            integer  NOT NULL  ,
	date_                date DEFAULT CURRENT_DATE NOT NULL  ,
	prix                 double precision  NOT NULL  ,
	CONSTRAINT pk_prix_produit PRIMARY KEY ( idprixproduit )
 );

CREATE  TABLE "public".salaire_employer ( 
	idsalaire            integer DEFAULT nextval('salaire_employer_idsalaire_seq'::regclass) NOT NULL  ,
	identifiant          varchar(8)    ,
	montant              double precision    ,
	datedebut            date    ,
	datefin              date    ,
	CONSTRAINT salaire_employer_pkey PRIMARY KEY ( idsalaire )
 );

CREATE  TABLE "public".tachespecifique_emp ( 
	idtache              integer DEFAULT nextval('tachespecifique_emp_idtache_seq'::regclass) NOT NULL  ,
	identifiant          varchar(8)    ,
	description          text    ,
	"date"               timestamp    ,
	CONSTRAINT tachespecifique_emp_pkey PRIMARY KEY ( idtache )
 );

CREATE  TABLE "public".absence ( 
	idabsence            integer DEFAULT nextval('absence_idabsence_seq'::regclass) NOT NULL  ,
	identifiant          varchar(8)    ,
	dateabsence          date    ,
	CONSTRAINT absence_pkey PRIMARY KEY ( idabsence )
 );

CREATE  TABLE "public".avertisement_employer ( 
	idavertisment        integer DEFAULT nextval('avertisement_employer_idavertisment_seq'::regclass) NOT NULL  ,
	description          varchar(200)    ,
	identifiant          varchar(8)    ,
	dateavertisement     date    ,
	CONSTRAINT avertisement_employer_pkey PRIMARY KEY ( idavertisment )
 );

CREATE  TABLE "public".employe_du_temps ( 
	idtemps              integer DEFAULT nextval('employe_du_temps_idtemps_seq'::regclass) NOT NULL  ,
	idemployer           integer    ,
	iddepartement        integer    ,
	lundie               integer    ,
	mardie               integer    ,
	mercredie            integer    ,
	jeudie               integer    ,
	vendredi             integer    ,
	samedi               integer    ,
	dimance              integer    ,
	datedebut            date    ,
	datefin              date    ,
	CONSTRAINT employe_du_temps_pkey PRIMARY KEY ( idtemps )
 );

ALTER TABLE "public".absence ADD CONSTRAINT absence_identifiant_fkey FOREIGN KEY ( identifiant ) REFERENCES "public".employer( identifiant );

ALTER TABLE "public".avertisement_employer ADD CONSTRAINT avertisement_employer_identifiant_fkey FOREIGN KEY ( identifiant ) REFERENCES "public".employer( identifiant );

ALTER TABLE "public".client ADD CONSTRAINT fk_client_specificite FOREIGN KEY ( idspecificite ) REFERENCES "public".specificite( idspecificite );

ALTER TABLE "public".composition ADD CONSTRAINT fk_composition FOREIGN KEY ( idmatierepremiere ) REFERENCES "public".matiere_premiere( idmatierepremiere ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".composition ADD CONSTRAINT fk_composition_produit FOREIGN KEY ( idproduit ) REFERENCES "public".produit( idproduit ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".employe_du_temps ADD CONSTRAINT employe_du_temps_iddepartement_fkey FOREIGN KEY ( iddepartement ) REFERENCES "public".centre_departement( iddepartement );

ALTER TABLE "public".employe_du_temps ADD CONSTRAINT employe_du_temps_idemployer_fkey FOREIGN KEY ( idemployer ) REFERENCES "public".employer( idemployer );

ALTER TABLE "public".employer ADD CONSTRAINT employer_idposte_fkey FOREIGN KEY ( idposte ) REFERENCES "public".poste( idposte );

ALTER TABLE "public".employer_emplois_dutemps ADD CONSTRAINT employer_emplois_dutemps_identifiant_fkey FOREIGN KEY ( identifiant ) REFERENCES "public".employer( identifiant );

ALTER TABLE "public".employer_emplois_dutemps ADD CONSTRAINT employer_emplois_dutemps_idsemaine_fkey FOREIGN KEY ( idsemaine ) REFERENCES "public".semaine( idsemaine );

ALTER TABLE "public".entree_matiere_premiere ADD CONSTRAINT fk_entree_matiere_premiere FOREIGN KEY ( idmatierepremiere ) REFERENCES "public".matiere_premiere( idmatierepremiere ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".facture ADD CONSTRAINT facture_idclient_fkey FOREIGN KEY ( idclient ) REFERENCES "public".client( idclient );

ALTER TABLE "public".historiquetravail ADD CONSTRAINT fk_historiquetravail_employee FOREIGN KEY ( idemploye ) REFERENCES "public".employee( idemployee ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".journal ADD CONSTRAINT journal_idcodejournal_fkey FOREIGN KEY ( idcodejournal ) REFERENCES "public".codejournal( id );

ALTER TABLE "public".journal ADD CONSTRAINT journal_idcompte_fkey FOREIGN KEY ( idcompte ) REFERENCES "public".compte( id );

ALTER TABLE "public".journal ADD CONSTRAINT journal_idunite_fkey FOREIGN KEY ( idunite ) REFERENCES "public".unite( id );

ALTER TABLE "public".matiere_premiere ADD CONSTRAINT fk_matiere_premiere_compte FOREIGN KEY ( idcompte ) REFERENCES "public".compte( id ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".paiement_salaire ADD CONSTRAINT fk_paiement_salaire_employee FOREIGN KEY ( idemploye ) REFERENCES "public".employee( idemployee ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".post_emplois_dutemps ADD CONSTRAINT post_emplois_dutemps_idposte_fkey FOREIGN KEY ( idposte ) REFERENCES "public".poste( idposte ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".post_emplois_dutemps ADD CONSTRAINT post_emplois_dutemps_idsemaine_fkey FOREIGN KEY ( idsemaine ) REFERENCES "public".semaine( idsemaine );

ALTER TABLE "public".prix_produit ADD CONSTRAINT fk_prix_produit_produit FOREIGN KEY ( idproduit ) REFERENCES "public".produit( idproduit ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".produit ADD CONSTRAINT fk_produit_compte FOREIGN KEY ( idcompte ) REFERENCES "public".compte( id ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".restematierepremiere ADD CONSTRAINT fk_restematierepremiere FOREIGN KEY ( idmatierepremiere ) REFERENCES "public".matiere_premiere( idmatierepremiere ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".restestock ADD CONSTRAINT fk_restestock_produit FOREIGN KEY ( idproduit ) REFERENCES "public".produit( idproduit ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".salaire_employer ADD CONSTRAINT salaire_employer_identifiant_fkey FOREIGN KEY ( identifiant ) REFERENCES "public".employer( identifiant ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".sortie_matiere_premiere ADD CONSTRAINT fk_sortie_matiere_premiere FOREIGN KEY ( idmatierepremiere ) REFERENCES "public".matiere_premiere( idmatierepremiere ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".sortie_produit ADD CONSTRAINT fk_sortie_produit_produit FOREIGN KEY ( idproduit ) REFERENCES "public".produit( idproduit );

ALTER TABLE "public".stock_produits_finis ADD CONSTRAINT fk_stock_produits_finis FOREIGN KEY ( idproduit ) REFERENCES "public".produit( idproduit ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".tachespecifique_emp ADD CONSTRAINT tachespecifique_emp_identifiant_fkey FOREIGN KEY ( identifiant ) REFERENCES "public".employer( identifiant );

CREATE VIEW "public".v_journal AS  SELECT journal.id AS idjournal,
    journal.idcodejournal,
    codejournal.code AS codejournal,
    codejournal.intitule AS intitulecodejournal,
    journal.dat,
    journal.piece,
    journal.idcompte,
    compte.numero,
    compte.intitule AS intitulecompte,
    journal.libelle,
    journal.quantite,
    journal.idunite,
    unite.unite,
    journal.prixunitaire,
    journal.debit,
    journal.credit
   FROM (((journal
     JOIN codejournal ON ((codejournal.id = journal.idcodejournal)))
     JOIN compte ON ((compte.id = journal.idcompte)))
     JOIN unite ON ((unite.id = journal.idunite)));

CREATE VIEW "public".entry AS  SELECT xt.idproduit,
    xt.nomproduit,
    spf.dateentreestock,
    spf.quantite,
    spf.puenstock
   FROM (stock_produits_finis spf
     JOIN produit xt ON ((spf.idproduit = xt.idproduit)));

CREATE VIEW "public".exit AS  SELECT xt.idproduit,
    xt.nomproduit,
    sp.datesortieproduit,
    sp.quantiteproduit,
    sp.idclient,
    cl.nomclient,
    sp.etatcommande
   FROM ((sortie_produit sp
     JOIN produit xt ON ((sp.idproduit = xt.idproduit)))
     JOIN client cl ON ((sp.idclient = cl.idclient)));

CREATE VIEW "public".inventory AS  SELECT p.idproduit,
    p.nomproduit,
    COALESCE(spf.quantite, (0)::double precision) AS stock_initial,
    COALESCE(rs.quantitereste, (0)::double precision) AS stock_restant,
    rs.datereste
   FROM ((produit p
     LEFT JOIN ( SELECT stock_produits_finis.idproduit,
            sum(stock_produits_finis.quantite) AS quantite
           FROM stock_produits_finis
          GROUP BY stock_produits_finis.idproduit) spf ON ((p.idproduit = spf.idproduit)))
     LEFT JOIN ( SELECT restestock.idproduit,
            sum(restestock.quantitereste) AS quantitereste,
            max(restestock.datereste) AS datereste
           FROM restestock
          GROUP BY restestock.idproduit) rs ON ((p.idproduit = rs.idproduit)));

CREATE VIEW "public".v_balance AS  SELECT v_journal.numero,
    v_journal.intitulecompte,
    sum(v_journal.debit) AS debit,
    sum(v_journal.credit) AS credit,
    (sum(v_journal.debit) - sum(v_journal.credit)) AS solde
   FROM v_journal
  GROUP BY v_journal.numero, v_journal.intitulecompte;

CREATE VIEW "public".v_charge AS  SELECT v_journal.numero,
    v_journal.intitulecodejournal,
    sum(v_journal.debit) AS debit
   FROM v_journal
  WHERE ((v_journal.numero)::text ~~ '6%'::text)
  GROUP BY v_journal.numero, v_journal.intitulecodejournal;

CREATE VIEW "public".v_charge_total AS  SELECT sum(v_charge.debit) AS debit
   FROM v_charge;

CREATE VIEW "public".v_detailes_base_employee AS  SELECT poste.idposte,
    employer.idemployer,
    employer.nom_employer,
    employer.prenom_employer,
    poste.nomposte,
    employer.date_entrer,
    employer.contact,
    salaire_employer.montant,
    employer.identifiant,
    employer.dtn
   FROM ((employer
     JOIN salaire_employer ON (((employer.identifiant)::text = (salaire_employer.identifiant)::text)))
     JOIN poste ON ((poste.idposte = employer.idposte)))
  WHERE (salaire_employer.datefin IS NULL);

CREATE VIEW "public".v_detailleemp AS  SELECT poste.idposte,
    poste.nomposte,
    employer.nom_employer,
    employer.prenom_employer,
    employer.idemployer,
    employer.identifiant,
    employer.date_entrer,
    employer.dtn,
    avertisement_employer.description,
    avertisement_employer.dateavertisement,
    employer.contact
   FROM ((employer
     LEFT JOIN avertisement_employer ON (((avertisement_employer.identifiant)::text = (employer.identifiant)::text)))
     JOIN poste ON ((employer.idposte = poste.idposte)));

CREATE VIEW "public".v_emplois_du_temps_employer AS  SELECT employer.identifiant,
    employer_emplois_dutemps.idemplois_post,
    employer.nom_employer,
    semaine.nom_semain,
    employer.prenom_employer,
    employer.idemployer,
    semaine.idsemaine,
    employer_emplois_dutemps.t_debut,
    employer_emplois_dutemps.t_fin,
    employer_emplois_dutemps.p_debut,
    employer_emplois_dutemps.p_fin,
    employer_emplois_dutemps.date_insertion,
    employer_emplois_dutemps.date_modif
   FROM ((employer_emplois_dutemps
     JOIN semaine ON ((employer_emplois_dutemps.idsemaine = semaine.idsemaine)))
     JOIN employer ON (((employer_emplois_dutemps.identifiant)::text = (employer.identifiant)::text)));

CREATE VIEW "public".v_emplois_du_temps_poste AS  SELECT post_emplois_dutemps.idemplois_post,
    semaine.nom_semain,
    poste.nomposte,
    poste.idposte,
    semaine.idsemaine,
    post_emplois_dutemps.t_debut,
    post_emplois_dutemps.t_fin,
    post_emplois_dutemps.p_debut,
    post_emplois_dutemps.p_fin,
    post_emplois_dutemps.date_insertion
   FROM ((post_emplois_dutemps
     JOIN semaine ON ((post_emplois_dutemps.idsemaine = semaine.idsemaine)))
     JOIN poste ON ((post_emplois_dutemps.idposte = poste.idposte)));

CREATE VIEW "public".v_facture AS  SELECT facture.id,
    facture.idclient,
    client.nomclient,
    client.adresse,
    client.mail,
    client.tel,
    facture.nomresp,
    facture.dat,
    facture.numero,
    facture.objet,
    facture.ref,
    facture.ht,
    facture.tva,
    facture.ttc,
    facture.avance,
    facture.net
   FROM (facture
     JOIN client ON ((client.idclient = facture.idclient)));

CREATE VIEW "public".v_grand_livre_compte AS  SELECT v_journal.idcompte,
    v_journal.numero,
    v_journal.intitulecompte,
    v_journal.codejournal,
    v_journal.dat,
    v_journal.piece,
    v_journal.libelle,
    v_journal.debit,
    v_journal.credit
   FROM v_journal;

CREATE VIEW "public".v_grand_livre_compte_solde AS  SELECT v_grand_livre_compte.idcompte,
    v_grand_livre_compte.numero,
    v_grand_livre_compte.intitulecompte,
    sum(v_grand_livre_compte.debit) AS debit,
    sum(v_grand_livre_compte.credit) AS credit,
    (sum(v_grand_livre_compte.debit) - sum(v_grand_livre_compte.credit)) AS solde
   FROM v_grand_livre_compte
  GROUP BY v_grand_livre_compte.idcompte, v_grand_livre_compte.numero, v_grand_livre_compte.intitulecompte;

CREATE VIEW "public".v_produit AS  SELECT v_journal.numero,
    v_journal.intitulecodejournal,
    sum(v_journal.credit) AS credit
   FROM v_journal
  WHERE ((v_journal.numero)::text ~~ '7%'::text)
  GROUP BY v_journal.numero, v_journal.intitulecodejournal;

CREATE VIEW "public".v_produit_total AS  SELECT sum(v_produit.credit) AS credit
   FROM v_produit;

CREATE VIEW "public".v_total_balance AS  SELECT sum(v_balance.debit) AS debit,
    sum(v_balance.credit) AS credit
   FROM v_balance;
