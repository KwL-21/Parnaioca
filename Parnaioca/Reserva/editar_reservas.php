<?php //session_start(); 
 include_once './validar.php';

if($_SESSION["perfil"] == "user"){
 header("Location:Parnaioca/painel.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $idMatricula = $_GET["idReserva"];
            include_once './conexao.php';
            
            $sql = "select * from reserva where idReserva = ".$idMatricula;            
            $result = mysqli_query($con, $sql);           
            $row = mysqli_fetch_array($result);
            $idMatricula = $row['idreserva'];  
                  ?>        
        <h3>Editar Cadastro</h3>

        <form action="/Reserva/atualizar_reserva.php" method="post">    
            
        <input type="hidden" readonly="true" name="idusuario" value="<?php echo $row['idreserva'] ?>"/>

        <select name="acomodacoes">
                <option value="">Selecione</option>
                <option value="Suite_parnaioca">Suite Parnaioca</option>
                <option value="Suite_Lagoa_azul">Suite Lagoa azul</option>
                <option value="Suite_Lopes_Mendes">Suite Lopes Mendes</option>
                <option value="Apartamento_1">Apartamento 1</option>
                <option value="Apartamento_2">Apartamento 2</option>
                <option value="Apartamento_3">Apartamento 3</option>
                <option value="Apartamento_4">Apartamento 4</option>
                <option value="Apartamento_5">Apartamento 5</option>
                <option value="Apartamento_6">Apartamento 6</option>
                <option value="Apartamento_7">Apartamento 7</option>
                <option value="Apartamento_8">Apartamento 8</option>
                <option value="Apartamento_9">Apartamento 9</option>
                <option value="Apartamento_10">Apartamento 10</option>
            </select><br/>
    
              Data de Inicio:<br/>
              <input type="text" name="inicio" class="required" id="dtinicio"/><br/>
    
             Data de Termino:<br/>
             <input type="text" name="final" class="required" id="dtfinal"/><br/>
    
             Cpf:<br/>
             <input type="text" name="cpf" class="required" id="cpf"/><br/>
            
            Situação da reserva:<br/>
            <input type="radio" name="situacao" value="cancelado"/>Cancelar reserva
            <input type="radio" name="situacao" value="ocupado"/>Uso imediato
            <input type="radio" name="situacao" value="reservado"/> Reservar acomodação
            <br/>
            
           
            <input type="submit" value="Enviar" />
            
        </form>        
        
    </body>
</html>