CREATE  TABLE "public"."admin" ( 
	idadmin              varchar(10)  NOT NULL  ,
	nom                  varchar(50)  NOT NULL  ,
	motdepasse           varchar(10)  NOT NULL  ,
	dtn                  date  NOT NULL  ,
	contact              varchar(50)  NOT NULL  ,
	description          text  NOT NULL  ,
	CONSTRAINT pk_tbl PRIMARY KEY ( idadmin )
 );

 CREATE  TABLE "public".categorie ( 
	idcategorie          varchar  NOT NULL  ,
	salaire              double precision  NOT NULL  ,
	intitule             varchar  NOT NULL  ,
	CONSTRAINT pk_categorie PRIMARY KEY ( idcategorie )
 );

CREATE  TABLE "public".client ( 
	idclient             varchar(10)  NOT NULL  ,
	nomclient            varchar(50)  NOT NULL  ,
	datearrivee          date DEFAULT CURRENT_DATE   ,
	specificite          varchar(10)  NOT NULL  ,
	CONSTRAINT pk_client PRIMARY KEY ( idclient )
 );

ALTER TABLE "public".client ADD CONSTRAINT fk_client_specificite FOREIGN KEY ( specificite ) REFERENCES "public".specificite( idspecificite );

CREATE  TABLE "public".composition ( 
	idcomposant          varchar(10)  NOT NULL  ,
	quantitematiere      double precision  NOT NULL  ,
	matierepremiere      varchar(10)  NOT NULL  ,
	CONSTRAINT pk_composition PRIMARY KEY ( idcomposant )
 );

ALTER TABLE "public".composition ADD CONSTRAINT fk_composition_composition FOREIGN KEY ( matierepremiere ) REFERENCES "public".matiere_premiere( idmatierepremiere );

CREATE  TABLE "public".emploie_du_temp ( 
	idemploiedutemp     serial NOT NULL  ,
	daterdv              varchar(50) ,
	evenement            text  NOT NULL  ,
	faisabilite          varchar(15) NOT NULL ,
	CONSTRAINT pk_emploie_du_temp PRIMARY KEY ( idemploiedutemp )
 );

CREATE  TABLE "public".employee ( 
	idemployee           varchar(10)  NOT NULL  ,
	nomemploye           varchar(50)  NOT NULL  ,
	idposte              varchar(10)    ,
	"dtn "               date  NOT NULL  ,
	contact              varchar(50)  NOT NULL  ,
	CONSTRAINT pk_employee PRIMARY KEY ( idemployee )
 );

ALTER TABLE "public".employee ADD CONSTRAINT fk_employee_poste FOREIGN KEY ( idposte ) REFERENCES "public".poste( idposte );

CREATE  TABLE "public".entree_matiere_premiere ( 
	identreematiere      varchar(10)  NOT NULL  ,
	matierepremiere      varchar(10)  NOT NULL  ,
	pumatierepremiere    double precision  NOT NULL  ,
	dateentreematierepremiere date DEFAULT CURRENT_DATE NOT NULL  ,
	quantitematierepremiere double precision  NOT NULL  ,
	CONSTRAINT pk_entree_matiere_premiere PRIMARY KEY ( identreematiere )
 );

ALTER TABLE "public".entree_matiere_premiere ADD CONSTRAINT fk_entree_matiere_premiere_matiere_premiere FOREIGN KEY ( matierepremiere ) REFERENCES "public".matiere_premiere( idmatierepremiere );

CREATE  TABLE "public".historiquetravail ( 
	idemploye            varchar(10)  NOT NULL  ,
	datedebut            date  NOT NULL  ,
	datefin              date  NOT NULL  ,
	raison               text  NOT NULL  
 );

ALTER TABLE "public".historiquetravail ADD CONSTRAINT fk_historiquetravail_employee FOREIGN KEY ( idemploye ) REFERENCES "public".employee( idemployee );
CREATE  TABLE "public".matiere_premiere ( 
	idmatierepremiere    varchar(10)  NOT NULL  ,
	nommatierepremiere   varchar(50)  NOT NULL  ,
	unite                varchar(10)  NOT NULL  ,
	CONSTRAINT pk_matiere_premiere PRIMARY KEY ( idmatierepremiere )
 );
 CREATE  TABLE "public".paiement_salaire ( 
	"idpaiment "         varchar(10)  NOT NULL  ,
	idemploye            varchar(10)  NOT NULL  ,
	datepaiement         date DEFAULT CURRENT_DATE   ,
	CONSTRAINT pk_paiement_salaire PRIMARY KEY ( "idpaiment " )
 );

ALTER TABLE "public".paiement_salaire ADD CONSTRAINT fk_paiement_salaire_employee FOREIGN KEY ( idemploye ) REFERENCES "public".employee( idemployee );
CREATE  TABLE "public".poste ( 
	idposte              varchar(10)  NOT NULL  ,
	nomposte             varchar(50)  NOT NULL  ,
	CONSTRAINT pk_poste PRIMARY KEY ( idposte )
 );
