<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherTemplatesTable extends Migration
{
    public function up()
    {
        Schema::create('voucher_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('css_code');
            $table->text('html_code');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('voucher_templates');
    }
}