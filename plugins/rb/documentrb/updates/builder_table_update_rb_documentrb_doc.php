<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRbDocumentrbDoc extends Migration
{
    public function up()
    {
        Schema::table('rb_documentrb_doc', function($table)
        {
            $table->renameColumn('documentid', 'id');
        });
    }
    
    public function down()
    {
        Schema::table('rb_documentrb_doc', function($table)
        {
            $table->renameColumn('id', 'documentid');
        });
    }
}
