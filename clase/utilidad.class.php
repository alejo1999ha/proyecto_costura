<?php
class utilidad
{
    public $sql;
    public $mysqli;
    public $pun_bds;
    private $servidor   = "localhost";
    private $usuario    = "root";
    private $clave      = "";
    private $base_datos = "costura1";

    /* Conectar: Función para conectar a la base de datos */

    public function utilidad()
    {
          $this->conectar();
    }

    public function conectar()
    {
        $this->mysqli = new mysqli($this->servidor, $this->usuario, $this->clave, $this->base_datos);
    } // Fin de conectar()

    /* Ejecutar: Función para ejecutar una acción en la base de datos. */
    public function ejecutar()
    {
        //echo "<br>".$this->sql;
        return $this->mysqli->query($this->sql);
    } // Fin de la función ejecutar()

    public function ultimo_id_insertado()
    {
        return mysqli_insert_id($this->mysqli);
    }

    public function filas_afectadas()
    {
        return $this->mysqli->affected_rows;
    }

    /* Asignar Valor: Función genérica que sirve para asignar el valor en un atributo cualquiera. */
    public function asignar_valor($atributo, $valor)
    {
        $this->$atributo = $valor;
    } // Fin de Asignar Valor

    public function mensaje($color,$icon,$mensaje)
    {
        echo "<link  rel='stylesheet' href='../bootstrap-4.0/css/bootstrap.min.css'>";
        echo "<link  rel='stylesheet' href='../bootstrap-4.0/css/bootstrap.min.css'>";
        echo "<link  rel='stylesheet' href='../iconos-fontawesome/css/all.min.css'>";
        echo "<link  rel='stylesheet' href='../estilo/estilo.css'>";
        echo "<div class='container p-4 pl-5 pr-5 text-center mt-3'>
                <div class='ml-5 mr-5 mt-1 mb-1'>
                    <div class='alert alert-$color mt-3 mr-5 ml-5'>
                        <i class='$icon icono-mensajes pt-1 pb-2'></i><br>
                                 <strong class='pb-1'>$mensaje</strong> 
                         </div>
                    </div>
            </div>";
    if($color=="danger") 
    {
      $this->mensaje_error();
    }      
    }

    public function error_nro()
    {
        return $this->mysqli->errno;
    }

    function mensaje_error()
    {
      switch($this->error_nro())
      {
        case 0: $error="Error Num: ".$this->error_nro()." (Ud no modific&oacute; ning&uacute;n registro en la pantalla anterior)."; break;
        case 1062: $error="Error Num: ".$this->error_nro()." (Registro Duplicado)."; break;
        case 1064: $error="Error Num: ".$this->error_nro(); break;
        default:     $error="Error Num: ".$this->error_nro(); break;
      }
        echo "<div class='alert alert-danger mt-3'>
          <strong>$error</strong> 
        </div>";
    } 

    public function extraer_dato($pun_bds){
        //return mysql_fetch_assoc($pun_bds);
        return $pun_bds->fetch_assoc();
    }// Fin de la función extraer_dato() 

} // Fin de la Clase Utilidad
?>

