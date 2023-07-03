<?php

class MD_Optimisation extends CI_Model 
{

    public function __construct()
    {
        parent::__construct();
    }

    function Simplex_KimCloun($A)
    {
        $_nbBase = $this->CheckNbBase($A);

        $base = $this->InitialBase($A);

        $A = $this->VariableDecart($A, $_nbBase);

        $status = true;

        while($status == true)
        {
            $j = $this->CheckIn($A);
            if($j == -1) break;

            $i = $this->CheckOut($A, $j);
            if($i == -1) break;

            $A = $this->PivotToOne($A, $i, $j);

            $A = $this->GaussPivot($i, $j, $A);

            $base = $this->UpdateBase($i, $j, $base);
        }

        $answer = $this->SetSolution($base, $A);

        return $answer;
    }

    function SetSolution($base, $A)
    {
        $answer = array();
        for($i = 0 ; $i < count($A) - 1 ; $i++)
        {
            $answer['Column_'.$base[$i]] = end($A[$i]);
        }
        return $answer;
    }

    function UpdateBase($i, $j, $base)
    {
        $base[$i] = $j;
        return $base;
    }

    function PivotToOne($A, $i, $j)
    {
        $ToOne = $A[$i][$j];

        for($jj = 0 ; $jj < count($A[$i]) ; $jj++)
        {
            $A[$i][$jj] /= $ToOne;
        }
        return $A;
    }
    function InitialBase($A)
    {
        $index_start = count($A[0]) - 1;

        for($i = 0 ; $i < count($A) - 1 ; $i++)
        {
            $base[] = $index_start + $i;
        }
        return $base;
    }

    function CheckNbBase($A)
    {
        return count($A) - 1;
    }

    function VariableDecart($A, $_nbBase)
    {
        for($i = 0 ; $i < count($A) ; $i++)
        {
            $_lastColumn[] = end($A[$i]);
        }

        $index_start = count($A[0]) - 1;

        for($i = 0 ; $i < count($A) ; $i++)
        {
            for($j = 0 ; $j < $_nbBase ; $j++)
            {
                if($j == $i && $i != count($A) - 1)$A[$i][$index_start+$j] = 1;
                else $A[$i][$index_start+$j] = 0;
            }
        }

        for($i = 0 ; $i < count($_lastColumn) ; $i++)
        {
            $A[$i][] = $_lastColumn[$i];
        }

        return $A;
    }

    function GaussPivot($i, $j, $A)
    {
        $Coeff_anulation = 0 ;

        for($ii = 0 ; $ii < count($A) ; $ii++)
        {
            if($ii == $i)continue;
            
            $Coeff_anulation = $A[$ii][$j];

            for($jj = 0 ; $jj < count($A[0]) ; $jj++)
            {
                $A[$ii][$jj] = $A[$ii][$jj] - $A[$i][$jj]*$Coeff_anulation;
            }
        }
        return $A;
    }

    function CheckOut($A, $j)
    {
        $index = 0 ;

        for($i = 1 ; $i < count($A) - 1 ; $i++) // Initialiser par un nombre positive different de zero
        {
            if($A[$i][$j] != 0)
            {
                $index = $i;
            }
        }

        if($A[$index][$j] == 0)return -1;

        for($i = 1 ; $i < count($A) - 1 ; $i++)
        {
            if($A[$i][$j] == 0)continue;

            if(end($A[$index])/$A[$index][$j] < 0 && end($A[$i])/$A[$i][$j] > 0)
            {
                $index = $i;
                continue;
            }

            if(end($A[$i])/$A[$i][$j] > 0 && end($A[$index])/$A[$index][$j] > end($A[$i])/$A[$i][$j])
            {
                $index = $i;
            }
        }

        if(end($A[$index])/$A[$index][$j] <= 0)return -1;

        return $index;

    }

    function CheckIn($A)
    {
        $index = 0 ;

        for($i = 1 ; $i < count(end($A))-1 ; $i++)
        {
            if(end($A)[$i] > end($A)[$index] && end($A)[$index] > 0)$index = $i;
        }

        if(end($A)[$index] <= 0)
        {
            return -1;
        }
        else
        {
            return $index;
        }
    }

    function show_mat($A)
    {
        echo "\t\t--------------- Affichage du matrice ----------------<br>";
        echo "<br><br>";
        for($i = 0 ; $i < count($A) ; $i++)
        {
            for($j = 0 ; $j < count($A[$i]) ; $j++)
            {
                echo "<span>_____</span>".$A[$i][$j];
            }
            echo "<br>";
        }
        echo "<br><br>";
        echo "\t\t---------------------- Terminer ---------------------<br>";
    }
}