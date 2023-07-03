select idposte,nom_poste,AVG(montant) from v_detailes_base_employee group by idposte,nom_poste;

--si la valeur date_modif est nulle je le remplace par la date a comparer
SELECT nom_semain, COUNT(idemployer)
FROM v_emplois_du_temps_employer
WHERE '2023-06-11' BETWEEN date_insertion AND 
    CASE WHEN date_modif IS NULL THEN '2023-06-11' ELSE date_modif END
  AND T_debut != '00:00:00'
GROUP BY nom_semain;

--si la valeur date_modif est nulle je le remplace par la date a comparer
SELECT nom_semain, COUNT(idemployer)FROM v_emplois_du_temps_employer WHERE '%s' BETWEEN date_insertion AND  CASE WHEN date_modif IS NULL THEN '%s' ELSE date_modif END AND T_debut != '00:00:00' GROUP BY nom_semain;