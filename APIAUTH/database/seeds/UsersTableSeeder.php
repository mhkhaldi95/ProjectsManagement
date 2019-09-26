<?php

use App\Student;
use App\Teacher;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 11; $i <= 21; $i++) {
            User::create([

                'username' => "username" . $i,
                'email' => "email@email" . $i,
                'password' => Hash::make(111),

                'role' => 2,
                ]);
      }
   $g=100;
//             for ($i=1;$i<=10;$i++) {
//                 Student::create([
//
//                     'name' => "name" . $i,
//                     'phone' => $g++,
//                     'IDD' => Hash::make(111),
//                     'specialization' => "Eng",
//                     'level' => 4,
//                     'project_id' => 0,
//                     'user_id' => $i
//
//                 ]);
    //         }
        for ($i=11;$i<=21;$i++) {
            Teacher::create([

                'name' => "name" . $i,
                'phone' => $g++,
                'IDD' => Hash::make(111),
                'specialization' => "Eng",


                'user_id' => $i

            ]);
        }


        // }


////        }
///
//        factory(App\User::class, 10)->create()->each(function ($user) {
//            $user->details_std()->save(factory(App\Student::class)->make());
//        });

    }
        /*
         *  if($data['type']=="Student"){

               $objstd->name = $data['name'];
               $objstd->phone = $data['phone'];
               $objstd->IDD = $data['IDD'];
               $objstd->specialization = $data['specialization'];
               $objstd->level = $data['level'];


             $user =   User::create([

              'username' => $data['username'],
              'email' => $data['email'],
              'password' => Hash::make($data['password']),
               'role' =>1,
          ]);
          $user ->details_std()->save($objstd);
              return $user;

           }else {


                         $objtech->name = $data['name'];
                          $objtech->phone = $data['phone'];
                         $objtech->IDD = $data['IDD'];
               $objtech->specialization = $data['specialization'];


                   $user =   User::create([

                       'username' => $data['username'],
                       'email' => $data['email'],
                       'password' => Hash::make($data['password']),
                       'role' =>2,
                   ]);
                   $user ->details_tech()->save($objtech);
                   return $user;*/

}
