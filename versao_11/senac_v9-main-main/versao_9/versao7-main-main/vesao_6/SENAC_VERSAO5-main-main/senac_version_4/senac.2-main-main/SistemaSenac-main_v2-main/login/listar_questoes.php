<?php

include_once('confignotas.php');

$filtrar_materias = $_POST['filtrar_materias'];


if(isset($_POST['filtar'])){
    $sql = "SELECT * FROM add_questoes where materia = '".$filtrar_materias."'";
    $result = $conexao->query($sql);
}

if(isset($_POST['lista_questoes'])){
    header('location: professores.php');
  }

//$sql = "SELECT * FROM add_questoes";
//$result = $conexao->query($sql);

$sqlm = "SELECT * FROM materias";
$resultma = $conexao->query($sqlm);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body{ 
            font: 14px sans-serif; 
            height: 100%;
            
            color: white;
        }

       .table{
            color: white;
            background-image: linear-gradient(to top right , #3103e5, #f5890c);
        }


        .apare{
            margin-bottom: 16px;
        }

        .btn{
            width: 200px;
            margin-left: 50px;
            margin-bottom: 10px;
            background-color: #3103e5;
            border: none;
            border-radius: 50px;
            
        }
        th{
            text-align: center;
        }
        td{
            text-align: center;
        }
        
        </style>
</head>
<body>
   
 
    <form action="" method="post">
    <input type="submit" class="apare btn btn-primary" value="Liste de questôes" name="lista_questoes">
    </form><br>
    <form action="" method="post">
    <label for="">Filtrar:</label>
    <select name='filtrar_materias'>
          <?php 
             while($user_data2=mysqli_fetch_assoc($resultma)){
              echo '<option value="'.$user_data2['materia'].'">'.$user_data2['materia'].'</option>';
            }
          ?>
    </select><br>
    <input type="submit" value="Filtrar" name="filtar" class="apare btn btn-primary">
    </form>
    
     <table class="table">
        <thead>
            <tr>
                <th scope="col">id_questoes </th>
                <th scope="col">numerecao </th>
                <th scope="col">questa </th>
                <th scope="col">nivel </th>
                <th scope="col">gabarito </th>
                <th scope="col">Escolha </th>
                <th scope="col">editar</th>
            </tr>
        </thead>
        <thead>
        
            <?php
                echo '<form action="senac.php" method="get">';
                 while($user_data=mysqli_fetch_assoc($result)){
                    echo "<tr name='so_vai'>";  
                    echo "<td>".$user_data['id_questoes']."</td>";
                    echo "<td>".$user_data['numerecao']."</td>";
                    echo "<td>".$user_data['questao']."</td>";
                    echo "<td>".$user_data['nivel']."</td>";
                    echo "<td>".$user_data['gabarito']."</td>";
                    echo "<td><input type='checkbox' name='enviar-questoes[]' id='enviar-questoes' class='btn-sm btn btn-primary' value='".$user_data["id_questoes"]."'></td>";
                    echo "<td><input type='button' name='enviar-questoes' id='enviar-questoes' class='btn-sm btn btn-primary' value='".$user_data["id_questoes"]."'></td>";
                    //echo "<td><a href='senac.php?id=$user_data[id_questoes]' class='btn-sm btn btn-primary'>enviar</a></td>";
                    echo "</tr>";  
                 }
                echo "<br><input type='submit' name='submit' class='btn btn-primary'>"; 
                echo '</form>';     
            ?>
            
        </thead>
        <thead>
                
            </thead>
     </table>
     
           
        
       
        
        
     
         

     
</body>
</html>