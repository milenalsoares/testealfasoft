<?php
/*
   Plugin Name: Cadastro
   Description: Cadastro e alteração de usuários.
   Version: 1.0.0
   Author: Milena Soares
*/



function customplugin_table(){

  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();

  $tablename = $wpdb->prefix."customplugin";

  $sql = "CREATE TABLE $tablename (
  id mediumint(11) NOT NULL AUTO_INCREMENT,
  name varchar(80) NOT NULL,
  codigopais varchar (3) NOT NULL,
  telefone varchar(9) NOT NULL,
  email varchar(80) NOT NULL,
  PRIMARY KEY  (id)
  ) $charset_collate;";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );

}
register_activation_hook( __FILE__, 'customplugin_table' );


function customplugin_menu() {

    add_menu_page("Cadastro Usuários", "Plugin Cadastro Usuários","manage_options", "myplugin", "displayList");
    add_submenu_page("myplugin","Lista de Cadastrados", "Lista de Cadastrados","manage_options", "allentries", "displayList");
    add_submenu_page("myplugin","Adicionar Novo", "Adiconar novo usuário","manage_options", "addnewentry", "addEntry");

}
add_action("admin_menu", "customplugin_menu");

function displayList(){
  include "lista.php";
}

function addEntry(){
  include "addusuario.php";
}



