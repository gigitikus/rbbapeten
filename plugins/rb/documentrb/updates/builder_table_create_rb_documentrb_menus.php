<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRbDocumentrbMenus extends Migration
{
    public function up()
    {
        Schema::create('rb_documentrb_menus', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('menu_title');
            $table->string('slug');
            $table->integer('orderno');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('rb_documentrb_menus');
    }
}
