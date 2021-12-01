<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteRbDocumentrbMenusCategories extends Migration
{
    public function up()
    {
        Schema::dropIfExists('rb_documentrb_menus_categories');
    }
    
    public function down()
    {
        Schema::create('rb_documentrb_menus_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('document_menu_id');
            $table->integer('document_category_id');
        });
    }
}
