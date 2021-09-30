<?php

namespace Database\Factories;

use App\Models\AjaxCrud;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AjaxCrudFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AjaxCrud::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'city' => $this->faker->randomElement(array('karachi','islamabad','lahore', 'quetta' )),
            'email' => $this->faker->email()
        ];
    }
}
