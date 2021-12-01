<?php namespace Rb\Documentrb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateRbDocumentrbDocmn extends Migration
{
    public function up()
    {
        Schema::table('rb_documentrb_docmn', function($table)
        {
            $table->dropPrimary(['document_doc_id','document_menu_id']);
            $table->integer('doc_id');
            $table->integer('menus_id');
            $table->dropColumn('document_doc_id');
            $table->dropColumn('document_menu_id');
            $table->primary(['doc_id','menus_id']);
        });
    }
    
    public function down()
    {
        Schema::table('rb_documentrb_docmn', function($table)
        {
            $table->dropPrimary(['doc_id','menus_id']);
            $table->dropColumn('doc_id');
            $table->dropColumn('menus_id');
            $table->integer('document_doc_id');
            $table->integer('document_menu_id');
            $table->primary(['document_doc_id','document_menu_id']);
        });
    }
}
