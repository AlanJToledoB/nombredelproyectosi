

CREAMOS LAS MIGRACIONES

php artisan make:migration create_cursos_table --create=cursos
php artisan make:migration create_alumnos_table --create=alumnos
php artisan make:migration create_anios_table --create=anios
php artisan make:migration create_materias_table --create=materias
php artisan make:migration create_inscripcion_table --create=inscripcion

ABRIMOS CADA UNO DE LAS MIGRACIONES  QUE CREAMOS Y PEGAMOS EL CODIGO CORRESPONDIENTE

----- MIGRACION cursos -----------
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_curso');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}


// {-------- MIGRACION alumnos --------}
// <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('apellido');
            $table->integer('celular');
            $table->foreignId('cursos_id')->constrained('cursos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}


// -------- MIGRACION anios ------------
// <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAniosTable extends Migration
{
    public function up()
    {
        Schema::create('anios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_anio');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anios');
    }
}


// ---------- MIGRACION materias ----------
// <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasTable extends Migration
{
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_materia');
            $table->foreignId('anios_id')->constrained('anios');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('materias');
    }
}

// ............ MIGRACION inscripcion --------------
// <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionTable extends Migration
{
    public function up()
    {
        Schema::create('inscripcion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users');
            $table->foreignId('materias_id')->constrained('materias');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inscripcion');
    }
}

####################################### Aplicamos el comando php artisan migrate
####################################### luego entramos a phpmyadmin en SQL

// CODIGO SQL PARA INGRESAR LOS REGISTROS DE PRUEBA

INSERT INTO users (name, email, password) VALUES
    ('John Doe', 'johndoue@example.com', 'password1'),
    ('Jane Smith', 'janesmith@example.com', 'password2'),
    ('Michael Johnson', 'michaeljohnson@example.com', 'password3'),
    ('Emily Davis', 'emilydavis@example.com', 'password4'),
    ('Daniel Wilson', 'danielwilson@example.com', 'password5'),
    ('Sophia Thompson', 'sophiathompson@example.com', 'password6'),
    ('David Anderson', 'davidanderson@example.com', 'password7'),
    ('Olivia Clark', 'oliviaclark@example.com', 'password8'),
    ('James Rodriguez', 'jamesrodriguez@example.com', 'password9'),
    ('Emma Taylor', 'emmataylor@example.com', 'password10');

    INSERT INTO cursos (nombre_curso) VALUES
    ('1er año 1ra división'),
    ('1er año 2da división'),
    ('1er año 3ra división'),
    ('1er año 4ta división'),
    ('2do año 1ra división'),
    ('2do año 2da división'),
    ('2do año 3ra división'),
    ('2do año 4ta división'),
    ('3er año 1ra división'),
    ('3er año 2da división'),
    ('3er año 3ra división'),
    ('4to año 1ra división'),
    ('4to año 2da división'),
    ('5to año 1ra división'),
    ('5to año 2da división'),
    ('6to año 1ra división'),
    ('6to año 2da división');
    

    INSERT INTO alumnos (apellido, celular, cursos_id) VALUES
    ('González', 1234567890, 1),
    ('Rodríguez', 9876543210, 1),
    ('López', 4567890123, 2),
    ('Martínez', 7890123456, 2),
    ('Gómez', 6543210987, 3),
    ('Hernández', 9012345678, 3),
    ('Pérez', 4321098765, 4),
    ('Flores', 8765432109, 4),
    ('Sánchez', 2198765430, 5),
    ('Ramírez', 6543210987, 5);

INSERT INTO anios (nombre_anio) VALUES (1), (2), (3), (4), (5), (6);


INSERT INTO materias (nombre_materia, anios_id) VALUES
    ('Matemáticas', 1),
    ('Física', 1),
    ('Química', 2),
    ('Biología', 2),
    ('Historia', 3),
    ('Geografía', 3),
    ('Literatura', 4),
    ('Inglés', 4),
    ('Arte', 5),
    ('Música', 5),
    ('Geografía', 6),
    ('Literatura', 6),
    ('Inglés', 6),
    ('Arte', 6),
    ('Música', 6);


  INSERT INTO inscripcion (users_id, materias_id, create) VALUES
    (1, 1, '2023-06-01'),
    (1, 2, '2023-06-01'),
    (2, 3, '2023-06-01'),
    (2, 4, '2023-06-01'),
    (3, 5, '2023-06-01'),
    (3, 6, '2023-06-01'),
    (4, 7, '2023-06-01'),
    (4, 8, '2023-06-01'),
    (5, 9, '2023-06-01'),
    (5, 10, '2023-06-01');