CREATE  TABLE "public".produit ( 
	idproduit            varchar(10)  NOT NULL  ,
	nomproduit           varchar(10)  NOT NULL  ,
	CONSTRAINT pk_produit PRIMARY KEY ( idproduit )
 );
CREATE  TABLE "public".restematierepremiere ( 
	idrestematierepremiere varchar(10)  NOT NULL  ,
	matierepremiere      varchar(10)  NOT NULL  ,
	datereste            date  NOT NULL  ,
	quantitematierepremiere double precision  NOT NULL  ,
	pumatierepremiere    double precision  NOT NULL  ,
	report               integer  NOT NULL  ,
	CONSTRAINT pk_restematierepremiere PRIMARY KEY ( idrestematierepremiere )
 );

ALTER TABLE "public".restematierepremiere ADD CONSTRAINT fk_restematierepremiere FOREIGN KEY ( matierepremiere ) REFERENCES "public".matiere_premiere( idmatierepremiere );
CREATE  TABLE "public".restestock ( 
	idrestestock         varchar(10)  NOT NULL  ,
	idproduit            varchar(10)  NOT NULL  ,
	datereste            date  NOT NULL  ,
	quantitereste        double precision  NOT NULL  ,
	report               integer  NOT NULL  ,
	remiseproduit        double precision  NOT NULL  ,
	CONSTRAINT pk_restestock PRIMARY KEY ( idrestestock )
 );
CREATE  TABLE "public".salaireposte ( 
	idsalaireposte       varchar(10)  NOT NULL  ,
	idposte              varchar(10)  NOT NULL  ,
	prixsalaire          double precision  NOT NULL  ,
	datepaiment          date DEFAULT CURRENT_DATE NOT NULL  ,
	CONSTRAINT pk_salaireposte PRIMARY KEY ( idsalaireposte )
 );

ALTER TABLE "public".salaireposte ADD CONSTRAINT fk_salaireposte_poste FOREIGN KEY ( idposte ) REFERENCES "public".poste( idposte );

CREATE  TABLE "public".sortie_matiere_premiere ( 
	idsortie             varchar(10)  NOT NULL  ,
	matierepremiere      varchar(10)  NOT NULL  ,
	datesortiematierepremiere date DEFAULT CURRENT_DATE NOT NULL  ,
	quantitematierepremiere double precision  NOT NULL  ,
	pumatierepremiere    double precision  NOT NULL  ,
	CONSTRAINT pk_sortie_matiere_premiere PRIMARY KEY ( idsortie )
 );

ALTER TABLE "public".sortie_matiere_premiere ADD CONSTRAINT fk_sortie_matiere_premiere FOREIGN KEY ( matierepremiere ) REFERENCES "public".matiere_premiere( idmatierepremiere );
CREATE  TABLE "public".sortie_produit ( 
	idsortieproduit      varchar(10)  NOT NULL  ,
	idproduit            varchar(10)  NOT NULL  ,
	datesortieproduit    date DEFAULT CURRENT_DATE NOT NULL  ,
	quantiteproduit      double precision  NOT NULL  ,
	idclient             varchar(10)  NOT NULL  ,
	etatcommande         integer  NOT NULL  ,
	CONSTRAINT pk_sortie_produit PRIMARY KEY ( idsortieproduit )
 );

ALTER TABLE "public".sortie_produit ADD CONSTRAINT fk_sortie_produit_client FOREIGN KEY ( idclient ) REFERENCES "public".client( idclient );

ALTER TABLE "public".sortie_produit ADD CONSTRAINT fk_sortie_produit_produit FOREIGN KEY ( idproduit ) REFERENCES "public".produit( idproduit );
CREATE  TABLE "public".specificite ( 
	idspecificite        varchar(10)  NOT NULL  ,
	nom                  varchar(50)    ,
	remise               double precision  NOT NULL  ,
	CONSTRAINT pk_specificite PRIMARY KEY ( idspecificite )
 );
 CREATE  TABLE "public".stock_produits_finis ( 
	idstockproduitfini   varchar(10)  NOT NULL  ,
	idproduit            varchar(10)  NOT NULL  ,
	dateentreestock      date DEFAULT CURRENT_DATE NOT NULL  ,
	quantite             double precision  NOT NULL  ,
	puenstock            double precision  NOT NULL  ,
	CONSTRAINT pk_stock_produits_finis PRIMARY KEY ( idstockproduitfini )
 );

ALTER TABLE "public".stock_produits_finis ADD CONSTRAINT fk_stock_produits_finis FOREIGN KEY ( idproduit ) REFERENCES "public".produit( idproduit );
