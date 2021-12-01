<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRbDocumentrb extends Migration
{
    public function up()
    {
        Schema::create('rb_documentrb_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('year');
            $table->string('author');
            $table->string('slug');
            $table->dateTime('lastmodified');
            $table->string('modifiedby');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('rb_documentrb_');
    }
}
