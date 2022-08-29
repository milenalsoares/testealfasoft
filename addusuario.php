<?php

global $wpdb;


if(isset($_POST['but_submit'])){

  $name = $_POST['txt_name'];
  $codigopais= $_POST ['txt_codigopais'];
  $telefone = $_POST['txt_telefone'];
  $email = $_POST['txt_email'];
  $tablename = $wpdb->prefix."customplugin";

 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo $emailErr = "Invalid email format";
        } else if($name != '' && $codigopais != '' && $telefone != '' && $email != ''){
     $check_data = $wpdb->get_results("SELECT * FROM ".$tablename." WHERE telefone='".$telefone."' ");
     if(count($check_data) == 0){
       $insert_sql = "INSERT INTO ".$tablename."(name,codigopais,telefone,email) values('".$name."','".$codigopais."','".$telefone."','".$email."') ";
       $wpdb->query($insert_sql);
       
     
       echo "Save sucessfully.";
     }
   }
}

?>
<h1>Adicionar Novo Usuário</h1>
<form method='post' action=''>
  <table>
    <tr>
      <td>Nome</td>
      <td><input type='text' name='txt_name'></td>
    </tr>
    <tr>
     <td>Codigo Pais</td>
     <td><input type='text' name='txt_codigopais'></td>
    </tr>
    <tr>
     <td>Telefone</td>
     <td><input type='text' name='txt_telefone'></td>
    </tr>
    <tr>
     <td>E-mail</td>
     <td><input type='text' name='txt_email'></td>
    </tr>
    <tr>
     <td>&nbsp;</td>
     <td><input type='submit' name='but_submit' value='Submit'></td>
    </tr>
 </table>
</form>