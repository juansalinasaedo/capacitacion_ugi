<?php

// ejemplo de autenticación
$ldaprdn  = 'jfsalinas';     // ldap rdn or dn
$ldappass = 'password';  // associated password

$dominio="minpublico.cl";
$host="172.18.1.7";
$puerto="389";


$usuario=$ldaprdn."@".$dominio;

// conexión al servidor LDAP
$ldapconn = ldap_connect("ldap.example.com")
    or die("Could not connect to LDAP server.");

if ($ldapconn) {

    // realizando la autenticación
    $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);

    // verificación del enlace
    if ($ldapbind) {
        echo "LDAP bind successful...";
    } else {
        echo "LDAP bind failed...";
    }

}

?>