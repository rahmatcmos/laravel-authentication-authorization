<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        Model::unguard();

        // sample organizer
        $jajang = App\User::create([
            'name' => 'Jajang Sopandi',
            'username' => 'jajang',
            'email' => 'jajang@gmail.com',
            'password' => bcrypt('rahasia'),
            'role' => 'organizer',
            'membership' => 'gold'
        ]);

        $ucok = App\User::create([
            'name' => 'Ucok Prayogo',
            'username' => 'ucok',
            'email' => 'ucok@gmail.com',
            'password' => bcrypt('rahasia'),
            'role' => 'organizer',
            'membership' => 'platinum'
        ]);

        // sample participant
        $beni = App\User::create([
            'name' => 'Beni Wijaya',
            'username' => 'beni',
            'email' => 'beni@gmail.com',
            'password' => bcrypt('rahasia'),
            'role' => 'participant',
            'membership' => 'gold'
        ]);

        // sample event
        $meetupJS = App\Event::create([
            'organizer_id' => $jajang->id,
            'name' => 'Meetup JS Jakarta',
            'description' => 'Kumpul bareng developer JS',
            'location' => 'Balai Kartini',
            'begin_date' => '2016-03-10',
            'finish_date' => '2016-03-11',
            'published' => 1
        ]);

        $meetupLaravel = App\Event::create([
            'organizer_id' => $ucok->id,
            'name' => 'Meetup Laravel Bandung',
            'description' => 'Kumpul bareng developer Laravel',
            'location' => 'Sabuga',
            'begin_date' => '2016-04-02',
            'finish_date' => '2016-04-05',
            'published' => 0
        ]);

        // sample organization
        $artisanBdg = App\Organization::create([
            'name' => 'Artisan Bandung',
            'admin_id' => $ucok->id
        ]);

        Model::reguard();
    }
}
