<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Voucher;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;

class ProfitLossController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function getData(Request $request){
        //get the start date and end date and parse it to proper format
        $startDate = Carbon::parse($request->input('startDate'))->format('Y-m-d');
        $endDate = Carbon::parse($request->input('endDate'))->format('Y-m-d');

        //get the income accounts
        $incomeAccs = Account::where('Type','=',2)->get(['Code']);
        $incomeVouchers = new Collection();
        $incomeDetails = new Collection();

        //assign it to income vouchers
        foreach ($incomeAccs as $incomeAcc)
            $incomeVouchers = $incomeVouchers->merge($incomeAcc->vouchers->whereBetween('vDate', array($startDate, $endDate))->get());

        //assign to income details
        foreach($incomeVouchers as $incomeVoucher)
            $incomeDetails = $incomeDetails->merge($incomeVoucher->details->all());

        //get the expenses accounts
        $expensesAccs = Account::where('Type','=',1)->get(['Code']);
        $expensesVouchers = new Collection();
        $expensesDetails = new Collection();

        //assign it to expenses vouchers
        foreach($expensesAccs as $expensesAcc)
            $expensesVouchers = $expensesVouchers->merge($expensesAcc->vouchers->whereBetween('vDate', array($startDate, $endDate))->get());

        //assign to expenses details
        foreach($expensesVouchers as $expensesVoucher)
            $expensesDetails = $expensesDetails->merge($expensesVoucher->details->all());

        //pass collections to view "profit&loss"
        return view('profit&loss',compact('incomeVouchers','incomeDetails','expensesVouchers','expensesDetails'));
    }
}
