<?php
class database 
{
    private $pdolocal;
    private $user = "root";
    private $password = "sonicyael";
    private $server = "mysql:host=localhost;dbname=bd_cem";

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

    function ejecutar($consulta)
    {
        try
        {
            $this->pdolocal->query($consulta);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
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
}
?>