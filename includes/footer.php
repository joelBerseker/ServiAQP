<?php
include('global_variable.php');
?>
<footer class="footer-area footer" id="sticky-footer">
    <div class="container">
        <div class="row">
            <div class="col-4 pt-3" align="center">
                <ul class="lista-footer">
                    <li><b><a class="item-footer" href="<?php echo $dirEjec ?>/Intercambio">Servicios</a></b></li>
                    <li><b><a class="item-footer" href="<?php echo $dirEjec ?>/Categoria">Categorias</a></b></li>
                    <li><b><a class="item-footer" href="<?php echo $dirEjec ?>/Nosotros">Nosotros</a></b></li>
                </ul>
            </div>
            <div class="col-4 pt-5">
                <div align="center">
                    <img src="<?php echo $dirEjec ?>/frontend/images/logo.png" alt="logo de S4P" style="height: 50%;width: 50%;">

                </div>
            </div>
            <div class="col-4 pt-3" align="center">
                <ul class="lista-footer">
                    <li><b><a class="item-footer" href="<?php echo $dirEjec ?>/Contactanos">Contactanos</a></b></li>
                    <li><b><a class="item-footer" href="<?php echo $dirEjec ?>/Autenticacion/Login">Ingresar</a></b></li>
                    <li><b><a class="item-footer" href="<?php echo $dirEjec ?>/Autenticacion/Singup">Registrarse</a></b></li>
                </ul>
            </div>
        </div>
    </div>

    <hr class="mt-0 mb-2 hr-background">

    <div class=" text-center pb-3 item-footer">© 2020 Copyright:
        <a href="/"> ServiAQP</a>
    </div>
</footer>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="<?= $dirEjec ?>/frontend/bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>

<script src="<?= $dirEjec ?>/frontend/scritps/script_servicio.js"></script>
<script src="<?= $dirEjec ?>/frontend/scritps/script_notificacion.js"></script>
<script>
    $(document).ready(function() {
        <?php if (!empty($user)) { ?>
            notification_push();
            setInterval(notification_push, 3000);
        <?php } ?>
    });
</script>
</body>

</html>