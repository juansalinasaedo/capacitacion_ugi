<?php
                


function Conectarse()
{
                $link = mysqli_connect('127.0.0.1', 'root', '') or die('No se pudo conectar: ' . mysqli_error());

                mysqli_select_db($link, 'capacitaciones') or die('No se pudo seleccionar la base de datos');
                
                mysqli_set_charset($link, 'utf8');
                
                return $link;

}


             

?>