#######################################################################################################
############################  CREAMOS LOS MODELOS                 #####################################
#######################################################################################################

CREAMOS LOS MODELOS

php artisan make:model Alumno
php artisan make:model Curso
php artisan make:model Materia
php artisan make:model Inscripcion
php artisan make:model Anio


ABRIMOS CADA UNO DE LOS MODELOS QUE CREAMOS Y PEGAMOS EL CODIGO CORRESPONDIENTE

------ MODELO curso -------
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_curso'];

    public function alumnos()
    {
        return $this->hasMany(Alumno::class, 'cursos_id');
    }

    public function materias()
    {
        return $this->hasMany(Materia::class);
    }
}


....... MODELO alumno ..... 

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = ['apellido', 'celular', 'cursos_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'cursos_id');
    }
}


 ----  MODELO anio  ----
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_anio',
    ];

    public function materias()
    {
        return $this->hasMany(Materia::class);
    }
}


----------- MODELO materia -------------
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_materia', 'anios_id'];

    public function anio()
    {
        return $this->belongsTo(Curso::class, 'anios_id');
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }
}

-------------- MODELO inscripcion ---------------------
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $fillable = ['users_id', 'materias_id', 'fecha'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'materias_id');
    }
}

#######################################################################################################
#########################   CREAMOS LOS CONTROLADORES           #######################################
#######################################################################################################

--- COMANDOS PARA CREAR LOS CONTROLADORES  ------
php artisan make:controller AlumnoController --resource && php artisan make:controller CursoController --resource && php artisan make:controller MateriaController --resource && php artisan make:controller InscripcionController --resource && php artisan make:controller AnioController --resource

----- CODIGO QUE HAY QUE PONER EN LOS CONTROLADORES RESPECTIVOS ------

------ CONTROLADOR cursoController
<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    // Otros métodos del controlador (create, store, edit, update, delete)...
}


------ CONTROLADOR alumnoController
<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    // Otros métodos del controlador (create, store, edit, update, delete)...
}



----------CONTROLADOR anioController ---------------------
<?php

namespace App\Http\Controllers;

use App\Models\Anio;
use Illuminate\Http\Request;

class AnioController extends Controller
{
    public function index()
    {
        // Tu lógica para mostrar los registros de anios
    }

    // Otros métodos del controlador (create, store, edit, update, destroy)
}


----------- CONTROLADOR materiaController --------------

<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::all();
        return view('materias.index', compact('materias'));
    }

    // Otros métodos del controlador (create, store, edit, update, delete)...
}


-------- CONTROLADOR inscripciones --------
<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function index()
    {
        $inscripciones = Inscripcion::all();
        return view('inscripciones.index', compact('inscripciones'));
    }

    // Otros métodos del controlador (create, store, edit, update, delete)...
}


#######################################################################################################
#########################   CREAMOS LAS RUTAS                   #######################################
###################### NO OLVIDARSE DE ENLAZAR LA RUTA CON EL CONTROLADOR #############################

use App\Http\Controllers\CursoController;
use App\Http\Controllers\MateriaController;


Route::get('/principal', [CursoController::class, 'pichichu']);
Route::get('/materias/{curso_id}', [MateriaController::class, 'index'])->name('materias');
Route::get('/inscribir/{materia_id}', 'MateriaController@inscribir')->name('inscribir');


#######################################################################################################
#########################   CREAMOS LAS VISTAS                   #######################################
###################### index.blade.php - materias.blade.php #############################

----------------- VISTA index.blade.php -----------------------
<!DOCTYPE html>
<html>
<head>
    <title>Título de la página</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            margin-top: 30px;
            background-color: #343a40;
        }

        .btn-square {
            width: 100px;
            height: 100px;
            border-radius: 0;
            margin-right: 4px;
            display: flex;
            align-items: center;
            justify-content:center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            @foreach($cursos as $curso)
            <div class="col-md-2 mb-4">
                <a href="{{ route('materias', ['curso_id' => $curso->id]) }}" class="btn btn-outline-primary btn-square">{{ $curso->nombre_curso }}</a>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>


----------------------- VISTA materias.blade.php ------------------------

<!DOCTYPE html>
<html>
<head>
    <title>Materias</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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
                @foreach($materias as $materia)
                <tr>
                    <td>{{ $materia->nombre_materia }}</td>
                    <td>
                        <a href="{{ route('inscribir', $materia->id) }}" class="btn btn-success">Inscribirme</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
