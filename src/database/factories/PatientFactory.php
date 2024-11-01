<?php

namespace Database\Factories;

use App\Utils\FakeUtils;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fake_first = fake()->firstName();
        $fake_last = fake()->lastName();
        $fake_email = FakeUtils::email($fake_first, $fake_last);

        return [
            'codigo' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'apellidos' => $fake_last,
            'nombres' => $fake_first,
            'dni' => $this->faker->unique()->numerify('########'),
            'nacimiento' => $this->faker->date(),
            'sexo' => $this->faker->randomElement(['M', 'F']),
            'telefono' => $this->faker->phoneNumber(),
            'email' => $fake_email,
            'direccion' => $this->faker->address(),
            'observaciones' => $this->faker->optional()->sentence(),
        ];
    }
}
