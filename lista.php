<?php

global $wpdb;
$tablename = $wpdb->prefix."customplugin";

// Delete record
if(isset($_GET['delid'])){
  $delid = $_GET['delid'];
  $wpdb->query("DELETE FROM ".$tablename." WHERE id=".$delid);
}
?>
<h1>Lista dos Cadastrados</h1>

<table width='100%' border='1' style='border-collapse: collapse;'>
  <tr>
   <th>S.no</th>
   <th>Name</th>
   <th>Codigo Pais</th>
   <th>Telefone</th>
   <th>Email</th>
   <th>&nbsp;</th>
  </tr>
  <?php
  // Select records
  $entriesList = $wpdb->get_results("SELECT * FROM ".$tablename." order by id desc");
  if(count($entriesList) > 0){
    $count = 1;
    foreach($entriesList as $entry){
      $id = $entry->id;
      $name = $entry->name;
      $codigopais = $entry->codigopais;
      $telefone = $entry->telefone;
      $email = $entry->email;

      echo "<tr>
      <td>".$count."</td>
      <td>".$name."</td>
      <td>".$codigopais."</td>
      <td>".$telefone."</td>
      <td>".$email."</td>
      <td><a href='?page=allentries&delid=".$id."'>Delete</a></td>
      </tr>
      ";
      $count++;
   }
 }else{
   echo "<tr><td colspan='5'>No record found</td></tr>";
 }
?>
</table>