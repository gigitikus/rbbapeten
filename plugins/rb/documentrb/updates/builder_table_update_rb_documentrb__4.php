<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRbDocumentrb4 extends Migration
{
    public function up()
    {
        Schema::table('rb_documentrb_', function($table)
        {
            $table->text('lampiran')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('rb_documentrb_', function($table)
        {
            $table->text('lampiran')->nullable(false)->change();
        });
    }
}
