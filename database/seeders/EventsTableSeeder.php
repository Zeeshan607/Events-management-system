<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement("INSERT INTO `events` (`id`, `title`, `image`, `description`, `datetime`, `country`, `city`, `address`, `event_organizer_id`, `organizer_type`, `is_approved`, `created_at`, `updated_at`) VALUES
        (7, 'Ut illo consequatur et.', 'geoffrey-canada1680072100.jpg', 'Deserunt adipisci ut ipsa voluptas voluptatem dolorum necessitatibus. Natus quisquam dolor sunt autem. Laboriosam iste velit id aut accusamus tempora et.', '2023-03-26 19:00:00', 'Costa Rica', 'Abangares', 'Harum id necessitatibus minima nihil.',  '201b77e1-268c-45cc-b5ad-8baa8ee9c749', 'eo', 1, '2023-03-26 13:30:51', '2023-03-29 01:41:40'),
        (13, 'Pub G gamers Meetup', 'Best-PUBG-Players1679987148.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2023-03-30 06:41:00', 'Australia', 'Adamstown', '433 street', '201b77e1-268c-45cc-b5ad-8baa8ee9c749', 'eo', 1, '2023-03-28 01:42:50', '2023-03-28 02:05:48'),
        (14, 'call of duty players concert', 'maxresdefault1679987158.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry/'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2023-04-12 08:45:00', 'United States', 'Alamosa County', 'aierpascl;', '201b77e1-268c-45cc-b5ad-8baa8ee9c749', 'eo', 1, '2023-03-28 01:46:35', '2023-03-28 02:05:58'),
        (15, 'Woman\'s rights conference', 'women-rights-saudi-conference1679987166.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2023-05-24 09:47:00', 'Saudi Arabia', 'Bahrat al Qadimah', '436:93 street', '201b77e1-268c-45cc-b5ad-8baa8ee9c749', 'eo', 1, '2023-03-28 01:47:58', '2023-03-28 02:06:06'),
        (16, 'Test event', 'c12255fc-215e-4a57-8df7-e2c8397b3e681680070674.jpg', 'lorem ipsum testing text', '2023-03-30 06:17:00', 'Afghanistan', 'Fayzabad', 'testing addresss', '201b77e1-268c-45cc-b5ad-8baa8ee9c749', 'eo', 0, '2023-03-29 01:17:54', '2023-03-29 01:17:54')");




    }
}
