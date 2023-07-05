insert into semaine(nom_semain) values ('Lundi');
insert into semaine(nom_semain) values ('Mardie');
insert into semaine(nom_semain) values ('Mercredie');
insert into semaine(nom_semain) values ('Jeudie');
insert into semaine(nom_semain) values ('Vendredie');
insert into semaine(nom_semain) values ('Samedie');
insert into semaine(nom_semain) values ('Dimanche');

insert into poste values(1,'Femme de  menage');
insert into poste values(2,'moulleur de Betton');
select * from poste where idpost=3;
insert into poste values(3, 'Livreur');
insert into poste values(7,'Directeur Generale');
insert into poste values(8,'Fabricant de composet');
insert into poste values(5,'Chimiste');
insert into poste values(6,'Emballeur');

update employer set identifiant='EMP00001' where idemployer=1;
update employer set identifiant='EMP00002' where idemployer=2;
update employer set identifiant='EMP00003' where idemployer=3;
update employer set identifiant='EMP00004' where idemployer=4;
update employer set identifiant='EMP00005' where idemployer=5;
update employer set identifiant='EMP00006' where idemployer=6;
update employer set identifiant='EMP00007' where idemployer=7;
update employer set identifiant='EMP00008' where idemployer=8;
update employer set identifiant='EMP00009' where idemployer=9;
update employer set identifiant='EMP00010' where idemployer=10;
update employer set identifiant='EMP00011' where idemployer=11;
update employer set identifiant='EMP00012' where idemployer=12;
update employer set identifiant='EMP00013' where idemployer=13;
update employer set identifiant='EMP00014' where idemployer=14;
update employer set identifiant='EMP00015' where idemployer=15;
update employer set identifiant='EMP00016' where idemployer=16;
update employer set identifiant='EMP00017' where idemployer=17;


insert into employer values (2,'Ratianarivo','Dylan',6,'2023-02-12','0342103384','2003-07-28');
insert into employer(idemployer,nom_employer,prenom_employer,idposte,date_entrer,contact,dtn) values (1,'TOTO','Mertina Claudie',6,'2023-02-12','0346603384','2003-06-28');
insert into employer(idemployer,nom_employer,prenom_employer,idposte,date_entrer,contact,dtn) values (3,'Ratianarivo','Mirado Mathieu',7,'2022-02-11','0341234567','2000-12-12');
insert into employer(idemployer,nom_employer,prenom_employer,idposte,date_entrer,contact,dtn) values (4,'ANDRANOTAHIANA','Kanto',7,'2023-02-12','0349876543','1999-11-09');
insert into employer(idemployer,nom_employer,prenom_employer,idposte,date_entrer,contact,dtn) values (5,'ANDRIAMAHALY ARINIAINA','Barthelemy Loique',7,'2023-02-12','0346543210','2001-07-11');
insert into employer(idemployer,nom_employer,prenom_employer,idposte,date_entrer,contact,dtn) values (6,'ANDRIAMALALA','Ranja Harimbola',8,'2022-02-11','0345432109','2002-05-20');
insert into employer(idemployer,nom_employer,prenom_employer,idposte,date_entrer,contact,dtn) values (7,'ANDRIAMAMPIONONA','Ny Koloina Heriniaina Cedric',8,'2023-02-12','0348901234','1998-03-12');
insert into employer(idemployer,nom_employer,prenom_employer,idposte,date_entrer,contact,dtn) values (8,'ANDRIAMANANOMBANA','Ny Avo Parson Anoa',8,'2023-02-12','0345678901','1997-11-12');
insert into employer(idemployer,nom_employer,prenom_employer,idposte,date_entrer,contact,dtn) values (9,'ANDRIAMANJARY','Ulrich Samsoudine',8,'2023-02-11','0349012345','1998-06-11');
insert into employer(idemployer,nom_employer,prenom_employer,idposte,date_entrer,contact,dtn) values (10,'ANDRIAMAROSATA','Ansritiana',10,'2022-02-11','0346789012','2002-12-12');
insert into employer(idemployer,nom_employer,prenom_employer,idposte,date_entrer,contact,dtn) values (11,'ANDRIAMASIVELO','Haja Joel',9,'2022-02-12','0346098712','1997-07-28');
insert into employer(idemployer,nom_employer,prenom_employer,idposte,date_entrer,contact,dtn) values (12,'ANDRIAMBOAVONJY','Njiva Ariaina',9,'2023-02-12','0342345678','1996-05-10');
insert into employer(idemployer,nom_employer,prenom_employer,idposte,date_entrer,contact,dtn) values (13,'ANDRIAMIHAVANA','Tafita Joda Antonio',9,'2023-02-12','0347654321','1995-08-19');
insert into employer(idemployer,nom_employer,prenom_employer,idposte,date_entrer,contact,dtn) values (14,'ANDRIAMISEDRA','Notianiavo Filamatriniaina',9,'2023-02-12','0343210987','1996-06-12');
insert into employer(idemployer,nom_employer,prenom_employer,idposte,date_entrer,contact,dtn) values (15,'ANDRIAMITANTSOA','Tiana Herizo Valisoa',11,'2022-02-12','0340123456','1999-06-11');
insert into employer(idemployer,nom_employer,prenom_employer,idposte,date_entrer,contact,dtn) values (16,'ANDRIAMPARANY','Ny Aro Dina Tsilavo',11,'2023-02-12','0343456789','1998-07-12');
insert into employer(idemployer,nom_employer,prenom_employer,idposte,date_entrer,contact,dtn) values (17,'ANDRIANAINA','Tsiory Vatosoa',11,'2023-02-12','0347890123','1997-08-11');

