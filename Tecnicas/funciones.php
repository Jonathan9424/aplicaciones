<?php
class Funciones{

    private $host="localhost";
    private $user="root";
    private $pass="12qwaszx";
    private $db="tecnicas";

    public function _construct(){

    }
    //funcion para consultas generales
    public function accionPrincipal($query){
        if($conectado=$this->conectar()){
            if(mysqli_select_db($conectado,$this->db)){ //selecciona base de datos
                if($Consulta=mysqli_query($conectado,$query)){ //hace la respectiva consulta
                    return $Consulta;
                }else{
                    $respuesta="Error de consulta";
                    return $respuesta;
                }   
            }else{
                $respuesta="Error de Conexion a Base";
                return $respuesta;
            }
        }else{
            $respuesta="error al Conectar con el Host";
            return $respuesta;
        }
    }

    //funcion que permite realizar la conexion
    private function conectar(){

        if($siConecto=mysqli_connect($this->host,$this->user,$this->pass)){
            return $siConecto;
        }else{
            return false;
        }
    }

    //funcion para evitar el sql inyeccion
    public function escape($entrada){
        $entrada=trim($entrada);
        $conect=$this->conectar();
        return mysqli_real_escape_string($conect,$entrada);
    }

    //funcion para mostrar los proyectos segun la sede
    public function proyecto($sede){
        $query="select * from proyecto where programa=".$sede;
        $res=$this->accionPrincipal($query);

        $table="<table border='2'><tr><th>NOMBRE</th><th>DESCRIPCION</th><th>PROGRAMA</th><th>ESTADO</th><th>INTEGRANTE</th><th>ACCIONES</th></tr>";
        while($filas=mysqli_fetch_array($res)){
            if ($filas['id_tutor']==null) {
                $programa=$this->programa("id_prog",$filas['programa']);
                $estado=$this->estadoP("id_estado",$filas['estado_proy']);
                $user=$this->usuario("id_user",$filas['id_user']);
                $table.="<tr><td>".$filas['nom_proyecto']."</td>";
                $table.="<td>".$filas['descri_proyecto']."</td>";
                $table.="<td>".$programa['nom_programa']."</td>";
                $table.="<td>".$estado['nom_estado']."</td>";
                $table.="<td>".strstr($user['nombre']," ",true)." ".strstr($user['apellidos']," ",true)."</td>";
                $table.="<td align='center'><a href='docente.php?pagina=vproy&idproy=".$filas['id_proy']."'>Ver</a></td>";
            }
        }
        $table.="</tr></table>";
        return $table;
    }

    //funcion especial para consulta de la tabla programa
    public function programa($campo,$programa){
        $query="select * from programa where $campo=".$programa;
        $res=$this->accionPrincipal($query);
        $file=mysqli_fetch_array($res);
        return $file;
    }

    //funcion especial para consulta de la tabla stdo_proy
    public function estadoP($campo,$estado){
        $query="select * from stdo_proy where $campo=".$estado;
        $res=$this->accionPrincipal($query);
        $file=mysqli_fetch_array($res);
        return $file;
    }

    //funcion especial para consulta de la tabla facultad
    public function facultad($campo,$facultad){
        $query="select * from facultad where $campo=".$facultad;
        $res=$this->accionPrincipal($query);
        $file=mysqli_fetch_array($res);
        return $file;   
    }

    //funcion especial para consulta de la tabla usuario
    public function usuario($campo,$user){
        $query="select * from usuario where $campo=".$user;
        $res=$this->accionPrincipal($query);
        $file=mysqli_fetch_array($res);
        return $file;
    }

    //funcion especial para consulta de la tabla sede
    public function sede($campo,$user){
        $query="select * from sede where $campo=".$user;
        $res=$this->accionPrincipal($query);
        $file=mysqli_fetch_array($res);
        return $file;
    }

    //funcion especial para consulta de la tabla rol
    public function rol($campo,$user){
        $query="select * from rol where $campo=".$user;
        $res=$this->accionPrincipal($query);
        $file=mysqli_fetch_array($res);
        return $file;
    }
}

?>