§	RAKOTOARISON Tiavina Gaël
§	ANDRIANAIVOSOA Johan Anjaratiana
§	RANDRIAMAMPIANINA Tsiky Aro Rary
§	RAVELOMANANA Herimalala Mihary Christelle
§	RAMAROSANDRATANA Johary Ny Aina Nirina
§	HANTANIAINA Mamisoa Tatamo
§	RAKOTONDRAINY Rotsy
§	RATEFIARIVONY Jaona
§	RAKOTONDRANAIVO Alain Rico

insert into admin(idadmin,nom,motdepasse,dtn,contact,nomo,premom,description) values (1,'TOTO Mertina Claudie','mertina44','2023-06-28','0346603384','TOTO','Mertina Claudie','Chef de projet');

--code jourbale
insert into codejournal (id,code,intitule) values (1,'AC','Achats');
insert into codejournal (id,code,intitule) values (2,'AN','A nouveau');
insert into codejournal (id,code,intitule) values (3,'BN','Banque BNI');
insert into codejournal (id,code,intitule) values (4,'BO','Banque BOA');
insert into codejournal (id,code,intitule) values (5,'CA','Caisse');
insert into codejournal (id,code,intitule) values (6,'OD','Opérations diverses');
insert into codejournal (id,code,intitule) values (7,'VL','Ventes locales');
insert into codejournal (id,code,intitule) values (8,'VE','Ventes à l exportation');

--compte