update employer_emplois_dutemps set date_modif=now() where idemployer=1 and idsemain=1

insert into salaire_employer(idsalaire,idemployer,montant,datedebut,datefin) values (1,10,1000000,'2022-02-11',null);
insert into salaire_employer(idsalaire,idemployer,montant,datedebut,datefin) values (2,6,400000,'2022-02-11',null);
insert into salaire_employer(idsalaire,idemployer,montant,datedebut,datefin) values (3,7,400000,'2023-02-12',null);
insert into salaire_employer(idsalaire,idemployer,montant,datedebut,datefin) values (4,8,400000,'2023-02-12',null);
insert into salaire_employer(idsalaire,idemployer,montant,datedebut,datefin) values (5,9,400000,'2023-02-12',null);
insert into salaire_employer(idsalaire,idemployer,montant,datedebut,datefin) values (6,11,300000,'2023-02-12',null);
insert into salaire_employer(idsalaire,idemployer,montant,datedebut,datefin) values (7,12,300000,'2023-02-12',null);
insert into salaire_employer(idsalaire,idemployer,montant,datedebut,datefin) values (8,13,300000,'2023-02-12',null);
insert into salaire_employer(idsalaire,idemployer,montant,datedebut,datefin) values (9,14,300000,'2023-02-12',null);
insert into salaire_employer(idsalaire,idemployer,montant,datedebut,datefin) values (10,1,300000,'2023-02-12',null);
insert into salaire_employer(idsalaire,idemployer,montant,datedebut,datefin) values (11,2,300000,'2023-02-12',null);
insert into salaire_employer(idsalaire,idemployer,montant,datedebut,datefin) values (12,3,300000,'2022-02-11',null);
insert into salaire_employer(idsalaire,idemployer,montant,datedebut,datefin) values (13,4,300000,'2023-02-12',null);
insert into salaire_employer(idsalaire,idemployer,montant,datedebut,datefin) values (14,5,300000,'2023-02-12',null);

delete from emplois_du_temps_employer;
delete from salaire_employer;
delete from employer;

delete from post_emplois_dutemps;

delete from poste;

http://localhost/FakoMa/admin-side/index.php/CT_CRUD_Employer/emplois_du_temps_employer?idemployer=6&&idpost=2

SELECT CURRVAL('poste');
ALTER TABLE poste ALTER COLUMN idposte RESTART WITH 1;
CREATE SEQUENCE emp;



