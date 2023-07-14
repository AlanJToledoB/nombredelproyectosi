<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .autocomplete-container {
            position: relative;
        }

        .autocomplete-results {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            width: 50%;
            background-color: #eeeaea;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-top: none;
            display: none;
        }

        .autocomplete-item {
            padding: 5px 10px;
            cursor: pointer;
        }

        .autocomplete-item:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    

    <?php $__env->startSection('title', 'Llano Esc'); ?>

    <?php $__env->startSection('content_header'); ?>
        <h1>Listado de Inscripciones</h1>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>
        <div class="container">
            <a href="<?php echo e(route('admin.settings.inscripciones.create')); ?>" class="btn btn-primary">Crear nueva
                inscripción</a>
            <br><br>



            <table class="table">
                <div class="autocomplete-container">
                    <form action="<?php echo e(route('admin.inscripciones.search')); ?>" method="GET" class="form-inline mb-3">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control autocomplete-input" placeholder="Buscar por DNI del alumno..."
                                id="texto-busqueda" data-url="<?php echo e(route('admin.alumnos.autocomplete')); ?>">
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
                        <th>DNI del Alumno</th>
                        <th>Alumno</th>
                        <th>Materia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $inscripciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inscripcion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($inscripcion->id); ?></td>
                            <td><?php echo e($inscripcion->alumno->DNI); ?></td>
                            <td><?php echo e($inscripcion->alumno->apellido); ?></td>
                            <td><?php echo e($inscripcion->materia->nombre_materia); ?></td>
                            <td>
                                <a href="<?php echo e(route('inscripciones.edit', $inscripcion->id)); ?>"
                                    class="btn btn-primary">Editar</a>

                                <form action="<?php echo e(route('inscripciones.destroy', $inscripcion->id)); ?>" method="POST"
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
                                url: input.data('url'),
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nombre_de_su_proyecto\resources\views/admin/settings.blade.php ENDPATH**/ ?>