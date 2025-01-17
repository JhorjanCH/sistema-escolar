<?php
/**
 * Created By VisualStudioCode
 * User: Informatica Misión Sucre
 * Date: 10/10/2024
 * Time: 7:32am
 */
    if( (isset($_SESSION['mensaje'])) && (isset($_SESSION['icono'])) ){
        $mensaje = $_SESSION['mensaje'];
        $icono = $_SESSION['icono'];
    ?>
    <script>
        Swal.fire({
            position: "top",
            icon: "<?=$icono;?>",
            title: "<?=$mensaje;?>",
            showConfirmButton: false,
            timer: 2500
        });
    </script>
<?php    
    unset($_SESSION['mensaje']);
    unset($_SESSION['icono']);
}
?>