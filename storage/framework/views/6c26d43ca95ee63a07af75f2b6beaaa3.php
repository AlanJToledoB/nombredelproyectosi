<!DOCTYPE html>
<html>

<head>
    <title>Escuela Llano</title>
    <link href="<?php echo e(asset('/css/estilos.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    body {
        background-color: #020617;
    }
    
    .perfil-box {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #ffffff;
        padding: 10px;
        border-radius: 4px;
        text-align: center;
    }
    
    .perfil-box a {
        color: #000000;
        text-decoration: none;
    }
    
</style>

<body>
    <div class="container">
        <div class="contenedor-img">
            <img src="https://ia902600.us.archive.org/6/items/logo-llano_202306/logo%20Llano.png" alt="Imagen"
                class="mx-auto w-1 w-48 pb-24">
        </div>
        <div class="contenedor">
            <div class="dropdown-contenedor row justify-content-center">
                <div class="">
                    <button class="px-4 py-2 mx-2 w-250 flex justify-center" type="button"
                        id="planDeEstudioDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Plan de Estudio
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="planDeEstudioDropdown">
                        <?php $__currentLoopData = $anios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('materias', ['anio_id' => $anio->id])); ?>"><li class="dropdown-item"><?php echo e($anio->nombre_anio); ?></li></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            
            <div class="boton-inscripcion flex items-center justify-center">
                <a href="<?php echo e(route('formulario')); ?>" class="btn-custom px-4 py-2 mx-2">Ingresar a la Inscripción</a>
            </div>
            <div class="boton-planilla flex items-center justify-center">
                <a href="<?php echo e(route('inscripciones')); ?>" class="btn-custom px-4 py-2 mx-2">Ingresar a la Planilla</a>
            </div>
            
            <div class="perfil-box">
                <?php if(auth()->guard()->check()): ?>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" id="perfilDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo e($user->name); ?>

                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="perfilDropdown">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.index')): ?>
                            <li><a class="dropdown-item" href="<?php echo e(route('admin.index')); ?>">Dashboard</a></li>
                            <?php endif; ?>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a></li>
                        </ul>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                <?php endif; ?>
                <?php if(auth()->guard()->guest()): ?>
                    <a href="<?php echo e(route('login')); ?>">Iniciar Sesión</a>
                <?php endif; ?>
            </div>
            

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\nombre_de_su_proyecto\resources\views/index.blade.php ENDPATH**/ ?>