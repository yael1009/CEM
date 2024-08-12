<?php
class database 
{
    private $pdolocal;
    private $user = "root";
    private $password = "";
 /*  // private $user = "".$_SESSION['usuario']."";
   // private $password = "contraseñainvitado";*/
    private $server = "mysql:host=127.0.0.1;dbname=bd_cem";

    function conectardb()
    {
        try
        {   
            $this->pdolocal = new PDO($this->server,$this->user,$this->password);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    /*public function __construct($usuario)
    {
        try
        {
            $this->pdolocal = null;

            $this->pdolocal = new PDO($this->server,'invitado','contraseñainvitado');
            if (isset($_SESSION['usuario'])) {
                $resultado = $this->pdolocal->query("CALL PASSWORDSILLA('".$this->user."', @passIn)");
                $resultado = $this->pdolocal->query("SELECT @passIn AS passIn");
                $fila = $resultado->fetch(PDO::FETCH_OBJ);    
                $this->pdolocal = new PDO($this->server,$this->user,$fila->passIn);
            }
            
            if($usuario !== "invitado"){
                $stmt = $this->pdolocal->prepare("CALL buscar_contraseña(:usuario, @passIn)");
                $stmt->bindParam(':usuario', $usuario);
                $stmt->execute();

                $stmt = $this->pdolocal->prepare("SELECT @passIn AS passIn");
                $stmt->execute();
                $fila = $stmt->fetch(PDO::FETCH_OBJ);

               $conn = mysqli_connect($this->server, $usuario, $fila->passIn);
if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
}

               // $hashedPassword = password_hash($fila->passIn, PASSWORD_DEFAULT);


                $this->pdolocal = null;
                $this->pdolocal = new PDO($this->server,$usuario,$fila->passIn);


            $resultado = $this->pdolocal->query("CALL buscar_contraseña('".$usuario."', @passIn)");
            $resultado = $this->pdolocal->query("SELECT @passIn AS passIn");
            $fila = $resultado->fetch(PDO::FETCH_OBJ);
            echo "Retrieved password: " . $fila->passIn; // Add this line

            //$this->pdolocal = new PDO($this->server,$usuario,$fila->passIn);
            //$this->pdolocal->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $fila->passIn;
            }            
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }*/

    function desconectardb()
    {
        try
        {
            $this->pdolocal = null;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    //Es para un select de varios registros
    function seleccionar($consulta)
    {
        try
        {
            $resultado = $this->pdolocal->query($consulta);
            $fila = $resultado->fetchAll(PDO::FETCH_OBJ);
            return $fila;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    //Es para el insert into
    function ejecutar($consulta)
    {
        try
        {
            $this->pdolocal->query($consulta);
            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }
    }

    public function preparar($query) 
    {    try
        {
            return $this->pdolocal->prepare($query);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    //Cuenta los registros que se regresa
    public function contar($query) 
    {
        try
        {
            $stmt = $this->pdolocal->prepare($query);
            $stmt->execute();            
            return $stmt->rowCount();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    //Al usar count en la bd, regresa el resutado
    public function contar_resultados($query) 
    {
        try
        {
            $stmt = $this->pdolocal->prepare($query);
            $stmt->execute();            
            return $stmt->fetchColumn();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    //Es para un select que unicamnete regrese 1 registro
    function seleccionar1($consulta)
    {
        try
        {
            $resultado = $this->pdolocal->query($consulta);
            $fila = $resultado->fetch(PDO::FETCH_OBJ);
            return $fila;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
/*
    public function ejecutarQuery($query)  //, $params = [])
{
    try
    {
        // Preparar la consulta
       // $stmt = $this->pdolocal->prepare($query);
        
        // Ejecutar la consulta con parámetros
        $stmt= $this->pdolocal->execute($query);
        
        // Para consultas SELECT, puedes retornar los resultados
       // if (stripos($query, 'SELECT') === 0)
       // {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
      //  }
        // Para consultas INSERT, UPDATE, DELETE, puedes retornar el número de filas afectadas
       // else
       // {
       //     return $stmt->rowCount();
       // } 
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

public function executeQuery($query, $params = [], $useBindValue = true) {
    try {
        $this->stmt = $this->pdo->prepare($query);

        // Vincular parámetros
        foreach ($params as $param => &$value) {
            if ($useBindValue) {
                $this->stmt->bindValue($param, $value);
            } else {
                $this->stmt->bindParam($param, $value);
            }
        }

        $this->stmt->execute();
        return $this->stmt;
    } catch (PDOException $e) {
        $this->error = $e->getMessage();
        echo $this->error;
        return false;
    }
}

public function executeQueryq($query, $params = [], $useBindValue = true) {
    try {
        $this->stmt = $this->pdo->prepare($query);

        // Vincular parámetros
        foreach ($params as $param => $value) {
            if ($useBindValue) {
                $this->stmt->bindValue($param, $value);
            } else {
                $this->stmt->bindParam($param, $value); // <--- Agrega el ampersand (&) aquí
            }
        }

        $this->stmt->execute();
        return $this->stmt;
    } catch (PDOException $e) {
        $this->error = $e->getMessage();
        echo $this->error;
        return false;
    }
}

    // Método para ejecutar consultas
    public function ejecutarQuery($query, $params = []) {
        try {
            $stmt = $this->pdolocal->prepare($query);

            // Vincular parámetros
            foreach ($params as $param => $value) {
                $stmt->bindValue($param, $value);
            }

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function executeQuery($query, $params = []) {
        try {
            $this->stmt = $this->pdo->prepare($query);
            foreach ($params as $param => $value) {
                $this->$stmt->bindValue($param, $value);
            }
            $this->stmt->execute();
            return $this->stmt;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
            return false;
        }
    }

    public function executeQueryy($query, $params = []) {
        try {
            $this->stmt = $this->pdo->prepare($query);
            foreach ($params as $param => $value) {
                $this->stmt->bindValue($param, $value);
            }
            $this->stmt->execute();
            return $this->stmt;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
            return false;
        }
    }
*/
}
?>