<?php

namespace Database\Seeders;

use App\models\Destinations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destinations::create([
            'name' => "Isatano Basa pagaruyung",
            'description' => "Istano Basa Pagaruyung yang lebih terkenal dengan nama Istana Besar Kerajaan Pagaruyung adalah museum berupa replika istana Kerajaan Pagaruyung terletak di Nagari Pagaruyung, Kecamatan Tanjung Emas, Kabupaten Tanah Datar, Sumatera Barat. Istana ini berjarak lebih kurang 5 kilometer dari Batusangkar.",
            'location' => "Jl. Sutan Alam Bagagarsyah, Pagaruyung, Kec. Tj. Emas, Kabupaten Tanah Datar, Sumatera Barat",
            'working_days' => "weekends",
            'working_hours' => "8 am - 6 pm",
            'ticket_price' => "25000",
        ]);
        Destinations::create([
            'name' => "Candi Muaro Jambi",
            'description' => "Candi Muaro Jambi adalah sebuah kompleks percandian agama Hindu-Buddha terluas di Asia Tenggara, dengan luas 3981 hektar. yang kemungkinan besar merupakan peninggalan Kerajaan Sriwijaya dan Kerajaan Melayu.",
            'location' => "Jl. Muaro Jambi, Kec. Maro Sebo, Kabupaten Muaro Jambi, Jambi",
            'working_days'=>"setiap hari",
            'working_hours' => "10 am - 6 pm",
            'ticket_price' => "15000",
        ]);
        Destinations::create([
            'name' => "Museum Tsunami Aceh",
            'description' => "Diterjemahkan dari bahasa Inggris-Museum Tsunami Aceh, yang terletak di Banda Aceh, di provinsi Aceh, Indonesia, adalah museum yang dirancang sebagai pengingat simbolis bencana gempa bumi dan tsunami Samudra Hindia 2004, serta sebagai pusat pendidikan dan tempat perlindungan darurat bencana jika daerah tersebut dilanda tsunami lagi.",
            'location' => "Jl. Sultan Iskandar Muda No.3, Sukaramai, Kec. Baiturrahman, Kota Banda Aceh, Aceh",
            'working_days' => "setiap hari",
            'working_hours' => "2 pm - 6 pm",
            'ticket_price' => "20000",
        ]);
        Destinations::create([
            'name' => "Isatana Maimun",
            'description' => "istana ikonik Kesultanan Deli di Medan, Sumatera Utara, yang dibangun tahun 1888-1891 pada masa Sultan Ma'moen Al Rasyid.",
            'location' => "Jl. Brigjend Katamso, Aur, Kec. Medan Maimun, Kota Medan.",
            'working_days' => "setiap hari",
            'working_hours' => "8 am - 5 pm",
            'ticket_price' => "10000",
        ]);
        Destinations::create([
            'name' => "Benteng Rotterdam",
            'description' => "Benteng Rotterdam atau Benteng Ujung Pandang adalah sebuah benteng peninggalan Kerajaan Gowa-Tallo. Letak benteng ini berada di pinggir pantai sebelah barat Kota Makassar, Sulawesi Selatan. Benteng ini awalnya dibangun pada tahun 1545 oleh Raja Gowa ke-9 yang bernama Daeng Matanre Karaeng Tumapa'risi' Kallonna.",
            'location' => "Jl. Ujung Pandang, Bulo Gading, Kec. Ujung Pandang, Kota Makassar, Sulawesi Selatan",
            'working_days' => "setiap hari",
            'working_hours' => "8 am - 6 pm",
            'ticket_price' => "5000",
        ]);
        Destinations::create([
            'name' => "Rumah Ulin Arya",
            'description' => "Burung, reptil, dan mamalia dipamerkan di pusat pengunjung hutan dengan area bermain & kolam renang.",
            'location' => "Jl. H Maksum Jl. Bayur No.20, Sempaja Utara, Kec. Samarinda Utara, Kota Samarinda, Kalimantan Timur",
            'working_days' => "setiap hari",
            'working_hours' => "8 am - 4 pm",
            'ticket_price' => "70000",
        ]);
        for ($i = 0; $i <= 10; $i++) {

        Destinations::create([
            'name' => fake("id_ID")->name(),
            'description' => fake("id_ID")->sentence(),
            'location' => fake("id_ID")->address(). ", Pekanbaru, Riau",
            'working_days' => "Everday",
            'working_hours' => "8 am - 5 pm",
            'ticket_price' => rand(10000, 50000),
        ]);
        }

    }
}
