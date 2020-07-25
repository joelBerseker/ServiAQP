<?php
    function comprobar($conn,$recurso,$user){
        $a = array(
            "estado"=>-1,
            "mensaje"=>""
        );
        if(isset($user)){
            $RolID    = $user['UsuRolID'];
            $estado   = $user['UsuEstReg']; 
            if($estado==1){
                $query_hacia_tabla_Rol = "SELECT RolEstReg FROM rol WHERE RolId = $RolID";
                $respuesta_de_tabla_Rol = mysqli_query($conn, $query_hacia_tabla_Rol);
                $datos_de_Rol = mysqli_fetch_array($respuesta_de_tabla_Rol);
                $RolEst = $datos_de_Rol['RolEstReg'];
                if($RolEst != 0){
                    $query_de_tabla_Recurso = "SELECT RecId, RecEstReg FROM recurso WHERE RecNom = '$recurso'";
                        $respuesta_de_tabla_Recurso =  mysqli_query($conn, $query_de_tabla_Recurso);
                        if (mysqli_num_rows($respuesta_de_tabla_Recurso) >= 1) {
                            $row = mysqli_fetch_array($respuesta_de_tabla_Recurso);
                            $RecID = $row['RecId'];
                            $RecEst = $row['RecEstReg'];
                            if($RecEst==1){
                                $query_hacia_tabla_Acceso = "SELECT AccEstReg FROM acceso WHERE AccRolId = $RolID && AccRecId = $RecID";
                                $respuesta_de_tabla_Acceso = mysqli_query($conn, $query_hacia_tabla_Acceso);
                                if (mysqli_num_rows($respuesta_de_tabla_Acceso) >= 1) {
                                    $datos_de_Acceso = mysqli_fetch_array($respuesta_de_tabla_Acceso);
                                    $AccEst = $datos_de_Acceso['AccEstReg'];
                                    if($AccEst==1){
                                        $a['estado']=1;
                                        $a['mensaje']="Acceso Concedido";
                                    }else{
                                        $a['estado']=0;
                                        $a['mensaje']="El acceso ha sido desabilitado. \nEnviar mensaje aun adminstrador";
                                    }
                                }else{
                                    $a['estado']=0;
                                    $a['mensaje']="Esta pagina no esta registrado para su acceso a los de su rol";
                                }
                            }else{
                                $a['estado']=0;
                                $a['mensaje']="Esta pagina esta desactivada";
                            }
                        }else{
                            $a['estado']=0;
                            $a['mensaje']="Esta pagina no esta registrado para su acceso";
                        }
                }else{
                    $a['estado']=0;
                    $a['mensaje']="Su rol esta desactivo.\nConsulte con un Administrador";
                }
                if($RolID==1){
                    $a['estado']=1;
                    $a['mensaje']="Acceso concedido";
                }
            }else{
                $a['estado']=0;
                $a['mensaje']="El usuario no esta activo";    
            }
        }else{
            $a['estado']=0;
            $a['mensaje']="Inicia sesion por favor";
        }
       
        return $a;
    }
    $user = array(
        "UsuRolID" => 1,
        "UsuEstReg"=> 1
    );
    include("../includes/data_base.php");
    $b = comprobar($conn,"/rol/crear",$user);
    print_r($b);
?>