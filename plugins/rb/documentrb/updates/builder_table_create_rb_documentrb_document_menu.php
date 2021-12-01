<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRbDocumentrbDocumentMenu extends Migration
{
    public function up()
    {
        Schema::create('rb_documentrb_document_menu', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('document_id');
            $table->integer('menu_id');
            $table->primary(['document_id','menu_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('rb_documentrb_document_menu');
    }
}