insert into compte(numero,intitule)values ('10100','CAPITAL');
insert into compte(numero,intitule)values ('10610','RESERVE LEGALE');
insert into compte(numero,intitule)values ('11000','REPORT A NOUVEAU');
insert into compte(numero,intitule)values ('11010','REPORT A NOUVEAU SOLDE CREDITEUR');
insert into compte(numero,intitule)values ('11200','AUTRES PRODUITS ET CHARGES');
insert into compte(numero,intitule)values ('11900','REPORT A NOUVEAU SOLDE DEBITEUR');
insert into compte(numero,intitule)values ('12800','RESULTAT EN INSTANCE');
insert into compte(numero,intitule)values ('13300','IMPOTS DIFFERES ACTIFS');
insert into compte(numero,intitule)values ('16110','EMPRUNT A LT');
insert into compte(numero,intitule)values ('16510','ENMPRUNT A MOYEN TERME');
insert into compte(numero,intitule)values ('20124','FRAIS DE REHABILITATION');
insert into compte(numero,intitule)values ('20800','AUTRES IMMOB INCORPORELLES');
insert into compte(numero,intitule)values ('21100','TERRAINS');
insert into compte(numero,intitule)values ('21200','CONSTRUCTION');
insert into compte(numero,intitule)values ('21300','MATERIEL ET OUTILLAGE');
insert into compte(numero,intitule)values ('21510','MATERIEL AUTOMOBILE');
insert into compte(numero,intitule)values ('21520','MATERIEL MOTO');
insert into compte(numero,intitule)values ('21600','AGENCEMENT. AM .INST');
insert into compte(numero,intitule)values ('21810','MATERIELS ET MOBILIERS DE BUREAU');
insert into compte(numero,intitule)values ('21819','MATERIELS INFORMATIQUES ET AUTRES');
insert into compte(numero,intitule)values ('21820','MAT. MOB DE LOGEMENT');
insert into compte(numero,intitule)values ('21880','AUTRES IMMOBILISATIONS CORP');
insert into compte(numero,intitule)values ('23000','IMMOBILISATION EN COURS');
insert into compte(numero,intitule)values ('28000','AMORT IMMOB INCORP');
insert into compte(numero,intitule)values ('28130','AMORT MACH-MATER-OUTIL');
insert into compte(numero,intitule)values ('28150','AMORT MAT DE TRANSPORT');
insert into compte(numero,intitule)values ('28160','AMORT A.A.I');
insert into compte(numero,intitule)values ('28181','AMORT MATERIEL&MOB');
insert into compte(numero,intitule)values ('28182','AMORTISSEMENTS MATERIELS INFORMATIQ');
insert into compte(numero,intitule)values ('28183','AMORT MATER & MOB LOGT');
insert into compte(numero,intitule)values ('32110','STOCK MATIERES PREMIERES');
insert into compte(numero,intitule)values ('35500','STOCK PRODUITS FINIS');
insert into compte(numero,intitule)values ('37000','STOCK MARCHANDISES');
insert into compte(numero,intitule)values ('39700','PROVISIONS/DEPRECIATIONS STOCKS');
insert into compte(numero,intitule)values ('40110','FOURNISSEURS DEXPLOITATIONS LOCAUX');
insert into compte(numero,intitule)values ('40120','FOURNISSEURS DEXPLOITATIONS ETRANGERS');
insert into compte(numero,intitule)values ('40310','FOURNISSEURS D IMMOBILISATION');
insert into compte(numero,intitule)values ('40810','FRNS: FACTURE A RECEVOIR');
insert into compte(numero,intitule)values ('40910','FRNS:AVANCES&ACOMPTES VERSER');
insert into compte(numero,intitule)values ('40980','FRNS: RABAIS A OBTENIR');
insert into compte(numero,intitule)values ('41110','CLIENTS LOCAUX');
insert into compte(numero,intitule)values ('41120','CLIENTS ETRANGERS');
insert into compte(numero,intitule)values ('41400','CLIENTS DOUTEUX');
insert into compte(numero,intitule)values ('41800','CLIENTS FACTURE A RETABLIR');
insert into compte(numero,intitule)values ('42100','PERSONNEL: SALAIRES A PAYER');
insert into compte(numero,intitule)values ('42510','PERSONNEL: AVANCES QUINZAINES');
insert into compte(numero,intitule)values ('42520','PERSONNEL: AVANCES SPECIALES');
insert into compte(numero,intitule)values ('42860','PERS:CHARGES  A PAYER');
insert into compte(numero,intitule)values ('43100','CNAPS');
insert into compte(numero,intitule)values ('43120','OSTIE');
insert into compte(numero,intitule)values ('44200','ETAT IBS');
insert into compte(numero,intitule)values ('44210','ACOMPTE IBS');
insert into compte(numero,intitule)values ('44321','TVA … IMPUTER:DEC ULTERIEURE');
insert into compte(numero,intitule)values ('44500','ETAT:IRSA VERSER');
insert into compte(numero,intitule)values ('44560','ETAT: TVA DEDUCTIBLE');
insert into compte(numero,intitule)values ('44570','ETAT: TVA COLLECTEE');
insert into compte(numero,intitule)values ('44571','TVA A VERSER');
insert into compte(numero,intitule)values ('45100','COMPTE  COURANT ASSOC');
insert into compte(numero,intitule)values ('46700','DEB/CRED DIVERS');
insert into compte(numero,intitule)values ('46800','CHARGES A PAYER DEB/CRED DIVERS');
insert into compte(numero,intitule)values ('48610','CHARGE CONSTATES D AVANCE');
insert into compte(numero,intitule)values ('49100','PERTE/CLIENTS');
insert into compte(numero,intitule)values ('51200','BOA ANKORONDRANO');
insert into compte(numero,intitule)values ('51201','BOA DOLLARS');
insert into compte(numero,intitule)values ('51202','BNI MADAGASCAR');
insert into compte(numero,intitule)values ('51203','BNI DOLLARS');
insert into compte(numero,intitule)values ('53100','CAISSE');
insert into compte(numero,intitule)values ('58110','VIREMENTINTERNE:BANQ/CAISSE');
insert into compte(numero,intitule)values ('58130','VIREMENT INTERNE:BANQ/BANQ');
insert into compte(numero,intitule)values ('58140','VIREMENT INTERNE CAISSE/CAISSE');
insert into compte(numero,intitule)values ('60100','ACHAT MATIERES PREMIERESS');
insert into compte(numero,intitule)values ('60200','FOURNIT DE MAGASIN');
insert into compte(numero,intitule)values ('60210','FOURNIT BUR');
insert into compte(numero,intitule)values ('60220','FOURNIT DE LOGT');
insert into compte(numero,intitule)values ('60230','EMBALLAGES PLAST-CARTON....');
insert into compte(numero,intitule)values ('60240','PIEC RECH VOITURES ADMINISTRATIVES');
insert into compte(numero,intitule)values ('60241','PIEC RECH CAMIONS');
insert into compte(numero,intitule)values ('60242','PIEC RECH MOTO');
insert into compte(numero,intitule)values ('60250','AUTRES ACHATS');
insert into compte(numero,intitule)values ('60300','VARIATION  STOCK MAT PREM');
insert into compte(numero,intitule)values ('60610','EAU ET ELECTRICITE');
insert into compte(numero,intitule)values ('60620','GAZ,COMBUST,CARBURANT,LUBRIF');
insert into compte(numero,intitule)values ('61300','LOC IMMOBILIERES');
insert into compte(numero,intitule)values ('61380','AUTRES LOCATIONS');
insert into compte(numero,intitule)values ('61550','ENTRET & REP VEHICULE');
insert into compte(numero,intitule)values ('61560','MAINTENANCE');
insert into compte(numero,intitule)values ('61610','ASSURANCE GLOBALE DOMMAGES');
insert into compte(numero,intitule)values ('61611','ASSURANCE FLOTTE AUTOMOBILE');
insert into compte(numero,intitule)values ('61800','PHOTOCOPIE ET ASSIMILES');
insert into compte(numero,intitule)values ('61810','ENVOI COLIS LETTRE&DOC...');
insert into compte(numero,intitule)values ('62100','PERSONNEL EXTER');
insert into compte(numero,intitule)values ('62210','HONORAIRE');
insert into compte(numero,intitule)values ('62220','REMUNERATION DES TRANSITAIRES');
insert into compte(numero,intitule)values ('62230','CATALOGUES ET IMPRIMES');
insert into compte(numero,intitule)values ('62240','PUBLICATION');
insert into compte(numero,intitule)values ('62250','SPONSORING-MECENAT...');
insert into compte(numero,intitule)values ('62400','FRAIS DE TRANSPORT');
insert into compte(numero,intitule)values ('62510','VOYAGES   ET DEPLACEMENT');
insert into compte(numero,intitule)values ('62520','MISSION(DEPL+HEBERGT+RESTø)');
insert into compte(numero,intitule)values ('62530','RECEPTION');
insert into compte(numero,intitule)values ('62610','SERVICES POSTAUX');
insert into compte(numero,intitule)values ('62620','TEL&FAX');
insert into compte(numero,intitule)values ('62630','INTERNET TANA');
insert into compte(numero,intitule)values ('62740','COMMISSIONS BANCAIRE INTERNATIONALE');
insert into compte(numero,intitule)values ('62760','COMMISSIONS BNI');
insert into compte(numero,intitule)values ('62770','COMMISSIONS BOA');
insert into compte(numero,intitule)values ('62880','AUTRES  CHARGES EXTERNES');
insert into compte(numero,intitule)values ('63680','AUTRES IMPOTS/TAXES/DROITS DIV');
insert into compte(numero,intitule)values ('64100','REMUNERATION PERSONNEL');
insert into compte(numero,intitule)values ('64120','DROIT DE CONGES');
insert into compte(numero,intitule)values ('64511','CNAPS:COTISATION  PATRONALE');
insert into compte(numero,intitule)values ('64512','OSTIE : COTISATION PATRONALE');
insert into compte(numero,intitule)values ('64750','MED ET ASSIM PERS');
insert into compte(numero,intitule)values ('65800','AUTRES CHARGES DIVERSES');
insert into compte(numero,intitule)values ('65810','ECART/PAIEMENT');
insert into compte(numero,intitule)values ('65811','PERTE/TVA NON RECUPERABLE');
insert into compte(numero,intitule)values ('66200','INTERETS  BANCAIRES BNI');
insert into compte(numero,intitule)values ('66300','INTERETS  BANCAIRES BOA');
insert into compte(numero,intitule)values ('66600','DIFFF  DE  CHANGE  PERTE');
insert into compte(numero,intitule)values ('66680','AGIOS/TRAITES');
insert into compte(numero,intitule)values ('68110','D.A.P  IMMO INCORPORELLES');
insert into compte(numero,intitule)values ('68120','D.A.P  IMMO  CORPORELLE');
insert into compte(numero,intitule)values ('70120','VENTES  A  L EXPORTATION');
insert into compte(numero,intitule)values ('70800','AUTRES PROD  DES ACT ANNEX&ACS');
insert into compte(numero,intitule)values ('71300','VARIATION DE STOCK  P.F');
insert into compte(numero,intitule)values ('75800','AUTRES PRODUITS D EXPLOITATION');
insert into compte(numero,intitule)values ('75810','ECART/ENCAISSEMENT');
insert into compte(numero,intitule)values ('76200','INTERET CREDITEUR BANQUES BNI');
insert into compte(numero,intitule)values ('76300','INTERET CREDITEUR BANQUES BOA');
insert into compte(numero,intitule)values ('76600','DIFFERENCE DE  CHANGE:PROFIT');

--unitee
insert into unite values (1,'kg');
insert into unite values (2,'l');

