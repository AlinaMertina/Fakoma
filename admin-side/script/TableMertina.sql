create table poste(
    idposte serial primary key,
    nomposte Varchar(50)
);

create table semaine(
    idsemaine serial primary key,
    nom_semain Varchar(50)
);

-- create table centre_departement(
--     iddepartement serial primary key,
--     nom_centre Varchar(50)
-- );

create table employer(
    idemployer serial primary key,
    nom_employer Varchar(70),
    prenom_employer Varchar(70),
    idposte int,
    date_entrer date,
    contact Varchar(20),
    dtn date,
    identifiant VARCHAR(8) unique,
    FOREIGN KEY (idposte) REFERENCES poste(idposte)
);

create table employer_emplois_dutemps(
    idemplois_post serial primary key,
    idsemaine int,
    identifiant Varchar(8),
    T_debut time,
    T_fin time,
    P_debut time,
    P_fin time,
    date_insertion date,
    date_modif date,
    FOREIGN KEY (identifiant) REFERENCES employer(identifiant),
    FOREIGN KEY (idsemaine) REFERENCES semaine(idsemaine)
);


create table absence(
    idabsence serial primary key,
    identifiant VARCHAR(8),
    dateabsence date,
    FOREIGN KEY (identifiant) REFERENCES employer(identifiant)
);

create table Avertisement_employer(
    idavertisment serial primary key,
    description VARCHAR(200),
    identifiant Varchar(8),
    dateavertisement date,
    FOREIGN KEY (identifiant) REFERENCES employer(identifiant)
);

create view v_detailleemp as (
    select poste.idposte,nomposte,nom_employer,prenom_employer,employer.idemployer,date_entrer,dtn,description,dateavertisement,contact from employer LEFT JOIN Avertisement_employer on Avertisement_employer.identifiant=employer.identifiant join poste
    on employer.idposte=poste.idposte
);

create table salaire_employer(
    idsalaire serial primary key,
    identifiant Varchar(8),
    montant double precision,
    datedebut date,
    datefin date,
    FOREIGN KEY (identifiant) REFERENCES employer(identifiant)
);

create table TacheSpecifique_emp(
    idtache serial primary key,
    identifiant VARCHAR(8),
    description text,
    date timestamp,
    FOREIGN KEY (identifiant) REFERENCES employer(identifiant)
);

create view v_detailes_base_employee as (
    select poste.idposte,employer.idemployer,nom_employer,prenom_employer,nomposte,date_entrer,contact,montant, employer.identifiant ,dtn from employer join salaire_employer on employer.identifiant=salaire_employer.identifiant
    join poste on poste.idposte=employer.idposte where datefin is null
);

create view v_emplois_du_temps_employer as(select employer.identifiant,idemplois_post,nom_employer,nom_semain,prenom_employer,employer.idemployer,semaine.idsemaine,T_debut,T_fin,P_debut,P_fin,date_insertion,date_modif
from employer_emplois_dutemps join semaine on employer_emplois_dutemps.idsemaine=semaine.idsemaine join employer on employer_emplois_dutemps.identifiant=employer.identifiant);

create table post_emplois_dutemps(
    idemplois_post serial primary key,
    idsemaine int,
    idposte int,
    T_debut time,
    T_fin time,
    P_debut time,
    P_fin time,
    date_insertion date,
    FOREIGN KEY (idposte) REFERENCES poste(idposte),
    FOREIGN KEY (idsemaine) REFERENCES semaine(idsemaine)
);

create table centre_departement(
    iddepartement serial PRIMARY KEY,
    nom_centre VARCHAR(50)
);

create table employe_du_temps(
    idtemps serial primary key,
    idemployer int,
    iddepartement int,
    lundie int,
    mardie int,
    mercredie int,
    jeudie int,
    vendredi int,
    samedi int,
    dimance int,
    datedebut date,
    datefin date,
    FOREIGN KEY (idemployer) REFERENCES employer(idemployer),
    FOREIGN KEY (iddepartement) REFERENCES centre_departement(iddepartement)
);

CREATE SEQUENCE emp;

-- 11
-- drop view v_detailleemp;
-- drop view v_detailes_base_employee;
-- drop view v_emplois_du_temps_employer;
-- drop table employe_du_temps;
-- drop table post_emplois_dutemps;
-- drop table TacheSpecifique_emp;
-- drop table salaire_employer;
-- drop table Avertisement_employer;
-- drop table absence;
-- drop table employer_emplois_dutemps;
-- drop table employer;
-- drop table centre_departement;
-- drop table semaine;
-- drop table poste;