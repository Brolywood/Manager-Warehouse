<!-- incluir archivos requeridos.
	Obtener variables con los datos ingresados en login, la contraseña debe estar dentro de una función hash.
	Verificar que exista el registro en la base de datos.
		Si el registro existe entonces:
			Iniciar sesión.
			Crear variables de sesión a ocupar.
			Asignar los permisos según el cargo. 

		Si no existe el registro enviar una variable para mostra mensaje en pagina de login. 


<?php
include('conexion.php');
$usuario = $_POST['usuario'];
$pass = md5($_POST['pass']);

$consulta = "SELECT * FROM personal WHERE rut = '$usuario' AND contraseña = '$pass'";
$ejecutar = mysqli_query($conexion,$consulta);
$registro = mysqli_fetch_array($ejecutar);

$result = mysqli_num_rows($ejecutar);
if ($result > 0) {
    session_start();
    $_SESSION['activo'] = true;
	$_SESSION['usuario'] = $usuario;
	$_SESSION['nameUser'] = $registro["nombre"]. ' ' .$registro["apellido"];
	$_SESSION['cargo'] = $registro["cargo"];
    if($usuario == '180332403'){	
        header("Location:principalAdmin.php");
    }elseif($usuario == '153204209'){
        header("Location:principalBodega.php");
    }
}else{
    header("Location:login.php?error=si");
}

?>


   

