<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateRbDocumentrbDoc extends Migration
{
    public function up()
    {
        Schema::create('rb_documentrb_doc', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('documentid')->unsigned();
            $table->string('menuid');
            $table->string('categoryid');
            $table->string('documenttitle');
            $table->string('slug')->nullable();
            $table->string('documenturl');
            $table->string('year');
            $table->string('author')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('rb_documentrb_doc');
    }
}
