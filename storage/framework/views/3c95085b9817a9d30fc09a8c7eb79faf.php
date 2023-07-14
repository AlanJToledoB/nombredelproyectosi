

<?php $__env->startSection('title', 'Llano Esc'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Llano</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo e($materiaCount); ?></h3>
                    <p>Materias</p>
                </div>
                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
                <a href="<?php echo e(route('admin.materias.inscripciones')); ?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo e($alumnosCount); ?></h3>
                    <p>Alumnos</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="<?php echo e(route('admin.alumnos.inscripciones')); ?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo e($inscripcionesCount); ?></h3>
                    <p>Previas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-clipboard-check"></i>
                </div>
                <a href="<?php echo e(route('admin.settings.inscripciones')); ?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Statistics</h3>
                </div>
                <div class="box-body">
                    <canvas id="chart" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>  
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .box {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script> console.log('Hi!'); </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('chart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Materias', 'Alumnos', 'Previas'],
                datasets: [{
                    data: [<?php echo e($materiaCount); ?>, <?php echo e($alumnosCount); ?>, <?php echo e($inscripcionesCount); ?> ],
                    backgroundColor: [
                        'rgba(0, 123, 255, 0.8)',
                        'rgba(255, 193, 7, 0.8)',
                        'rgba(220, 53, 69, 0.8)'
                    ],
                    borderColor: [
                        'rgba(0, 123, 255, 1)',
                        'rgba(255, 193, 7, 1)',
                        'rgba(220, 53, 69, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 10,
                        boxWidth: 12
                    }
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nombre_de_su_proyecto\resources\views/admin/index.blade.php ENDPATH**/ ?>