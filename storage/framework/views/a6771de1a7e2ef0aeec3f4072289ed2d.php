<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscripciones</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/jquery-ui-1.13.2/jquery-ui.min.css')); ?>">
</head>
<style>
    *{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
    }
            body {
            background-color: #020617;
            color: white;
        }

        .container {
            max-width: 768px;
            margin-left: auto;
            margin-right: auto;
            padding: 0 16px;
        }

        h1 {
            text-align: center;
            font-size: 3rem;
            margin-top: 32px;
            margin-bottom: 16px;
        }

        table {
            background-color: #0f192a;
            color: white;
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 16px;
        }

        th, td {
            padding: 8px 16px;
        }

        th {
            font-weight: bold;
            text-align: left;
        }

        a {
            display: inline-block;
            background-color: #0f192a;
            color: white;
            padding: 8px 16px;
            margin-top: 16px;
            text-decoration: none;
        }

        a:hover {
            background-color: #152535;
        }

        /* estilos buscador */
        .search-form {
      display: flex;
      align-items: center;
    }

    .search-input {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      flex: 1;
    }

    .search-button {
      padding: 8px 16px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      margin-left: 8px;
      cursor: pointer;
    }
    .vista_previa{
        width:fit-content;
        margin:auto;
        margin-top: 20px;
        margin-bottom: 20px;
    }
</style>
<body class="bg-gray-900 text-white">


    <div class="container mx-auto px-4">
        <h1 class="text-center text-3xl my-8">Listado de Inscripciones</h1>
        <form class="search-form mb-8" action="<?php echo e(route('buscar.materia')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="text" class="search-input" id="buscar" placeholder="Ingrese Materia a Buscar..." name="search">
            <button type="submit" class="search-button">Buscar</button>
        </form>
        <h3 class="vista_previa text-center text-3xl my-8">vista previa</h3>
        <table class="bg-blue-900 text-white w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Alumno</th>
                    <th class="px-4 py-2">Materia</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $inscripciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inscripcion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="px-4 py-2"><?php echo e($inscripcion->id); ?></td>
                    <td class="px-4 py-2"><?php echo e($inscripcion->alumno->apellido); ?></td>
                    <td class="px-4 py-2"><?php echo e($inscripcion->materia->nombre_materia); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <a href="<?php echo e(route('indice')); ?>" class="bg-blue-900 text-white px-4 py-2 mt-4 inline-block no-underline">Volver al índice</a>
    </div>

    
    <script src="https://cdn.tailwindcss.com/2.2.17@tailwind.js"></script>
    <script src="<?php echo e(asset('vendor/jquery/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery-ui-1.13.2/jquery-ui.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#buscar').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: '<?php echo e(route('buscador.alumnos')); ?>',
                        dataType: 'json',
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                minLength: 2, // Cambia el número mínimo de caracteres para iniciar la búsqueda
                select: function(event, ui) {
                    // Lógica a ejecutar cuando se selecciona un elemento del autocompletado
                    console.log(ui.item); // Puedes revisar el objeto seleccionado en la consola
                }
            });
        });
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\nombre_de_su_proyecto\resources\views/inscripciones.blade.php ENDPATH**/ ?>