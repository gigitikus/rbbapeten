<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRbDocumentrbDocmn extends Migration
{
    public function up()
    {
        Schema::create('rb_documentrb_docmn', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('document_doc_id');
            $table->integer('document_menu_id');
            $table->primary(['document_doc_id','document_menu_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('rb_documentrb_docmn');
    }
}
