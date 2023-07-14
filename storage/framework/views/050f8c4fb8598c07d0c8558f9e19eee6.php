<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

<?php $__env->startSection('title', 'Editar Alumno'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Editar Alumno</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <form action="<?php echo e(route('admin.alumnos.update', $alumno->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="DNI">DNI:</label>
                <input type="text" class="form-control" id="DNI" name="DNI" value="<?php echo e($alumno->DNI); ?>" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo e($alumno->apellido); ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input type="text" class="form-control" id="celular" name="celular" value="<?php echo e($alumno->celular); ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="cursos_id">Curso:</label>
                <select class="form-control" id="cursos_id" name="cursos_id" required>
                    <option value="">Seleccione un curso</option>
                    <?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($curso->id); ?>" <?php if($curso->id === $alumno->curso->id): ?> selected <?php endif; ?>>
                            <?php echo e($curso->nombre_curso); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

</body>
</html>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nombre_de_su_proyecto\resources\views/admin/editAlumnos.blade.php ENDPATH**/ ?>