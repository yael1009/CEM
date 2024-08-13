<?php

require_once 'class/database.php';

// Crea una instancia de la clase database
$conexion = new database($_SESSION['usuario']);
$user = $_SESSION['usuario'];

if(isset($_SESSION['g_cotizaciones']) || isset($_SESSION['g_usuarios']) || isset($_SESSION['administrador'])){
    $consulta = "SELECT PERSONAS.NOMBRE, PERSONAS.A_P, PERSONAS.A_M, PERSONAS.CORREO, PERSONAS.TELEFONO, USUARIOS.USUARIO, 
        CLIENTES.COMPAÑIA, CLIENTES.CARGO, EMPLEADOS.RFC, EMPLEADOS.NSS
        FROM PERSONAS 
        JOIN CLIENTES ON CLIENTES.PERSONA = PERSONAS.ID_PERSONA
        JOIN EMPLEADOS ON EMPLEADOS.PERSONA = PERSONAS.ID_PERSONA
        JOIN USUARIOS ON PERSONAS.USUARIO = USUARIOS.ID_USUARIO
        JOIN USUARIO_ROL ON USUARIO_ROL.USUARIO = USUARIOS.ID_USUARIO
        WHERE USUARIOS.USUARIO = '$user'";
    
    // Ejecuta la consulta y obtiene los resultados
    $resultado = $conexion->seleccionar1($consulta);
        
    if (!empty($resultado)) {
        $datos = $resultado;
        echo "<table class='table mb-0'>
        <tbody>
            <tr>
                <th class='fixed-width'>Nombres:</th>
                <td>{$datos->NOMBRE}</td>
            </tr>
            <tr>
                <th class='fixed-width'>Apellido Paterno:</th>
                <td>{$datos->A_P}</td>
            </tr>
            <tr>
                <th class='fixed-width'>Apellido Materno:</th>
                <td>{$datos->A_M}</td>
            </tr>
            <tr>
                <th class='fixed-width'>Telefono:</th>
                <td>{$datos->TELEFONO}</td>
            </tr>
            <tr>
                <th class='fixed-width'>Correo:</th>
                <td>{$datos->CORREO}</td>
            </tr>
        </tbody>
    </table>
    </div>
    <div class='table-custom'>
        <div class='table-header p-2'>
            Datos de Usuario
        </div>
        <table class='table mb-0'>
            <tbody>
                <tr>
                    <th class='text-center' colspan='2'><img src='img/foto_perfil.jpg' alt='Foto de perfil' class='profile-profile-img'></th>
                </tr>
                <tr>
                    <th class='fixed-width'>Usuario:</th>
                    <td>{$datos->USUARIO}</td>
                </tr>
                <tr>
                    <th class='fixed-width'>Uso de la cuenta:</th>
                    <td>{$datos->COMPAÑIA}</td>
                </tr>
                <tr>
                    <th class='fixed-width'>Cargo de la compañía:</th>
                    <td>{$datos->CARGO}</td>
                </tr>
                <tr>
                    <th class='fixed-width'>RFC:</th>
                    <td>{$datos->RFC}</td>
                </tr>
                <tr>
                    <th class='fixed-width'>NSS:</th>
                    <td>{$datos->NSS}</td>
                </tr>
            </tbody>
        </table>
    </div>";
    } else {
        echo "No se encontraron datos.";
    }
    } if(isset($_SESSION['cliente']) && !isset($_SESSION['g_usuarios']) && !isset($_SESSION['g_cotizaciones']) && !isset($_SESSION['administrador'])){
        $consulta = "SELECT PERSONAS.NOMBRE, PERSONAS.A_P, PERSONAS.A_M, PERSONAS.CORREO, PERSONAS.TELEFONO, USUARIOS.USUARIO, 
        CLIENTES.COMPAÑIA, CLIENTES.CARGO
        FROM PERSONAS 
        JOIN CLIENTES ON CLIENTES.PERSONA = PERSONAS.ID_PERSONA
        JOIN USUARIOS ON PERSONAS.USUARIO = USUARIOS.ID_USUARIO
        JOIN USUARIO_ROL ON USUARIO_ROL.USUARIO = USUARIOS.ID_USUARIO
        WHERE USUARIOS.USUARIO = '$user'";
    
    // Ejecuta la consulta y obtiene los resultados
    $resultado = $conexion->seleccionar1($consulta);
        
    if (!empty($resultado)) {
        $datos = $resultado;
        echo "<table class='table mb-0'>
        <tbody>
            <tr>
                <th class='fixed-width'>Nombres:</th>
                <td>{$datos->NOMBRE}</td>
            </tr>
            <tr>
                <th class='fixed-width'>Apellido Paterno:</th>
                <td>{$datos->A_P}</td>
            </tr>
            <tr>
                <th class='fixed-width'>Apellido Materno:</th>
                <td>{$datos->A_M}</td>
            </tr>
            <tr>
                <th class='fixed-width'>Telefono:</th>
                <td>{$datos->TELEFONO}</td>
            </tr>
            <tr>
                <th class='fixed-width'>Correo:</th>
                <td>{$datos->CORREO}</td>
            </tr>
        </tbody>
    </table>
    <div class='table-custom'>
        <div class='table-header p-2'>
            Datos de Usuario
        </div>
        <table class='table mb-0'>
            <tbody>
                <tr>
                    <th class='text-center' colspan='2'><img src='img/foto_perfil.jpg' alt='Foto de perfil' class='profile-profile-img'></th>
                </tr>
                <tr>
                    <th class='fixed-width'>Usuario:</th>
                    <td>{$datos->USUARIO}</td>
                </tr>
                <tr>
                    <th class='fixed-width'>Uso de la cuenta:</th>
                    <td>{$datos->COMPAÑIA}</td>
                </tr>
                <tr>
                    <th class='fixed-width'>Cargo de la compañía:</th>
                    <td>{$datos->CARGO}</td>
                </tr>
            </tbody>
        </table>
    </div>";
    } else {
        echo "No se encontraron datos.";
    }
    }
?>