create role Fakoma SUPERUSER LOGIN PASSWORD 'fakoma' ;

create database Fakoma_apk with owner fakoma;

\c Fakoma_apk;



select idposte,nom_poste from poste

select idposte from poste order by idposte desc



drop table post_emplois_dutemps;


create table employer_emplois_dutemps(
    idemplois_post serial primary key,
    idsemaine int,
    idemployer int,
    T_debut time,
    T_fin time,
    P_debut time,
    P_fin time,
    date_insertion date,
    date_modif date;
    FOREIGN KEY (idemployer) REFERENCES employer(idemployer),
    FOREIGN KEY (idsemaine) REFERENCES semaine(idsemaine)
);

ALTER TABLE employer_emplois_dutemps ADD COLUMN date_modif date;


select idemplois_post,idsemaine,idemployer,T_debut,T_fin,P_debut,P_fin from employer_emplois_dutemps where date_insertion ='%s' and idsemaine=(SELECT EXTRACT(ISODOW FROM '%s'::date) AS jour_semaine_chiffre) and T_debut!='00:00:00';

select date_insertion from post_emplois_dutemps where idposte=%d order by date_insertion desc;


select montant,datedebut from salaire_employer where idemployer=1;



$idsemaine,$idposte,$T_debut,$T_fin,$P_debut,$P_fin

insert into post_emplois_dutemps(idsemaine,idposte,T_debut,T_fin,P_debut,P_fin,date_insertion) values (%d,%d,'%s','%s','%s','%s',now());

create table employer(
    idemployer serial primary key,
    nom_employer Varchar(70),
    prenom_employer Varchar(70),
    idposte int,
    date_entrer date,
    contact Varchar(20),
    dtn date,
    FOREIGN KEY (idposte) REFERENCES poste(idposte)
);


insert into absence(idemployer,dateabsence) values (%d,'%s');

update employer set identifiant='' where idemployer=;
ALTER TABLE employer ADD COLUMN identifiant VARCHAR(8);

ALTER TABLE employer ALTER COLUMN nom_employer TYPE VARCHAR(70);
ALTER TABLE employer ALTER COLUMN prenom_employer TYPE VARCHAR(70);


insert into employer(nom_employer,prenom_employer,idposte,date_entrer,contact,dtn) values ('TOTO','Mertina Claudie',4,'2023-02-12','0346603384','2003-06-28');
insert into employer(nom_employer,prenom_employer,idposte,date_entrer,contact,dtn) values ('Ratianarivo','Dylan',4,'2023-02-12','0342103384','2003-07-28');

ALTER TABLE employer
ADD dtn date;

insert into employer 



select nom_employer,prenom_employer,nom_poste,date_entrer,contact,montant from v_detailes_base_employee where idemployer=%d;

update employer set nom_employer='%s',prenom_employer='%s',idposte=%d,date_entre='%s',contact='%s' from employer where idemployer=%d

select nom_employer,prenom_employer,idposte,date_entre,contact from employer where idemployer=%d;
insert into employer (nom_employer,prenom_employer,idposte,date_entrer,contact) values ('%s','%s',%d,'%s','%s')

insert int salaire_employer(idemployer,montant,datedebut) values (%d,%f.2,'%s');





select lundie,mardie,mercredie,jeudie,vendredi,samedi,dimance,datedebut from employe_du_temps where idemployer=%d 

insert into employe_du_temps(idemployer,iddepartement,lundie,mardie,mercredie,jeudie,vendredi,samedi,dimance,datedebut)values (%d,%d,%d,%d,%d,%d,%d,%d,%d)

update employe_du_temps set datefin='%s' where idemployer=%d

update salaire_employer set datefin='%s' where idemployer=%d

create table 
select idposte,nom_poste from poste;

