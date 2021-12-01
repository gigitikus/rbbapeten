<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteRbDocumentrbDocmn extends Migration
{
    public function up()
    {
        Schema::dropIfExists('rb_documentrb_docmn');
    }
    
    public function down()
    {
        Schema::create('rb_documentrb_docmn', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('doc_id');
            $table->integer('menu_id');
            $table->primary(['doc_id','menu_id']);
        });
    }
}
