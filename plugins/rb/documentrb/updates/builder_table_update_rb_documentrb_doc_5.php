<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRbDocumentrbDoc5 extends Migration
{
    public function up()
    {
        Schema::table('rb_documentrb_doc', function($table)
        {
            $table->dropColumn('documenturl');
        });
    }
    
    public function down()
    {
        Schema::table('rb_documentrb_doc', function($table)
        {
            $table->string('documenturl', 255);
        });
    }
}
