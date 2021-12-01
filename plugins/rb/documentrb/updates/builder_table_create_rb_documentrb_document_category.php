<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRbDocumentrbDocumentCategory extends Migration
{
    public function up()
    {
        Schema::create('rb_documentrb_document_category', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('document_id');
            $table->integer('category_id');
            $table->primary(['document_id','category_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('rb_documentrb_document_category');
    }
}
