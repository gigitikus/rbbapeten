<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRbDocumentrbDoc6 extends Migration
{
    public function up()
    {
        Schema::table('rb_documentrb_doc', function($table)
        {
            $table->dropColumn('menu_id');
        });
    }
    
    public function down()
    {
        Schema::table('rb_documentrb_doc', function($table)
        {
            $table->integer('menu_id');
        });
    }
}
