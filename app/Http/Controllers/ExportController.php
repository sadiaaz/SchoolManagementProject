<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use App\Services\ExportService;

class ExportController extends Controller
{
    protected $export;

    public function __construct(ExportService $export)
    {
        $this->export = $export;
    }

    /*
    |--------------------------------------------------------------------------
    | Users
    |--------------------------------------------------------------------------
    */

    public function usersExcel()
    {
        return $this->export->excel(

            User::select(
                'name',
                'email',
              
            )->get(),

            [
                'Name',
                'Email',
              
            ],

            'users'

        );
    }

    public function usersPDF()
    {
        return $this->export->pdf(

            'Users',

            User::select(
                'name',
                'email',
            
            )->get(),

            [
                'Name',
                'Email',
             
            ],

            'users'

        );
    }

    public function usersPrint()
    {
        return $this->export->print(

            'Users',

            User::select(
                'name',
                'email',
         
            )->get(),

            [
                'Name',
                'Email',
                
            ]

        );
    }

    /*
    |--------------------------------------------------------------------------
    | Students
    |--------------------------------------------------------------------------
    */

    // public function studentsExcel()
    // {
    //     return $this->export->excel(

    //         Student::select(
    //             'name',
    //             'roll_no',
    //             'class'
    //         )->get(),

    //         [
    //             'Name',
    //             'Roll No',
    //             'Class'
    //         ],

    //         'students'

    //     );
    // }

    // public function studentsPDF()
    // {
    //     return $this->export->pdf(

    //         'Students',

    //         Student::select(
    //             'name',
    //             'roll_no',
    //             'class'
    //         )->get(),

    //         [
    //             'Name',
    //             'Roll No',
    //             'Class'
    //         ],

    //         'students'

    //     );
    // }

    // public function studentsPrint()
    // {
    //     return $this->export->print(

    //         'Students',

    //         Student::select(
    //             'name',
    //             'roll_no',
    //             'class'
    //         )->get(),

    //         [
    //             'Name',
    //             'Roll No',
    //             'Class'
    //         ]

    //     );
    // }
}