<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankNameModel;
use App\Models\UserBankDetailModel;
use App\Models\UserModel;
use App\Models\UserNomineesModel;
use App\Jobs\AccountStorageJob;
use Illuminate\Support\Facades\DB;


class AccountDetailController extends Controller
{
    public function __construct(BankNameModel $bankName,UserBankDetailModel $userBankDetail,UserModel $users,UserNomineesModel $userNominees)
    {
        $this->bankName = $bankName;
        $this->userBankDetail=$userBankDetail;
        $this->users=$users;
        $this->userNominees=$userNominees;
    }
    public function index(){
        $bankName =$this->bankName->get();
        return view('welcome',compact('bankName'));
    }
    public function getUser(Request $request){
     $banks = $request->selected_bank;

     $accountType = $request->account_type;
     foreach($banks as $bank){
      $data=$this->userBankDetail->where(['bank_id' => $bank ,'account_type' => $accountType])->with('getUser')->first();
      return response()->json(array('success' => true,'result'=>$data));
     }
    }
    public function getResult(Request $request)
    {
      $value = $request->value;
      $accountName = $request->account_name;

      $userbankDetail = $this->userBankDetail->where('account_name',$accountName)->with('getUser')->first();
      $userNominees = $this->userNominees->where('user_id',$userbankDetail->user_id)->with('getUser','getNominee')->first();
      if($value == 1){
       $user = $nominee=[];
       $user = $userNominees->getUser->toArray();
       array_splice($user, count($user) - 3,3);
       $nominee = $userNominees->getNominee->toArray();
       array_splice($nominee, count($nominee) - 3,3);
       $data =  array_combine($user,$nominee);
        return response()->json(array('success' => true,'result'=>$data));
      }else {
        $data = $userNominees->getUser->toArray();
        return response()->json(array('success' => true,'result'=>$data));

      }
    }

    public function addAccount(Request $request){

       $request->validate([
        'account_number' => 'required|unique:bank_details,account_number|max:13',
        'account_name' => 'required|',
      ]);
 
      $selectedBank  = $request->bank_id;
      $accountNumber = $request->account_number;
      $accountName = $request->account_name;
      $userId = $this->users->where('name',$accountName)->select('id')->first();
      // dd($user_id);
      if($userId == null){
        $this->users->create([
          'name' => $accountName,
        ]);
       
      }
        $userId = $userId['id'];
      $selectedType = $request->account_type;
      $this->userBankDetail->create([
          'user_id'=>$userId,
          'bank_id'=> $selectedBank,
          'account_number'=>$accountNumber,
          'account_name'=>$accountName,
          'account_type'=>$selectedType,
        ]);
      return redirect('/')->with('successfully added');
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
