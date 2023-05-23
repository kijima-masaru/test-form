<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $familyName = $this->faker->lastName;
        $firstName = $this->faker->firstName;
        $fullName = $familyName . ' ' . $firstName;
        $postcode = $this->faker->regexify('\d{3}-\d{4}');
        $address = $postcode . ' ' . $this->faker->address;

        return [
            'family__name' => $familyName,
            'first__name' => $firstName,
            'fullname' => $fullName,
            'gender' => $this->faker->randomElement(['男性', '女性']),
            'email' => $this->faker->unique()->safeEmail,
            'postcode' => $postcode,
            'address' =>  $address,
            'building_name' => $this->faker->secondaryAddress,
            'opinion' => $this->faker->paragraph,
        ];
    }
}