<?php

namespace Database\Factories;

use App\Models\EventOrganizer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
//        "title","image","description","city","country","organizer_type","address","datetime","organizer_id","is_approved"

        return [
            //
            'title' => $this->faker->sentence(),
            'image' => $this->faker->imageUrl(640,480),
            'description' => $this->faker->text(),
            "city"=>$this->faker->city(),
            "country"=>$this->faker->country(),
            "organizer_type"=> "eo",
            "organizer_id"=>EventOrganizer::first()->id,
            "is_approved"=>0,
            "address"=>$this->faker->sentence(),
            "datetime"=>Carbon::tomorrow(),
        ];
    }
}
