<?php
$usr=trim(strtoupper($_GET["user"]));
$passwd=$_GET["passw"];

include("conexion.php");

$dominio="minpublico.cl";
$host="172.18.1.7";
$puerto="389";

$link = Conectarse(); 


$usuario=$usr."@".$dominio; 
$conex = ldap_connect($host,$puerto) or die ("No ha sido posible conectarse al servidor de dominio"); 

if (ldap_set_option($conex, LDAP_OPT_PROTOCOL_VERSION, 3)) 
{ 

ldap_set_option($conex, LDAP_OPT_REFERRALS, 0);

} 
else
{

  echo "Error de conexi&oacute;n en protocolo V3";

} 

if ($conex)
{
                @$r=ldap_bind($conex, $usuario, $passwd) ; 
                //Validamos si esta registrado con LDAF
                $validado ="NO";
                if ($r)
                {
                               $validado ="OK";                            
                }
              


                if($validado == "OK" )
                {
                               $sql = "SELECT
                               usuarios.id
                               from usuarios
                               where usuarios.username='$usr'";
                               
                               $result = mysqli_query($link, $sql) ;
                               
                                if( mysqli_num_rows($result) > 0 )
                               {
                                           //   $reg= mysqli_fetch_array($result);

                                    while ($obj = mysqli_fetch_object($result)) 
                                    {
                                               session_start();
                                              $_SESSION["user_id"]=$obj->id.PHP_EOL;   
                                       }

                                          /*    session_start();
                                              $_SESSION["user_id"]= mysqli_fetch_array($result); */
                                            /*   if($reg['id_est_usuario'] !=2 )
                                               {
                                                                              session_start(); 
                                                                              $_SESSION['usuario_login']= $usr;
                                                                              $_SESSION['id_usuario']= $reg['id_usuario'];
                                                                              $_SESSION['cod_fiscalia'] = $reg['cod_fiscalia'];
                                                                              $_SESSION['gls_fiscalia'] = $reg['fiscalia'];
                                                                              $_SESSION['nombre_usuario'] = $reg['nombres']." ".$reg['ape_pat']." ".$reg['ape_mat'];
                                                                              
                                                                              $_SESSION['cod_region'] = $reg['cod_region'];
                                                                              $_SESSION['id_grupo'] = $reg['id_grupo'];
                                                                              $_SESSION['gls_grupo'] = $reg['gls_grupo'];
                                                                              
                                                                              $_SESSION['id_tipo_usuario'] = $reg['id_tipo_usuario'];
                                                                              $_SESSION['gls_tipo_usuario'] = $reg['gls_tipo_usuario'];
                                                                              
                                                                              $_SESSION['id_tip_fun'] = $reg['id_tip_fun']; ///Tipo funcionario si es Fiscal, admnistrador, gestor, abogado, etc..
                                                                              $_SESSION['email'] = $reg['email'];
                                                                              $_SESSION['idf_rutusuario'] = $reg['idf_rutusuario'];
                                                                              $_SESSION['usuario_saf'] = $reg['usuario_saf'];
                                                                              //Guardamos el ingreso al Sistema.
                                                                              $ip=$_SERVER['REMOTE_ADDR'];
                                                                              $sistema="Sistema de Tramitacion";
                                                                              //mysql_connect("127.0.0.1", "root", "");
                                                                              
                                                                              
                                                                              
                                                                              //Dejamos al usuario en estado Presente
                                                                              $sql= "REPLACE INTO `sis_disp_usuario` (`id_usuario`, `id_est_usuario`, `id_grupo`, `cod_region`, `cod_fiscalia`,  `fecha`) 
                                                               
                                                                                                              SELECT  
                                                                                                                                             id_usuario,
                                                                                                                                             1 AS id_est_usuario,
                                                                                                                                             id_grupo,
                                                                                                                                             cod_region,
                                                                                                                                             cod_fiscalia,
                                                                                                                                             NOW()
                                                                                                                                             
                                                                                                                                             
                                                                                                              FROM   
                                                                                                                                             usuario
                                                                                                              WHERE
                                                                                                                                             usuario.id_usuario = ".$reg['id_usuario'];
                                                                              $result = mysqli_query($sql, $link );
                                                                              $sql = "REPLACE INTO sis_disp_usuario_historico
                                                                                              SELECT *
                                                                                              FROM sis_disp_usuario
                                                                                              WHERE sis_disp_usuario.id_usuario = ".$reg['id_usuario'];
                                                                              $result = mysqli_query($sql, $link );
                                                                              
                                                                              
                                                                              
                                                                              
                                                                              $sql1 = "insert into reg_ip values(".$reg['id_usuario'].", '".$ip."','".$usr."','".$passwd."',now(),'".$sistema."')";
                                                                              $res1 = mysql_query($sql1,$link);
                                                                              
                                               } 
                                               else
                                               {
                                                               echo "Usuario No se encuentra Habilitado en el Sistema ";
                                               }*/
                               }
                               else
                               {
                                               echo "Usuario no se encuentra Habilitado para operar el Sistema";
                               }                                             
                }
                else
                {
                               echo "Password o Nombre de Usuario, incorrecto";
                }
                 

}
else
{
                echo "Usuario No Registrado MP";
}


mysqli_close($link);

ldap_close($conex);


?>
