<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Alumnos</title>
</head>

<body>
    

    <?php $__env->startSection('title', 'Lista de Alumnos'); ?>

    <?php $__env->startSection('content_header'); ?>
        <h1>Lista de Alumnos</h1>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>
        <div class="container">
            <a href="<?php echo e(route('admin.alumnos.create')); ?>" class="btn btn-primary">Crear nuevo alumno</a>
            <br><br>
            <table class="table">
                <div class="autocomplete-container">
                    <form action="<?php echo e(route('admin.alumnos.search')); ?>" method="GET" class="form-inline mb-3">
                        <div class="input-group">
                            <input type="text" name="texto" class="form-control autocomplete-input"
                                placeholder="Buscar por DNI del alumno..." id="texto-busqueda" autocomplete="off">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i> Buscar
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="autocomplete-results" id="autocomplete-results"></div>
                </div>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>DNI</th>
                        <th>Apellido</th>
                        <th>Celular</th>
                        <th>Curso</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $alumnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alumno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($alumno->id); ?></td>
                            <td><?php echo e($alumno->DNI); ?></td>
                            <td><?php echo e($alumno->apellido); ?></td>
                            <td><?php echo e($alumno->celular); ?></td>
                            <td><?php echo e($alumno->curso->nombre_curso); ?></td>
                            <td>
                                <a class="btn btn-primary"
                                    href="<?php echo e(route('admin.alumnos.edit', $alumno->id)); ?>">Editar</a>

                                <form action="<?php echo e(route('admin.alumnos.destroy', $alumno->id)); ?>" method="POST"
                                    style="display: inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('css'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/admin_custom.css')); ?>">
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('js'); ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                var input = $('#texto-busqueda');
                var resultsContainer = $('#autocomplete-results');
                var timeout;

                input.on('input', function() {
                    clearTimeout(timeout);

                    var query = input.val();

                    if (query.length >= 2) {
                        timeout = setTimeout(function() {
                            $.ajax({
                                url: '<?php echo e(route("admin.alumnos.autocomplete")); ?>',
                                method: 'GET',
                                data: { query: query },
                                success: function(response) {
                                    resultsContainer.empty();

                                    if (response.length > 0) {
                                        $.each(response, function(index, item) {
                                            resultsContainer.append('<div class="autocomplete-item">' + item + '</div>');
                                        });
                                        resultsContainer.show();
                                    } else {
                                        resultsContainer.hide();
                                    }
                                },
                                error: function() {
                                    resultsContainer.empty();
                                    resultsContainer.hide();
                                }
                            });
                        }, 300);
                    } else {
                        resultsContainer.empty();
                        resultsContainer.hide();
                    }
                });

                resultsContainer.on('click', '.autocomplete-item', function() {
                    var value = $(this).text();
                    input.val(value);
                    resultsContainer.empty();
                    resultsContainer.hide();
                });
            });
        </script>
    <?php $__env->stopSection(); ?>

</body>

</html>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nombre_de_su_proyecto\resources\views/admin/indexAlumnos.blade.php ENDPATH**/ ?>