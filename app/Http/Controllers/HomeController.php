<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\Employee;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_count = User::count();
        $state_count = State::count();
        $city_count = City::count();
        $country_count = Country::count();
        $department_count = Department::count();
        $employee_count = Employee::count();

        return view('admin.pages.dashboard', compact(
            'user_count',
            'state_count',
            'city_count',
            'country_count',
            'department_count',
            'employee_count'
        ));
    }

    public function generateReport()
    {
        $user_count = User::count();
        $state_count = State::count();
        $city_count = City::count();
        $country_count = Country::count();
        $department_count = Department::count();
        $employee_count = Employee::count();

        $pdf = PDF::loadView('admin.pages.Report.report', compact(
            'user_count',
            'state_count',
            'city_count',
            'country_count',
            'department_count',
            'employee_count'
            ))
            ->setPaper('a4')
            ->setOptions([
                'tempDir' => public_path(),
                'chroot' => public_path(),
            ]);
        return $pdf->download('report.pdf');
    }
}
