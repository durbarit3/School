<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Income;
use App\Expanse;
use App\IncomeHeader;
use App\ExpanseHeader;
use App\EmployeeSalary;
use App\FeesCollection;
use App\Menu as AppMenu;
use App\StudentAdmission;
use Illuminate\Http\Request;
use Harimayco\Menu\Facades\Menu;
use Harimayco\Menu\Models\Menus;
use App\Http\Controllers\Controller;
use Harimayco\Menu\Models\MenuItems;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // show home page
    public function index()
    {
        //$query = @unserialize (file_get_contents('http://ip-api.com/php/'));
        //dd($query);
        $employees = Admin::where('employee_status', 1)->where('deleted_status', NULL)->get(['id', 'role']);
        $totalEmployee = $employees->count();
        
        $totalStudent = StudentAdmission::where('status', 1)->where('deleted_status', NULL)->count();
        $teachers = $employees->filter(function($emp){
            return $emp->role == 3;
        });
        $totalTeacher = $teachers->count();
        
        $admins = $employees->filter(function($emp){
            return $emp->role == 2;
        });
        $totalAdmin = $admins->count();
        return view('admin.home.home',compact('totalEmployee', 'totalStudent', 'totalTeacher', 'totalAdmin'));
    }

    // show menu page

    public function menuSetting()
    {
        $menuList = Menu::get(1);
        $public_menu = Menu::getByName('Public');
        return view('admin.setting.menu_setting',compact('menuList','public_menu'));
    }

    
    public function urlSetting()
    {
        return view('admin.setting.url_setting');
    }

    public function getUrlName($id)
    {
        return AppMenu::where('type',$id)->get();
    }

    public function expanseArray()
     {
        $expanseHeaders = ExpanseHeader::with(['expanses'])->where('status', 1)->where('deleted_status', NULL)->get();
        $myArray = [
            ['Expanse', 'Header']
        ];
        foreach ($expanseHeaders as $expanseHeader) {
            
            if ($expanseHeader->expanses->count() > 0) {
                $totalExpanse = 0;
                $expanses = $expanseHeader->expanses->filter(function($expanse){
                    return $expanse->month == date('F') && $expanse->year == date('Y');
                });
                foreach ($expanses as $expanse) {
                    $totalExpanse += $expanse->amount;
                }
                array_push($myArray, [$expanseHeader->name, $totalExpanse]);
            }else {
                array_push($myArray, [$expanseHeader->name, 0]);
            }
        }
        return $myArray;
     }  
     
     public function incomeArray()
     {
        $incomeHeaders = IncomeHeader::with(['incomes'])->where('status', 1)->where('deleted_status', NULL)->get();
        $myArray = [
            ['income', 'Header']
        ];
        foreach ($incomeHeaders as $incomeHeader) {
            
            if ($incomeHeader->incomes->count() > 0) {
                $totalIncome = 0;
                $incomes = $incomeHeader->incomes->filter(function($income){
                    return $income->month == date('F') && $income->year == date('Y');
                });
                foreach ($incomes as $income) {
                    $totalIncome += $income->amount;
                }
                array_push($myArray, [$incomeHeader->name, $totalIncome]);
            }else {
                array_push($myArray, [$incomeHeader->name, 0]);
            }
        }
        return $myArray;
     }


     public function financialChartData()
     {
        $expanses = Expanse::where('status', 1)
        ->where('deleted_status', NULL)
        ->where('month', date('F'))->where('year', date('Y'))->get(['id', 'amount']);

        $totalExpanse = 0;
        foreach ($expanses as $expanse) {
            $totalExpanse += $expanse->amount;
        }
        
        $incomes = Income::where('status', 1)
        ->where('deleted_status', NULL)
        ->where('month', date('F'))->where('year', date('Y'))->get(['id', 'amount']);

        $totalIncome = 0;
        foreach ($incomes as $income) {
            $totalIncome += $income->amount;
        }

        $fees = FeesCollection::all();
        $month = date('F');
        $year = date('Y');
        $totalFees = 0;
        foreach ($fees as $fee) {
            $getMonthFess = array_filter($fee->collection,function($c) use ($month, $year){
                return $c['month'] == $month && $c['year'] == $year && $c['is_paid'] == 1;
            });

            foreach ($getMonthFess as $fee) {
                $totalFees += $fee['paid']; 
            }
        }  

        $salaries = EmployeeSalary::where('month', date('F'))
        ->where('year', date('Y'))->where('is_paid', 1)->get();
        $totalSalary = 0;
        foreach ($salaries as $salary) {
            $totalSalary += $salary->total_paid;
        }
       return $amountArray = [$totalExpanse, $totalIncome, $totalFees, $totalSalary];
     }
}
