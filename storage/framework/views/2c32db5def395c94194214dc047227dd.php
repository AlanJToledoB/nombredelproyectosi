<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .autocomplete-container {
            position: relative;
            width: 100%;
        }

        .autocomplete-results {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            width: 100%;
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
    <title>Document</title>
</head>

<body>
    

    <?php $__env->startSection('title', 'Llano Esc'); ?>

    <?php $__env->startSection('content_header'); ?>
        <h1>Listado de Materias</h1>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>
        <h1>Materias</h1>
        <a href="<?php echo e(route('admin.materias.create')); ?>" class="btn btn-primary mb-3">Crear Materia</a>
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <table class="table">
            <div class="autocomplete-container">
                <form action="<?php echo e(route('admin.materias.search')); ?>" method="GET">
                    <div class="form-row">
                        <div class="col-s-4 my-1">
                            <input type="text" class="form-control autocomplete-input" placeholder="Ingrese el nombre de la materia..." name="search" id="texto-busqueda" data-url="<?php echo e(route('admin.materias.autocomplete')); ?>">
                            <div class="autocomplete-results" id="autocomplete-results"></div>
                        </div>
                        <div class="col-auto my-1">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search"></i> Buscar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Año</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tabla-materias">
                <?php $__currentLoopData = $materias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($materia->id); ?></td>
                        <td><?php echo e($materia->nombre_materia); ?></td>
                        <td><?php echo e($materia->anios_id); ?></td>
                        <td>
                            <a href="<?php echo e(route('admin.materias.edit', $materia->id)); ?>" class="btn btn-primary">Editar</a>
                            <form action="<?php echo e(route('admin.materias.destroy', $materia->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta materia?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nombre_de_su_proyecto\resources\views/admin/crudMaterias/index.blade.php ENDPATH**/ ?>