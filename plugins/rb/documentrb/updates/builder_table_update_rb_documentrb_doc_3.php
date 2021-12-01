<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRbDocumentrbDoc3 extends Migration
{
    public function up()
    {
        Schema::table('rb_documentrb_doc', function($table)
        {
            $table->string('modifiedby', 255)->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('rb_documentrb_doc', function($table)
        {
            $table->text('modifiedby')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}
