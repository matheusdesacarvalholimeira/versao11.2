<?php

include_once('confignotas.php');



$sql = "SELECT * FROM users WHERE user_type = 'aluno'";
$result = $conexao->query($sql);

if(isset($_POST['professores'])){
   
   $sql = "SELECT * FROM users WHERE user_type = 'professor'";
   $result = $conexao->query($sql);
}elseif(isset($_POST['alunos'])){
    
    $sql = "SELECT * FROM users WHERE user_type = 'aluno'";
    $result = $conexao->query($sql);

}elseif(isset($_POST['cadastar'])){
     header("location: register.php");
}



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
            margin-top: 50px;
            margin-bottom: 30px;
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
    
    <button name="alunos" class="apare btn btn-primary">aluos</button>
    <button name="professores" class="apare btn btn-primary">professores</button>
    <button name="cadastar" class="apare btn btn-primary">Cadastrar</button>
    </form>

   
    
     <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Email </th>
                <th scope="col">Nome do aluno</th>
                <th scope="col">Categoria</th>
                <th scope="col">Momento de login</th>
                
            </tr>
        </thead>
        <thead>
            <?php
                 while($user_data=mysqli_fetch_assoc($result)){
                    echo "<tr>";  
                    echo "<td>".$user_data['id']."</td>";
                    echo "<td>".$user_data['email']."</td>";
                    echo "<td>".$user_data['username']."</td>";
                    echo "<td>".$user_data['user_type']."</td>";
                    echo "<td>".$user_data['created_at']."</td>";
                    
                    echo "</tr>";  
                 }
            ?>
            
        </thead>
        <thead>
                
            </thead>
     </table>
     
           
        
       
        
        
     
         

     
</body>
</html>