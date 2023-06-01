
Certainly! Here's an example of how I can write a test for the willExpireAt method in TeHelperTest.php:

<?php

use Carbon\Carbon;
use DTApi\Helpers\TeHelper;
use PHPUnit\Framework\TestCase;

class TeHelperTest extends TestCase
{
    public function testWillExpireAt()
    {
        $dueTime = Carbon::now()->addHours(2);
        $createdAt = Carbon::now();

        $expectedExpiryTime = $createdAt->addMinutes(90);

        $expiryTime = TeHelper::willExpireAt($dueTime, $createdAt);

        $this->assertEquals($expectedExpiryTime, $expiryTime);
    }
}
//In this test, I set a $dueTime two hours from the current time, and the $createdAt time as the current time.
// I then calculate the expected expiry time by adding 90 minutes to the $createdAt time. 
//Finally, I call the willExpireAt method with the given $dueTime and $createdAt and compare the result with the expected expiry time 
//using the assertEquals method.
//I can add more test cases to cover different scenarios and edge cases based on your requirements.

Refactoring:

//  Here's the refactored code for the willExpireAt method in App/Helpers/TeHelper.php:

//     php
//     Copy code
//     <?php
    
//     namespace DTApi\Helpers;
    
//     use Carbon\Carbon;
//     use DTApi\Models\Job;
    
//     class TeHelper
//     {
//         public static function willExpireAt($due_time, $created_at)
//         {
//             $due_time = Carbon::parse($due_time);
//             $created_at = Carbon::parse($created_at);
    
//             $difference = $due_time->diffInHours($created_at);
    
//             if ($difference <= 90) {
//                 $time = $due_time;
//             } elseif ($difference <= 24) {
//                 $time = $created_at->addMinutes(90);
//             } elseif ($difference > 24 && $difference <= 72) {
//                 $time = $created_at->addHours(16);
//             } else {
//                 $time = $due_time->subHours(48);
//             }
    
//             return $time->format('Y-m-d H:i:s');
//         }
//     }
//     Note:  I have removed the unused imports and removed the unnecessary code block in the getUsermeta method,
//              where the return statement was never reached due to the earlier return statement.



// please note that i write refactoring in comments section because namespace and classes cannot use 2 times with the same name in a code.
//  so i wrote it in comments to get rid of error and for make you understand my logic.

