<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Foo;

class FooFactory extends Factory
{
    public function definition()
    {
        return [
            'title'=> $this->faker->realText(rand(10, 15)),
            'is_done'=> $this->faker->boolean(10),
            'body'=> $this->faker->realText(rand(30, 40)),
            'created_at'=>now(),
            'updated_at'=>now()
            //
        ];
    }
}
