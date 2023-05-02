<?php

namespace Database\Factories;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's coresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // config/app.phpで'faker_locale'を変更した場合は日本語対応している項目は日本語で生成される
        $faker = \Faker\Factory::create('ja_JP');
        // 日本の電話番号のフォーマットを定義するカスタムプロバイダー
    
        return [
            'name' => $faker->name(),
            'mail_address' => $faker->email(),
            'post_code' => $faker->postcode(),
            'address' => $faker->address(),
            'telephone_number' => $faker->phoneNumber(12),
        ];
    
}
}
