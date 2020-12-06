<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Room::class;

  /**
   * Define the model's default state.
   *
   * @return array
   * @throws \Exception
   */
  public function definition()
  {
    return [
      'room_number' => random_int(100, 500),
      'room_name' => $this->faker->name
    ];
  }
}
