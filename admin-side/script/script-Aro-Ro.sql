CREATE SEQUENCE "public".admin_idadmin_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".categorie_idcategorie_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".client_idclient_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".composition_idcomposant_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".emploie_du_temp_idemploiedutemp_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".employee_idemployee_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".entree_matiere_premiere_identreematiere_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".historiquetravail_idemploye_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".matiere_premiere_idmatierepremiere_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public"."paiement_salaire_idpaiment _seq" START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".poste_idposte_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".produit_idproduit_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".restematierepremiere_idrestematierepremiere_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".restestock_idrestestock_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".salaireposte_idsalaireposte_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".sortie_matiere_premiere_idsortie_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".sortie_produit_idsortieproduit_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".specificite_idspecificite_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".stock_produits_finis_idstockproduitfini_seq START WITH 1 INCREMENT BY 1;

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

CREATE  TABLE "public".emploie_du_temp ( 
	idemploiedutemp      integer DEFAULT nextval('emploie_du_temp_idemploiedutemp_seq'::regclass) NOT NULL  ,
	daterdv              date DEFAULT CURRENT_DATE NOT NULL  ,
	evenement            text  NOT NULL  ,
	faisabilite          integer  NOT NULL  ,
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
	CONSTRAINT pk_matiere_premiere PRIMARY KEY ( idmatierepremiere )
 );

CREATE  TABLE "public".paiement_salaire ( 
	"idpaiment "         integer DEFAULT nextval('"paiement_salaire_idpaiment _seq"'::regclass) NOT NULL  ,
	idemploye            integer  NOT NULL  ,
	datepaiement         date DEFAULT CURRENT_DATE   ,
	CONSTRAINT pk_paiement_salaire PRIMARY KEY ( "idpaiment " )
 );

CREATE  TABLE "public".poste ( 
	idposte              integer DEFAULT nextval('poste_idposte_seq'::regclass) NOT NULL  ,
	nomposte             varchar(50)  NOT NULL  ,
	CONSTRAINT pk_poste PRIMARY KEY ( idposte )
 );

CREATE  TABLE "public".produit ( 
	idproduit            integer DEFAULT nextval('produit_idproduit_seq'::regclass) NOT NULL  ,
	nomproduit           varchar(50)  NOT NULL  ,
	volume_unitaire      double precision  NOT NULL  ,
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
	report               integer  NOT NULL  ,
	remiseproduit        double precision  NOT NULL  ,
	CONSTRAINT pk_restestock PRIMARY KEY ( idrestestock )
 );

CREATE  TABLE "public".salaireposte ( 
	idsalaireposte       integer DEFAULT nextval('salaireposte_idsalaireposte_seq'::regclass) NOT NULL  ,
	idposte              integer  NOT NULL  ,
	prixsalaire          double precision  NOT NULL  ,
	datepaiment          date DEFAULT CURRENT_DATE NOT NULL  ,
	CONSTRAINT pk_salaireposte PRIMARY KEY ( idsalaireposte )
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

CREATE  TABLE "public".client ( 
	idclient             integer DEFAULT nextval('client_idclient_seq'::regclass) NOT NULL  ,
	idspecificite        integer  NOT NULL  ,
	nomclient            varchar(50)  NOT NULL  ,
	datearrivee          date DEFAULT CURRENT_DATE   ,
	CONSTRAINT pk_client PRIMARY KEY ( idclient )
 );

CREATE  TABLE "public".composition ( 
	idcomposant          integer DEFAULT nextval('composition_idcomposant_seq'::regclass) NOT NULL  ,
	idproduit            integer  NOT NULL  ,
	idmatierepremiere    integer  NOT NULL  ,
	quantite             double precision  NOT NULL  ,
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

ALTER TABLE "public".client ADD CONSTRAINT fk_client_specificite FOREIGN KEY ( idspecificite ) REFERENCES "public".specificite( idspecificite );

ALTER TABLE "public".composition ADD CONSTRAINT fk_composition FOREIGN KEY ( idmatierepremiere ) REFERENCES "public".matiere_premiere( idmatierepremiere ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".composition ADD CONSTRAINT fk_composition_produit FOREIGN KEY ( idproduit ) REFERENCES "public".produit( idproduit ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".entree_matiere_premiere ADD CONSTRAINT fk_entree_matiere_premiere FOREIGN KEY ( idmatierepremiere ) REFERENCES "public".matiere_premiere( idmatierepremiere ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".historiquetravail ADD CONSTRAINT fk_historiquetravail_employee FOREIGN KEY ( idemploye ) REFERENCES "public".employee( idemployee ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".paiement_salaire ADD CONSTRAINT fk_paiement_salaire_employee FOREIGN KEY ( idemploye ) REFERENCES "public".employee( idemployee ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".restematierepremiere ADD CONSTRAINT fk_restematierepremiere FOREIGN KEY ( idmatierepremiere ) REFERENCES "public".matiere_premiere( idmatierepremiere ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".restestock ADD CONSTRAINT fk_restestock_produit FOREIGN KEY ( idproduit ) REFERENCES "public".produit( idproduit ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".salaireposte ADD CONSTRAINT fk_salaireposte_poste FOREIGN KEY ( idposte ) REFERENCES "public".poste( idposte ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".sortie_matiere_premiere ADD CONSTRAINT fk_sortie_matiere_premiere FOREIGN KEY ( idmatierepremiere ) REFERENCES "public".matiere_premiere( idmatierepremiere ) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE "public".sortie_produit ADD CONSTRAINT fk_sortie_produit_produit FOREIGN KEY ( idproduit ) REFERENCES "public".produit( idproduit );

ALTER TABLE "public".stock_produits_finis ADD CONSTRAINT fk_stock_produits_finis FOREIGN KEY ( idproduit ) REFERENCES "public".produit( idproduit ) ON DELETE CASCADE ON UPDATE CASCADE;
