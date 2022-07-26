<?php

use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfixModuleManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infix_module_managers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('notes', 255)->nullable();
            $table->string('version', 200)->nullable();
            $table->string('update_url', 200)->nullable();
            $table->string('purchase_code', 200)->nullable();
            $table->string('checksum')->nullable();
            $table->string('installed_domain', 200)->nullable();
            $table->date('activated_date')->nullable();
            $table->timestamps();
        });

        \Modules\RolePermission\Entities\Permission::forceCreate(['id'  => 1035, 'module_id' => 5, 'parent_id' => 66, 'name' => 'Module Manager', 'route' => 'modulemanager.index', 'type' => 2 ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infix_module_managers');
    }
}
