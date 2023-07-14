<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">

    <title>Formulario</title>

    <style>
        body {
            background-color: #020617;
        }

        .container {
            width: 400px;
            margin: 0 auto;
            position: relative;
            top: 100px;
        }

        form {
            background-color: #0a0e23;
            padding: 20px;
            border-radius: 8px;
            height: 250px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #ffffff;
            font-weight: bold;
            margin-bottom: 5px;
        }

        select,
        button {
            width: 100%;
            height: 40px;
            padding: 5px;
            border: none;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #ffffff;
            cursor: pointer;
            width: 95%;
        }

        .modal-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }

        .alert {
            background-color: #28a745;
            color: #ffffff;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2;
        }

        .btn-primary {
            background-color: #007bff;
            color: #ffffff;
            position: absolute;
            bottom: 0;
            right: 0;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .btn-primary,
        .btn-primary:hover,
        .btn-primary:active,
        .btn-primary:focus {
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0069d9;
        }

        .btn-primary:active,
        .btn-primary:focus {
            outline: none;
            background-color: #0069d9;
        }

    </style>

</head>

<body>
    <div class="container">
        <form action="<?php echo e(route('formulario.procesar')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <!-- Campo alumnos_id -->
            <div class="form-group">
                <label for="alumnos_id">Alumno:</label>
                <select name="alumnos_id" id="alumnos_id" class="form-control">
                    <?php $__currentLoopData = $alumnos->groupBy('cursos_id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cursosId => $alumnosGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <optgroup label="Alumnos <?php echo e($cursosId); ?>">
                            <?php $__currentLoopData = $alumnosGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alumno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($alumno->id); ?>" <?php if(old('alumnos_id') == $alumno->id): ?> selected <?php endif; ?>><?php echo e($alumno->apellido); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </optgroup>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Campo materias_id -->
            <div class="form-group">
                <label for="materia_id">Materia:</label>
                <select name="materia_id" id="materia_id" class="form-control">
                    <?php $__currentLoopData = $materias->groupBy('anios_id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aniosId => $materiasGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <optgroup label="Año <?php echo e($aniosId); ?>">
                            <?php $__currentLoopData = $materiasGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($materia->id); ?>" <?php if(old('materia_id') == $materia->id): ?> selected <?php endif; ?>><?php echo e($materia->nombre_materia); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </optgroup>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Otros campos del formulario -->

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <?php if(session('success')): ?>
    <div class="modal-bg">
        <div class="modal-content">
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
            <a href="<?php echo e(route('indice')); ?>" class="btn btn-primary btn-lg">Volver al índice</a>
        </div>
    </div>
    <?php endif; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\nombre_de_su_proyecto\resources\views/formulario.blade.php ENDPATH**/ ?>