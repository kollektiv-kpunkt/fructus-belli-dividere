<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supporter>
 */
class SupporterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $rand = rand(0, 1);
        $supporter = [
            "email" => $this->faker->unique()->safeEmail(),
            "data" => [
                "fname" => $this->faker->firstName(),
                "lname" => $this->faker->lastName(),
                "zip" => $this->faker->postcode(),
                "city" => $this->faker->city()
            ],
            "status" => "active",
            "email_verified_at" => now(),
            "email_verification_token" => 1,
        ];
        if ($rand === 0) {
            $supporter["data"]["jobtitle"] = $this->faker->jobTitle();
        }

        if (rand(1,5) <= 3) {
            $supporter["public"] = true;
        }
        return $supporter;
    }
}
