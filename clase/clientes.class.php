<?php
require("utilidad.class.php");

class clientes extends utilidad
{
    public $cod_cli;
    public $ced_cli;
    public $nom_cli;
    public $ape_cli;
    public $te1_cli;
    public $te2_cli;
    public $est_cli;

    public function agregar()
    {
        $this->sql = "insert into clientes(ced_cli,nom_cli,ape_cli,te1_cli,te2_cli,est_cli)
                    values('$this->ced_cli',
                           '$this->nom_cli',
                           '$this->ape_cli',
                           '$this->te1_cli',
                           '$this->te2_cli',
                           '$this->est_cli')";

        //echo "SQL de la Función Agregar = " . $this->sql;
        $resultado = $this->ejecutar(); //Ejecutar es una función heredada de la clase utilidad
        return $resultado;
    }

    public function editar()
    {
        $this->sql = "update clientes set ced_cli='$this->ced_cli',
                          nom_cli='$this->nom_cli',
                          ape_cli='$this->ape_cli',
                          te1_cli='$this->te1_cli',
                          te2_cli='$this->te2_cli',
                          est_cli='$this->est_cli'
                          where
                          cod_cli='$this->cod_cli'";

        //echo "SQL de la Función Editar = " . $this->sql;
        $resultado = $this->ejecutar(); //Ejecutar es una función heredada de la clase utilidad
        return $resultado;
    }

    public function listar()
    {
        $this->sql = "select * from clientes";

        //echo "SQL de la Función Listar = " . $this->sql;
        $resultado = $this->ejecutar(); //Ejecutar es una función heredada de la clase utilidad
        return $resultado;
    }

    public function borrar()
    {
        $this->sql = "delete from clientes where cod_cli='$this->cod_cli'";

        echo "SQL de la Función Borrar = " . $this->sql;
        $resultado = $this->ejecutar(); //Ejecutar es una función heredada de la clase utilidad
        return $resultado;
    }

    public function borrado_logico()
    {
        $this->sql = "update clientes set est_cli='I' where cod_cli='$this->cod_cli'";

        //echo "SQL de la Función Borrado Lógico = " . $this->sql;
        $resultado = $this->ejecutar(); //Ejecutar es una función heredada de la clase utilidad
        return $resultado;
    }

    public function filtrar($cod_cli,$ced_cli,$nom_cli,$ape_cli,$est_cli)
    {
        $where="where 1=1";
        if($cod_cli==""){ $filtro1=""; }else{ $filtro1="and cod_cli=$this->cod_cli"; }
        if($ced_cli==""){ $filtro2=""; }else{ $filtro2="and ced_cli=$this->ced_cli"; }
        if($nom_cli==""){ $filtro3=""; }else{ $filtro3="and nom_cli like '%$this->nom_cli%'"; }
        if($ape_cli==""){ $filtro4=""; }else{ $filtro4="and ape_cli like '%$this->ape_cli%'"; }
        if($est_cli==""){ $filtro5=""; }else{ $filtro5="and est_cli='$this->est_cli'"; }

        $this->sql="select * from clientes $where $filtro1 $filtro2 $filtro3 $filtro4 $filtro5";
         //echo "SQL de la Función Filtrar = " . $this->sql;
        $resultado = $this->ejecutar(); //Ejecutar es una función heredada de la clase utilidad
        return $resultado;
    }
}

?>