<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'url' => 'https://dummyimage.com/640x480/'.self::randColor().'/'.self::randColor().'.jpg&text='.$this->faker->word()
        ];
    }

    private function randColor() {
        return bin2hex(openssl_random_pseudo_bytes(3));
    }
}
