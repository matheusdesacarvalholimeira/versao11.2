<?php

//if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  //header("location: login.php");
  //exit;
//}

include_once("confignotas.php");

if(isset($_POST['lista_questoes'])){
  header('location: listar_questoes.php');
}
if(isset($_POST['baco_questoes'])){
  header('location: baco_questoes.php');
}
if(isset($_POST['excluir_prova'])){
    $sql = "drop table questoes_celecionadas";
    $result = $conexao->query($sql);
    $sqldele = "create table questoes_celecionadas(id_questoes int auto_increment primary key,questao text,gabarito text)";
    $result = $conexao->query($sqldele);
}

if(isset($_POST['evii'])){
  
  
  $gabarito = $_POST['gabarito'];
  echo  $gabarito;
  
}

$sqlm = "SELECT * FROM materias";
$resultma = $conexao->query($sqlm);


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Professor</title>
    <style>

      
      label{
        color: black;
      }

      #questao_in{
        border-radius: 5px;
        max-width: 90%;
        max-height: 260px;
        min-height: 259px;
      }

      #questao_in2{
        border-radius: 5px;
        width: 90%;
        max-height: 30px;
        min-height: 10px;
      }


      html{
        height: 100%;
      }

      select{
        border-radius: 5px;

      }

      body{
          font: 14px sans-serif; 
          height: 100%;
          background-image: linear-gradient(to top right , #3103e5, #f5890c);
      }
      .menor{
            align-items: center;
            margin-top: 2px;
            box-shadow: none;
            width: 100%;
            display: flex;
            color: black;
            justify-content: center;
      }
      
      .ajuste{
            width: 200px;
            margin: 30px;
            justify-content: space-between;
            border-radius: 50px;
            
      }

      

      .tito{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
      }

      .modal-content{
        color: black;
        background-color: rgba(1, 1, 1, 0);
        border: none;
        margin-top: 20px;
        column-gap: 40px;
      }

      .materias{
        color: black;
        margin-top: 10px;
      }

      .difeques{
        margin-bottom: 10px;
      }

      .modal-content{
        display: inline-block;
      }

      .btn-close{
        border: none;
      }

      .btn-close:hover{
        background-color: #3103e5;
      }

      .ajuste{
        background-color: #3103e5;
        border: none;
      }

      .centainer_texta{
        width: 100%;
        align-items: center;
        justify-content: center;
      }

      .esconder{
        width: 100%;
        background-color: white;
        border-radius: 20px 20px 20px 20px;
        justify-items: end;
      }

      

     

      
    </style>
</head>
<body>

  
  
    <nav class="navbar navbar-expand-sm " id="bgnav">
        <a class="navbar-brand" href="#">
        <img src="img/logo-senac.png" alt="logo" style="width:65px;" class="logoo">
        </a>
    </nav>    
<div class="maior">
<div class="menor ">      
    
    <input type="submit" class="apare ajuste btn btn-primary" value="ADD Quetões">
    <!-- <form action="" method="post">
    <input type="submit" class="ajuste btn btn-primary " value="Liste de questôes" name="baco_questoes">
    </form> -->
    <form action="" method="post">
    <input type="submit" class="ajuste btn btn-primary" value="Baco de questoes" name="lista_questoes">
    </form>
    <form action="" method="post">
    <input type="submit" class="ajuste btn btn-primary" value="excluir prova" name="excluir_prova">
    </form>
</div>
</div>


    
<div class="esconder">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="tito">
       
        </div>
        <button type="submit" class="btn-close"></button>

        <!--o x para cancelar a quetao-->
      <!--  <button type="submit" class="btn-close" ></button>-->
       
<form action="testes.php" method="post">
      </div>
      <div class="materias">
        <label for="">Materias: </label>
      <select name='materias'>
          <?php 
             while($user_data2=mysqli_fetch_assoc($resultma)){
              echo '<option value="'.$user_data2['materia'].'">'.$user_data2['materia'].'</option>';
            }
          ?>
      </select>
      </div>
      <div class="numques">
        <label for="" class="quess">numero da questao: </label>
        <input type="number" class="quess2" name="numeracao">
      </div>
      
      <div class="area_text">
        <textarea  id="questao_in" name="area_t" rows="5" cols="30" ></textarea>
      </div>

      
      <select id="dif" name="dificuldade" class="difeques" >
          <option value=1>Dificuldade 1</option>
          <option value=2>Dificuldade 2</option>
          <option value=3>Dificuldade 3</option>
          <option value=4>Dificuldade 4</option>
          <option value=5>Dificuldade 5</option>
      </select>
      <div class="modal-footer">

      <label for="" id="gaba" >Gabarito:</label>
      <div class="centainer_texta">
      <textarea  id="questao_in2" name="gabarito" rows="5" cols="30" ></textarea>
      </div> 
      <input type="submit" value="Save changes" class="btn btn-primary" name="evii">

      
      
      </form>
      </div>
    </div>
  </div>
</div>
</div>

<script src="scripts/script_professor.js"></script>
</body>
</html>
