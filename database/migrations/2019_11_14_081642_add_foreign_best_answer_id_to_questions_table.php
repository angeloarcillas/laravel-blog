<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignBestAnswerIdToQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            // php artisan make:migration add_foreign_best_answer_id_to_questions_table --table=questions
            //  NOTE: doesnt work on sqLite
            $table->foreign('best_answer_id')
                ->references('id')
                ->on('answers')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            //
            $table->dropForeign(['best_answer_id']);
        });
    }
}
