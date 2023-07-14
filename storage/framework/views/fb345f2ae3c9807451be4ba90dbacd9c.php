<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    

    <?php $__env->startSection('title', 'Llano Esc'); ?>

    <?php $__env->startSection('content_header'); ?>
        <h1>Listado de Materias</h1>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('content'); ?>
        <h1>Editar Materia</h1>
        <form action="<?php echo e(route('admin.materias.update', $materia->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="nombre_materia">Nombre</label>
                <input type="text" name="nombre_materia" id="nombre_materia" class="form-control"
                    value="<?php echo e($materia->nombre_materia); ?>" required>
            </div>
            <div class="form-group">
                <label for="anios_id">Año</label>
                <select name="anios_id" id="anios_id" class="form-control" required>
                    <?php $__currentLoopData = $anios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($anio->id); ?>" <?php echo e($materia->anio->id == $anio->id ? 'selected' : ''); ?>>
                            <?php echo e($anio->nombre_anio); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    <?php $__env->stopSection(); ?>

</body>

</html>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nombre_de_su_proyecto\resources\views/admin/crudMaterias/edit.blade.php ENDPATH**/ ?>