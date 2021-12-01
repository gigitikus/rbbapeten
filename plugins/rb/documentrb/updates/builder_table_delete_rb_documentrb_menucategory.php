<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteRbDocumentrbMenucategory extends Migration
{
    public function up()
    {
        Schema::dropIfExists('rb_documentrb_menucategory');
    }
    
    public function down()
    {
        Schema::create('rb_documentrb_menucategory', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('menu_id');
            $table->integer('category_id');
            $table->primary(['menu_id','category_id']);
        });
    }
}
