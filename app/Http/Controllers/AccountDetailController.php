<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankName;
use App\Models\AccountDetail;
use App\Models\AccountDetailDraft;
use App\Jobs\AccountStorageJob;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\directoryExists;

class AccountDetailController extends Controller
{
    public function __construct(BankName $bank_name,AccountDetail $account_detail,AccountDetailDraft $account_detail_drafts)
    {
        $this->bank_name = $bank_name;
        $this->account_detail=$account_detail;
        $this->account_detail_drafts=$account_detail_drafts;
    }
    public function index(){
        $bank_name =$this->bank_name->get();
        return view('welcome',compact('bank_name'));
    }
    public function draftDetails(Request $request){
      $selected_bank= $request->selected_bank;
      $bank=$this->bank_name->where('bank_name',$selected_bank)->first();
      $bank_id= $bank->id;
      $account_number=$request->account_number;
      $confirmation_account_number=$request->confirmation_account_number;
      $source=$request->saving_account;
      $selected_type=$request->selected_type;

      $draft=$this->account_detail_drafts->create([
        
        'user_id'=>'1',
        'bank_id'=> $bank_id,
        'bank_short_name'=>$bank->bank_short_name,
        'account_number'=>$account_number,
        'confirmation_account_number'=>$confirmation_account_number,
        'bank_branch'=>'rty',
        'account_name'=>'rty',
        'source'=>$source,
        'account_type'=>$selected_type,
      ]);     
      return view('/welcome',compact('draft'));
    }
    public function accountDetails(Request $request){
      
        $selected_bank= $request->selected_bank;
        $bank=$this->bank_name->where('bank_name',$selected_bank)->first();
        $bank_id= $bank->id;
        $account_number=$request->account_number;
        $confirmation_account_number=$request->confirmation_account_number;
        $source=$request->saving_account;
        $selected_type=$request->selected_type;
        $job = new AccountStorageJob($bank_id,$account_number,$confirmation_account_number,$source,$selected_type);
        dispatch($job);
    return redirect()->route('index')->with('success', 'DEtails Added Successfully');
    }
}
