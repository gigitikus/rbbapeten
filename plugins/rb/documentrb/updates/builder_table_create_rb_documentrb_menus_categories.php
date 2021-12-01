<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRbDocumentrbMenusCategories extends Migration
{
    public function up()
    {
        Schema::create('rb_documentrb_menus_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('menu_id');
            $table->integer('category_id');
            $table->primary(['menu_id','category_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('rb_documentrb_menus_categories');
    }
}
