create view v_emplois_du_temps_poste as(select idemplois_post,nom_semain,nom_poste,poste.idposte,semaine.idsemaine,T_debut,T_fin,P_debut,P_fin,date_insertion
from post_emplois_dutemps join semaine on post_emplois_dutemps.idsemaine=semaine.idsemaine join poste on post_emplois_dutemps.idposte=poste.idposte);


create view v_emplois_du_temps_employer as(select idemplois_post,nom_employer,nom_semain,prenom_employer,employer.idemployer,semaine.idsemaine,T_debut,T_fin,P_debut,P_fin,date_insertion,date_modif
from employer_emplois_dutemps join semaine on employer_emplois_dutemps.idsemaine=semaine.idsemaine join employer on employer_emplois_dutemps.identifiant=employer.identifiant);

SELECT nom_semain, COUNT(idemployer)
FROM v_emplois_du_temps_employer
WHERE '2023-07-11' BETWEEN date_insertion AND COALESCE(date_modif, CURRENT_DATE)
  AND T_debut != '00:00:00'
GROUP BY nom_semain;

--si la valeur date_modif est nulle je le remplace par la date a comparer
SELECT nom_semain, COUNT(idemployer)
FROM v_emplois_du_temps_employer
WHERE '2023-06-11' BETWEEN date_insertion AND 
    CASE WHEN date_modif IS NULL THEN '2023-06-11' ELSE date_modif END
  AND T_debut != '00:00:00'
GROUP BY nom_semain,idsemaine order by idsemaine;

CASE WHEN date_modif IS NULL THEN 'valeur_a_comparer' ELSE date_modif END

SELECT distinct(nom_employer),nom_semain,prenom_employer,T_debut,T_fin,P_debut,P_fin FROM v_emplois_du_temps_employer WHERE '%s' BETWEEN date_insertion AND  CASE WHEN date_modif IS NULL THEN '%s' ELSE date_modif END AND T_debut != '00:00:00' and  idsemaine=%d;



between date_insertion and modif_modif

drop view v_employe_du_temps_poste;
drop view  v_employe_du_temps_employer;


create view v_detailes_base_employee as (
    select poste.idposte,employer.idemployer,nom_employer,prenom_employer,nom_poste,date_entrer,contact,montant from employer join salaire_employer on employer.identifiant=salaire_employer.identifiant
    join poste on poste.idposte=employer.idposte where datefin is null
);

update employer_emplois_dutemps set date_modif=now() where idemployer=1 and idsemaine=1 and date_modif is null