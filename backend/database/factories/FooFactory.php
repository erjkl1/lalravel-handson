<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Foo;

class FooFactory extends Factory
{
    public function definition()
    {
        $user_id = $this->faker->numberBetween(1, 3);
        return [
            'title'=> $user_id.':'.$this->faker->realText(rand(10, 15)),
            'is_done'=> $this->faker->boolean(50),
            'body'=> $this->faker->realText(rand(30, 40)),
            'user_id' => $user_id,
            'created_at'=>now(),
            'updated_at'=>now()
            //
        ];
    }
}
