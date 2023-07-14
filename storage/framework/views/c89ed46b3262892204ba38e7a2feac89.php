<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Inscripción</title>
</head>
<body>
    

    <?php $__env->startSection('title', 'Llano Esc'); ?>

    <?php $__env->startSection('content_header'); ?>
    <div class="container">
        <h1>Editar Inscripción</h1>
        <form action="<?php echo e(route('inscripciones.update', $inscripcion->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="alumno">Alumno:</label>
                <select name="users_id" id="alumno" class="form-control">
                    <?php $__currentLoopData = $alumnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alumno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($alumno->id); ?>" <?php echo e($alumno->id == $inscripcion->alumno_id ? 'selected' : ''); ?>>
                            <?php echo e($alumno->apellido); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="materia">Materia:</label>
                <select name="materia_id" id="materia" class="form-control">
                    <?php $__currentLoopData = $materias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($materia->id); ?>" <?php echo e($materia->id == $inscripcion->materia_id ? 'selected' : ''); ?>>
                            <?php echo e($materia->nombre_materia); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <?php $__env->stopSection(); ?>   
</body>
</html>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nombre_de_su_proyecto\resources\views/admin/edit.blade.php ENDPATH**/ ?>