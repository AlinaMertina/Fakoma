CREATE SEQUENCE "public".admin_idadmin_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".categorie_idcategorie_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".client_idclient_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".codejournal_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".composition_idcomposant_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".compte_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".emploie_du_temp_idemploiedutemp_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".employee_idemployee_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".entree_matiere_premiere_identreematiere_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".facture_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".historiquetravail_idemploye_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".journal_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".matiere_premiere_idmatierepremiere_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public"."paiement_salaire_idpaiment _seq" START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".poste_idposte_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".prix_produit_idprixproduit_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".produit_idproduit_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".restematierepremiere_idrestematierepremiere_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".restestock_idrestestock_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".salaireposte_idsalaireposte_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".sortie_matiere_premiere_idsortie_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".sortie_produit_idsortieproduit_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".specificite_idspecificite_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".stock_produits_finis_idstockproduitfini_seq START WITH 1 INCREMENT BY 1;

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

CREATE  TABLE "public".produit ( 
	idproduit            integer DEFAULT nextval('produit_idproduit_seq'::regclass) NOT NULL  ,
	nomproduit           varchar(50)  NOT NULL  ,
	descriptionProduit	 varchar(125)  NOT NULL,
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
	etatcommande         integer  NOT NULL  ,
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

CREATE  TABLE "public".prix_produit ( 
	idprixproduit        integer DEFAULT nextval('prix_produit_idprixproduit_seq'::regclass) NOT NULL  ,
	idproduit            integer  NOT NULL  ,
	date_                date DEFAULT CURRENT_DATE NOT NULL  ,
	prix                 double precision  NOT NULL  ,
	CONSTRAINT pk_prix_produit PRIMARY KEY ( idprixproduit )
 );

ALTER TABLE "public".client ADD CONSTRAINT fk_client_specificite FOREIGN KEY ( idspecificite ) REFERENCES "public".specificite( idspecificite );

ALTER TABLE "public".composition ADD CONSTRAINT fk_composition FOREIGN KEY ( idmatierepremiere ) REFERENCES "public".matiere_premiere( idmatierepremiere ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".composition ADD CONSTRAINT fk_composition_produit FOREIGN KEY ( idproduit ) REFERENCES "public".produit( idproduit ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".entree_matiere_premiere ADD CONSTRAINT fk_entree_matiere_premiere FOREIGN KEY ( idmatierepremiere ) REFERENCES "public".matiere_premiere( idmatierepremiere ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".facture ADD CONSTRAINT facture_idclient_fkey FOREIGN KEY ( idclient ) REFERENCES "public".client( idclient );

ALTER TABLE "public".historiquetravail ADD CONSTRAINT fk_historiquetravail_employee FOREIGN KEY ( idemploye ) REFERENCES "public".employee( idemployee ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".journal ADD CONSTRAINT journal_idcodejournal_fkey FOREIGN KEY ( idcodejournal ) REFERENCES "public".codejournal( id );

ALTER TABLE "public".journal ADD CONSTRAINT journal_idcompte_fkey FOREIGN KEY ( idcompte ) REFERENCES "public".compte( id );

ALTER TABLE "public".journal ADD CONSTRAINT journal_idunite_fkey FOREIGN KEY ( idunite ) REFERENCES "public".unite( id );

ALTER TABLE "public".matiere_premiere ADD CONSTRAINT fk_matiere_premiere_compte FOREIGN KEY ( idcompte ) REFERENCES "public".compte( id ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".paiement_salaire ADD CONSTRAINT fk_paiement_salaire_employee FOREIGN KEY ( idemploye ) REFERENCES "public".employee( idemployee ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".prix_produit ADD CONSTRAINT fk_prix_produit_produit FOREIGN KEY ( idproduit ) REFERENCES "public".produit( idproduit ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".produit ADD CONSTRAINT fk_produit_compte FOREIGN KEY ( idcompte ) REFERENCES "public".compte( id ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".restematierepremiere ADD CONSTRAINT fk_restematierepremiere FOREIGN KEY ( idmatierepremiere ) REFERENCES "public".matiere_premiere( idmatierepremiere ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".restestock ADD CONSTRAINT fk_restestock_produit FOREIGN KEY ( idproduit ) REFERENCES "public".produit( idproduit ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".sortie_matiere_premiere ADD CONSTRAINT fk_sortie_matiere_premiere FOREIGN KEY ( idmatierepremiere ) REFERENCES "public".matiere_premiere( idmatierepremiere ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".sortie_produit ADD CONSTRAINT fk_sortie_produit_produit FOREIGN KEY ( idproduit ) REFERENCES "public".produit( idproduit );

ALTER TABLE "public".stock_produits_finis ADD CONSTRAINT fk_stock_produits_finis FOREIGN KEY ( idproduit ) REFERENCES "public".produit( idproduit ) ON DELETE CASCADE ON UPDATE CASCADE;

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


-- donnes
INSERT INTO "public".compte (id, numero, intitule)
VALUES 
    (1, '001', 'Compte 1'),
    (2, '002', 'Compte 2');


INSERT INTO "public".produit (idproduit, nomproduit, descriptionProduit, volume_unitaire, date_, unite, idcompte)
VALUES 
    (1, 'Bétons écologiques', 'Conçus en utilisant des matériaux recyclés,des granulats recyclés provenant de débris de construction.',12.3, '2023-06-29', 'Nombre', 1),
    (2, 'Charbon biologique ', 'Fabriqué à partir de matières organiques non fossiles,des résidus de bois, des coquilles de noix de coco. ',10.5, '2023-06-29', 'sachet', 1),
    (3, 'Engrais bio', 'Formulés à partir de sources naturelles:des déchets végétaux, des composts et des matières organiques décomposées', 15.7, '2023-06-29', 'Kilo', 2);

INSERT INTO "public".prix_produit (idprixproduit, idproduit, date_, prix)
VALUES 
    (1, 1, '2023-06-29', 2500),
    (2, 2, '2023-06-28', 3000),
    (3, 3, '2023-06-29', 1500);

-- View 
create View prixetproduit as
select p.idproduit,p.nomproduit,p.descriptionproduit,pp.prix from produit p join prix_produit pp on p.idproduit = pp.idproduit;  
