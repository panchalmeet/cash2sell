<?php
/**
 * Create User by Seeder
 *
 * PHP version 8.1
 *
 * @category Genereal
 * @package  App\Repositories
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
namespace App\Repositories\Seeder;

use App\Models\User;
use Faker\Factory as Faker;

/**
 * Create User by Seeder
 *
 * PHP version 8.1
 *
 * @category Repositories
 * @package  App\Repositories
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
class UserSeederRepository
{
    /**
     * Constructor.
     *
     * @param User  $userModel Inject Model
     * @param Faker $faker     Factory
     */
    public function __construct(
        protected User $userModel,
        protected Faker $faker
    ) {
    }

    /**
     * Check email exists or not
     *
     * @param string $email user email
     *
     * @return object|null
     */
    public function checkEmailExists(string $email): object|null
    {
        return $checkUserInDb = $this->userModel
            ->where("email", $email)
            ->first();
    }

    /**
     * Check mobile_number exists or not
     *
     * @param string $mobileNumber user mobile number
     *
     * @return object|null
     */
    public function checkMobileNumberExists(string $mobileNumber): object|null
    {
        return $checkUserInDb = $this->userModel
            ->where("mobile_number", $mobileNumber)
            ->first();
    }

    /**
     * Create Users
     *
     * @param array $item     request data
     * @param int   $userType user role id
     *
     * @return void
     */
    public function createUsers(array $item, int $userType): void
    {
        $faker = $this->faker->create();
        $userId = $this->userModel->create($item)->id;
    }
}
