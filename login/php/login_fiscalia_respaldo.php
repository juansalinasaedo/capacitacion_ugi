<?php
$usr=trim(strtoupper($_POST["username"]));
//$usr=$_POST["username"];
$passwd=$_POST["password"];

include("conexion_fiscalia.php");

$dominio="minpublico.cl";
$host="172.18.1.7";
$puerto="389";

/*$usr=$_POST["username"];
$passwd=$_POST["password"]; */

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
                else // Validamos si es ingresado como usuario especial, es decir, sin LDAP
                {
                              $sql="SELECT COUNT(*) AS cant
                                                               FROM usuario_especial
                                                               WHERE usuario_especial.login = '".md5($usr)."'
                                                                                              AND usuario_especial.pass = '".md5($passwd)."'  ";
                               
                              $result = mysqli_query($sql, $link);
                               $reg = mysqli_fetch_array($result);
                               
                               if($reg['cant']>0 )
                               {
                                               $validado ="OK";
                               }
                               

                }


                if($validado == "OK" )
                {
                               $sql = "SELECT 
                                                                              usuario.id_usuario, 
                                                                              usuario.nombres,
                                                                              usuario.ape_pat, 
                                                                              usuario.ape_mat,
                                                                              usuario.cod_fiscalia, 
                                                                              usuario.cod_region, 
                                                                              fiscalia.fiscalia , 
                                                                              usuario.id_grupo, 
                                                                              usuario.email,
                                                                              grupo.gls_grupo,
                                                                              usuario.id_tipo_usuario,
                                                                              tip_usuario.gls_tipo_usuario,
                                                                              usuario.id_tip_fun,
                                                                              usuario.id_est_usuario,
                                                                              usuario.idf_rutusuario,
                                                                              usuario.usuario_saf
                                               FROM usuario
                                               JOIN fiscalia ON (  usuario.login LIKE '".$usr."' 
                                                                                                                                                                            AND usuario.id_est_usuario != 2
                                                                                                                                                             AND usuario.cod_fiscalia = fiscalia.cod_fiscalia )
                                               JOIN grupo ON ( usuario.id_grupo = grupo.id_grupo )
                                               JOIN tip_usuario ON ( usuario.id_tipo_usuario = tip_usuario.id_tipo_usuario )";
                               
                               
                               echo nl2br($sql);

                               $result = mysqli_query($link, $sql);
                               
                                if( mysqli_num_rows($result) > 0 )
                               {
                                              $reg= mysqli_fetch_array($result ) ;
                                               if($reg['id_est_usuario'] !=2 )
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
                                                                              $res1 = mysqli_query($sql1,$link);
                                                                              
                                               }
                                               else
                                               {
                                                               echo "Usuario No se encuentra Habilitado en el Sistema ";
                                               }
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


mysqli_close();

ldap_close($conex);


?>
