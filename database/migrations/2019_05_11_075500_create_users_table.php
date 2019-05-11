
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('email')->unique();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password')->nullable();
          $table->string('codigo', 50)->nullable();
          $table->integer('rol_id')->unsigned();
          $table->foreign('rol_id')->references('id')->on('rols');
          
          $table->string('cedula')->unique();
          $table->string('nombre', 150);
          $table->string('apellidos', 150);
          $table->string('nacionalidad', 50);
          $table->date('fecha_nacimiento');
          $table->string('sexo', 15);
          $table->string('estado_civil', 25);
          $table->string('telefono', 50)->nullable();
          $table->text('direccion');
          $table->text('imagen')->nullable();
          $table->softDeletes();
          $table->timestamps();
          $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
