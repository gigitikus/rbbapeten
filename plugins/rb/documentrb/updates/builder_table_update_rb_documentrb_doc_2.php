<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRbDocumentrbDoc2 extends Migration
{
    public function up()
    {
        Schema::table('rb_documentrb_doc', function($table)
        {
            $table->integer('categoryorderno');
            $table->integer('titleorderno');
            $table->dateTime('lastmodified');
            $table->text('modifiedby');
            $table->string('menuid', 100)->change();
            $table->string('categoryid', 100)->change();
            $table->integer('year')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('rb_documentrb_doc', function($table)
        {
            $table->dropColumn('categoryorderno');
            $table->dropColumn('titleorderno');
            $table->dropColumn('lastmodified');
            $table->dropColumn('modifiedby');
            $table->string('menuid', 255)->change();
            $table->string('categoryid', 255)->change();
            $table->string('year', 255)->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}
