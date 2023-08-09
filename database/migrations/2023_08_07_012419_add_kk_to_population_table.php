<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('populations', function (Blueprint $table) {
            $table->bigInteger("kk_garut_kota")->default(0)->nullable();
            $table->bigInteger("kk_karangpawitan")->default(0)->nullable();
            $table->bigInteger("kk_wanaraja")->default(0)->nullable();
            $table->bigInteger("kk_tarogong_kaler")->default(0)->nullable();
            $table->bigInteger("kk_tarogong_kidul")->default(0)->nullable();
            $table->bigInteger("kk_banyuresmi")->default(0)->nullable();
            $table->bigInteger("kk_samarang")->default(0)->nullable();
            $table->bigInteger("kk_pasirwangi")->default(0)->nullable();
            $table->bigInteger("kk_leles")->default(0)->nullable();
            $table->bigInteger("kk_kadungora")->default(0)->nullable();
            $table->bigInteger("kk_leuwigoong")->default(0)->nullable();
            $table->bigInteger("kk_cibatu")->default(0)->nullable();
            $table->bigInteger("kk_kersamanah")->default(0)->nullable();
            $table->bigInteger("kk_malangbong")->default(0)->nullable();
            $table->bigInteger("kk_sukawening")->default(0)->nullable();
            $table->bigInteger("kk_karangtengah")->default(0)->nullable();
            $table->bigInteger("kk_bayongbong")->default(0)->nullable();
            $table->bigInteger("kk_cigedug")->default(0)->nullable();
            $table->bigInteger("kk_cilawu")->default(0)->nullable();
            $table->bigInteger("kk_cisurupan")->default(0)->nullable();
            $table->bigInteger("kk_sukaresmi")->default(0)->nullable();
            $table->bigInteger("kk_cikajang")->default(0)->nullable();
            $table->bigInteger("kk_banjarwangi")->default(0)->nullable();
            $table->bigInteger("kk_singajaya")->default(0)->nullable();
            $table->bigInteger("kk_cihurip")->default(0)->nullable();
            $table->bigInteger("kk_peundeuy")->default(0)->nullable();
            $table->bigInteger("kk_pameungpeuk")->default(0)->nullable();
            $table->bigInteger("kk_cisompet")->default(0)->nullable();
            $table->bigInteger("kk_cibalong")->default(0)->nullable();
            $table->bigInteger("kk_cikelet")->default(0)->nullable();
            $table->bigInteger("kk_bungbulang")->default(0)->nullable();
            $table->bigInteger("kk_mekarmukti")->default(0)->nullable();
            $table->bigInteger("kk_pakenjeng")->default(0)->nullable();
            $table->bigInteger("kk_pamulihan")->default(0)->nullable();
            $table->bigInteger("kk_cisewu")->default(0)->nullable();
            $table->bigInteger("kk_caringin")->default(0)->nullable();
            $table->bigInteger("kk_talegong")->default(0)->nullable();
            $table->bigInteger("kk_balubur_limbangan")->default(0)->nullable();
            $table->bigInteger("kk_selaawi")->default(0)->nullable();
            $table->bigInteger("kk_cibiuk")->default(0)->nullable();
            $table->bigInteger("kk_pangatikan")->default(0)->nullable();
            $table->bigInteger("kk_sucinaraja")->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('populations', function (Blueprint $table) {
            $table->dropColumn("kk_garut_kota");
            $table->dropColumn("kk_karangpawitan");
            $table->dropColumn("kk_wanaraja");
            $table->dropColumn("kk_tarogong_kaler");
            $table->dropColumn("kk_tarogong_kidul");
            $table->dropColumn("kk_banyuresmi");
            $table->dropColumn("kk_samarang");
            $table->dropColumn("kk_pasirwangi");
            $table->dropColumn("kk_leles");
            $table->dropColumn("kk_kadungora");
            $table->dropColumn("kk_leuwigoong");
            $table->dropColumn("kk_cibatu");
            $table->dropColumn("kk_kersamanah");
            $table->dropColumn("kk_malangbong");
            $table->dropColumn("kk_sukawening");
            $table->dropColumn("kk_karangtengah");
            $table->dropColumn("kk_bayongbong");
            $table->dropColumn("kk_cigedug");
            $table->dropColumn("kk_cilawu");
            $table->dropColumn("kk_cisurupan");
            $table->dropColumn("kk_sukaresmi");
            $table->dropColumn("kk_cikajang");
            $table->dropColumn("kk_banjarwangi");
            $table->dropColumn("kk_singajaya");
            $table->dropColumn("kk_cihurip");
            $table->dropColumn("kk_peundeuy");
            $table->dropColumn("kk_pameungpeuk");
            $table->dropColumn("kk_cisompet");
            $table->dropColumn("kk_cibalong");
            $table->dropColumn("kk_cikelet");
            $table->dropColumn("kk_bungbulang");
            $table->dropColumn("kk_mekarmukti");
            $table->dropColumn("kk_pakenjeng");
            $table->dropColumn("kk_pamulihan");
            $table->dropColumn("kk_cisewu");
            $table->dropColumn("kk_caringin");
            $table->dropColumn("kk_talegong");
            $table->dropColumn("kk_balubur_limbangan");
            $table->dropColumn("kk_selaawi");
            $table->dropColumn("kk_cibiuk");
            $table->dropColumn("kk_pangatikan");
            $table->dropColumn("kk_sucinaraja");
        });
    }
};
