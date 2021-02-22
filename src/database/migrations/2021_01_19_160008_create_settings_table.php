<?php

use App\Entities\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->unique();
            $table->text('value');
        });

        Setting::insert([
            ['key' => 'city_phone_number', 'value' => '+994 12 200 0020'],
            ['key' => 'mobile_phone_number', 'value' => '+994 12 200 0020'],
            ['key' => 'email', 'value' => 'sales@azcloud.az'],
            ['key' => 'support_email', 'value' => 'soc24@azintelecom.az'],
            ['key' => 'contact_email', 'value' => 'soc24@azintelecom.az'],
            ['key' => 'address', 'value' => 'Əlibəy Hüseynzadə 74, AZ1009, Bakı, Azərbaycan'],
            ['key' => 'google_map_url', 'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3039.2711005773235!2d49.83144801535468!3d40.380683779369335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307da2889a6453%3A0x2d4deb685609c5a5!2zNzQgxo9saWLJmXkgSMO8c2V5bnphZMmZLCBCYWvEsSwg0JDQt9C10YDQsdCw0LnQtNC20LDQvQ!5e0!3m2!1sru!2s!4v1607630178503!5m2!1sru!2s'],
            ['key' => 'facebook_page_url', 'value' => 'https://www.facebook.com/azcloud.az/'],

            // Urls
            ['key' => 'azcloud_console_url', 'value' => 'https://azcloud.az'],
            ['key' => 'azcloud_enterprise_url', 'value' => 'https://azcloud.az'],
            ['key' => 'azcloud_gcloud_url', 'value' => 'https://azcloud.az'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
