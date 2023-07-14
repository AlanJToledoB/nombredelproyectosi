<!DOCTYPE html>
<html>
<head>
    <title>Materias</title>
    <style>
        body {
            background-color: #020617;
            color: #FFFF;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            border-bottom: 1px solid #FFFFFF;
            padding-bottom: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #FFFFFF;
        }

        th {
            background-color: #1E293B;
        }

        td {
            background-color: #1E293B;
        }

        a {
            color: #FFFF;
            text-decoration: none;
        }

        a.btn-success {
            color: #FFFF;
            text-decoration: none;
        }

        a.btn-success:hover {
            text-decoration: none;
        }

        .btn {
            background-color: #166533;
            color: #FFFF;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #052E16;
        }

        .btn-primary {
            background-color: #3182CE;
        }

        .btn-primary:hover {
            background-color: #2C5282;
        }

        tbody tr:not(:last-child) {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Materias</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Materia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $materias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><a href="<?php echo e(route('inscribir', $materia->id)); ?>"><?php echo e($materia->nombre_materia); ?></a></td>
                    <td>
                        <a href="<?php echo e(route('formulario', $materia->id)); ?>" class="btn btn-success">Inscribirme</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>

</html><?php /**PATH C:\xampp\htdocs\nombre_de_su_proyecto\resources\views/materias.blade.php ENDPATH**/ ?>