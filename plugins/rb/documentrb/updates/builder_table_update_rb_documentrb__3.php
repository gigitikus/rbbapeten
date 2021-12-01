<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRbDocumentrb3 extends Migration
{
    public function up()
    {
        Schema::table('rb_documentrb_', function($table)
        {
            $table->text('lampiran');
        });
    }
    
    public function down()
    {
        Schema::table('rb_documentrb_', function($table)
        {
            $table->dropColumn('lampiran');
        });
    }
}
