<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Provider;
use App\Models\User;

class TestingDatabaseSeeder extends Seeder
{
    public function run()
    {
        // Instantiate faker
        $this->faker = Faker::create();

        // Create providers
        foreach (config('providers') as $provider => $attributes) {
            Provider::create([
                'name' => $provider,
                'details' => json_encode((object) $attributes),
            ]);
        }

        // Get providers from DB
        $providers = Provider::all();

        // Generate users
        return factory(User::class, 10)
            ->create()
            ->each(function(User $user) use ($providers) {
                foreach ($providers as $provider) {
                    $options = json_encode((object) []);
                    if ($details = json_decode($provider->details, true)) {
                        $options = json_encode((object) [
                            $details[0] => $this->faker->uuid(),
                        ]);
                    }
                    $user->providers()
                        ->attach([$provider->id => [
                            'provider_options' => $options
                        ]]);
                }
            });
    }
}
