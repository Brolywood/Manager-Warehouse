
<!-- incluir archivos requeridos.
	Verificar la confirmación de la contraseña.
		Recuperar las variables con los datos ingresados en el formulario. 
		Validar que el rut ingresado no se encuantre en la base de datos.
			Si ya existe un registro vinculado al rut ingresado:
				Redirigir a login y entregar mensaje.

			Si no existe:
			Insertar datos en tabla correspondiente.
			Redirigir a login y mostrar mensaje.

	Si las contraseñas no existen redirigir a login y mostrar mensaje. -->  

<?php
include ('conexion.php');

$rut = $_POST['rut'];
$validacion = "SELECT * FROM personal WHERE rut = '$rut'";
$ejecutar = mysqli_query($conexion,$validacion);
$result = mysqli_num_rows($ejecutar);
if($result == 0){
	if ($_POST['contrasena1'] == $_POST['contrasena2']){
    
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$cargo = $_POST['cargo'];
		$contraseña = md5($_POST['contrasena2']);
		$consulta = "INSERT INTO personal (rut, nombre, apellido, cargo, contraseña) VALUES
		('$rut', '$nombre', '$apellido', '$cargo', '$contraseña')";
	
		$ejecutar = mysqli_query($conexion,$consulta) or die ("no se puedo crear el registro");
	
		header("Location:crear_personal.php?valida=si");
	}else{
		header("Location:crear_personal.php?erronea=si");
	}	
}else{
	header("Location:crear_personal.php?existe=si");;
};

?>
