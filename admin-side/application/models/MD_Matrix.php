<?php

class MD_Matrix extends CI_Model 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MD_CompositionProduit');
        $this->load->model('MD_Produit');
    }

    function MatrixBuilder($Remainingmatierepremieres, $produits)
    {
        foreach($Remainingmatierepremieres as $Remainingmatierepremiere)
        {
            $_M[] = array();
            foreach($produits as $produit)
            {
                $_M[count($_M) - 1][] = $this->MD_CompositionProduit->get_latest_composition($produit->idproduit, $Remainingmatierepremiere->idmatierepremiere)->quantite;
            }
            $_M[count($_M) - 1][] = $Remainingmatierepremiere->reste;
        }

        $_M[] = array();

        $_M[count($_M) - 1] = $this->get_Z_ToMaximize($produits, count($_M[0]));

        return $_M;
    }

    function get_Z_ToMaximize($produits, $len)
    {
        foreach($produits as $produit)
        {
            $_Z[] = $this->MD_Produit->get_latest_prix_produit($produit->idproduit)->prix;
        }
        for($i = count($produits) - 1 ; $i < $len-1 ; $i++)
        {
            $_Z[] = 0;
        }
        return $_Z;
    }

    function AddResultInProduit($_result, $Remainingmatierepremieres, $produits)
    {
        for($i = 0 ; $i < count($produits) ; $i++)
        {
            if(isset($_result['Column_'.$i]))
            {
                $produits[$i]->maximize = $_result['Column_'.$i];
            }
            else
            {
                $produits[$i]->maximize = 0;
            }
        }
        return $produits;
    }

    function GetOptimizedProduction($Remainingmatierepremieres, $produits)
    {
        $_M = $this->MD_Matrix->MatrixBuilder($Remainingmatierepremieres, $produits);

        $_result = $this->MD_Optimisation->Simplex_KimCloun($_M);

        $produits = $this->MD_Matrix->AddResultInProduit($_result, $Remainingmatierepremieres, $produits);

        return $produits;
    }

    function GetTemporaryRemainingmatierepremieres($Remainingmatierepremieres, $produits, $productComposers)
    {
        foreach($Remainingmatierepremieres as $Remainingmatierepremiere)
        {
            $Remainingmatierepremiere->reste_apres = $Remainingmatierepremiere->reste;
        }

        foreach($produits as $produit)
        {
            $maximize = $produit->maximize;
            
            foreach($Remainingmatierepremieres as $Remainingmatierepremiere)
            {
                $Remainingmatierepremiere->reste_apres -=
                    ($maximize * $productComposers[$produit->idproduit][$Remainingmatierepremiere->idmatierepremiere]->quantite);
            }
        }
        return $Remainingmatierepremieres;
    }
}