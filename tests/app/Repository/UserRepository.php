<?php

use DTApi\Repository\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\TestCase;


// In this test, I create a test case for the createOrUpdate method. I pass a sample request array with the required data for creating a user.
// After calling the createOrUpdate method, I assert the returned user object and its attributes to ensure they match the expected values.
// I also check the associated user meta data and users blacklist data to ensure they are created correctly.

// We can add more test methods to cover different scenarios and edge cases, such as testing for different user roles, validation rules, and error conditions.

class UserRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected $userRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userRepository = new UserRepository(new User());
    }

    public function testCreateOrUpdate()
    {
        $request = [
            'role' => 'customer',
            'name' => 'John Doe',
            'company_id' => 1,
            'department_id' => 2,
            'email' => 'johndoe@example.com',
            'dob_or_orgid' => '1980-01-01',
            'phone' => '123456789',
            'mobile' => '987654321',
            'password' => 'password',
            'consumer_type' => 'paid',
            'customer_type' => 'individual',
            'username' => 'johndoe123',
            'post_code' => '12345',
            'address' => '123 Street',
            'city' => 'City',
            'town' => 'Town',
            'country' => 'Country',
            'reference' => 'yes',
            'additional_info' => 'Additional info',
            'cost_place' => 'Cost place',
            'fee' => '10',
            'time_to_charge' => '2',
            'time_to_pay' => '7',
            'charge_ob' => 'yes',
            'customer_id' => 'C12345',
            'charge_km' => '2',
            'maximum_km' => '100',
            'translator_ex' => [1, 2, 3],
        ];

        $user = $this->userRepository->createOrUpdate(null, $request);

        $this->assertNotNull($user);
        $this->assertEquals('customer', $user->user_type);
        $this->assertEquals('John Doe', $user->name);
        $this->assertEquals(1, $user->company_id);
        $this->assertEquals(2, $user->department_id);
        $this->assertEquals('johndoe@example.com', $user->email);
        // ... assert other attributes

        // Assert user meta data
        $userMeta = $user->usermeta;
        $this->assertNotNull($userMeta);
        $this->assertEquals('paid', $userMeta->consumer_type);
        $this->assertEquals('individual', $userMeta->customer_type);
        $this->assertEquals('johndoe123', $userMeta->username);
        // ... assert other user meta attributes

        // Assert users blacklist
        $blacklist = DB::table('users_blacklist')->where('user_id', $user->id)->get();
        $this->assertCount(3, $blacklist);
        // ... assert other blacklist data

        // ... add more assertions based on your requirements
    }

    // Add more test methods for other scenarios and edge cases

}





    