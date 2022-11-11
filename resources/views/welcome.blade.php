<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="{{URL::asset('css/select2.css')}}">
 <script type="text/javascript" src="{{URL::asset('js/select2.js')}}"></script>
 <script type="text/javascript" src="{{URL::asset('js/event.js')}}"></script>

<style>
    .select2-container .select2-selection--single{
    height:34px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
}   

</style>


<div class="intro-y grid grid-cols-12 gap-6 mt-5" >
    <div class="col-span-12 ">
        <div class="font-medium mt-4">
            <div class="container">
                <div class="row col-md-4">
                  
                        <label>BANK NAME</label>
                        <select class="form-control select2" id="bank">
                          <option value selected="selected" disabled="disabled"></option>
                            @foreach($bank_name as $bank)
                          <option value="{{$bank->bank_name}}">{{$bank->bank_name}}</option>
                            @endforeach
                        </select>
                        
 	            </div>
            </div>
        </div>
    </div>
</div>
            <div class="container col-md-4 mt-4" id="account_types">
              
                <select class="form-control"  id="account_type">
                    <option value selected="selected" disabled="disabled"></option>    
                    <option value="1">Saving</option>
                    <option value="2">Current</option>
                    <option value="3">Credit</option>
                </select>
            </div>    



            
<form action="{{route('account_details')}}" method="POST" class="container col-md-4 mt-4" id="account_details">
        <div class="form-group">
            @csrf
            <input type="hidden" name="selected_bank" id="selected_bank" value="">
            <input type="hidden" name="selected_type" id="selected_type" value="">
            <label for="account_number">Account number</label>
            <input type="text" name="account_number"class="form-control" id="account_number" placeholder="Enter account number" value="{{isset($draft->account_number) ? $draft->account_number :''}}">
        </div>
        <div class="form-group">
            <label for="confirmation_account_number">Confirm Account Number</label>
            <input type="text"   name="confirmation_account_number" class="form-control" id="confirmation_account_number" placeholder="Enter account number" value="{{isset($draft->confirmation_account_number) ? $draft->confirmation_account_number :''}}">
        </div>
        <div class="form-group" >
            <label for="bank_branch">Branch Name</label>
            <input type="text" class="form-control" id="bank_branch" name="bank_branch" placeholder="Branch name"value="{{isset($draft->bank_branch) ? $draft->bank_branch :''}}">
        </div>
        <div class="dynamic-fields">

            </div>
        
        <div class="form-group" id="saving_sources"></div>
        <div class="form-group" id="credit_sources"></div>
        
        <!-- <button type="button" class="btn" id="add-btn">
            <img src="/assets/images/plus.png"class="w-2 h-2 float-right">
        </button>&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button"  class="btn" id="remove-btn">
            <img src="/assets/images/delete.png" alt="The-Estate-Registry" class="w-2 h-2 float-right">
        </button> -->

    <div class="relative">
        <div class="flex mb-4 ">
            <label class="flex mr-5">
                <input id="transfer" name="transfer" class="account-type mr-2 " value="1" type="radio">Transfer Account
            </label>
            <label class="flex mr-5">
                <input id="cancel" name="transfer" class="account-type mr-2" value="0" type="radio">Close Account
            </label>
        </div>
<!--  -->
<div class="row">
    <div class="column" style="float:left;width: 50%;" id="current_holder">
        <div class="px-6 py-4"> 
            <div class="font-bold text-xl mb-2">Current Account Holder </div>
                <div class="grid grid-cols-12 gap-4" >
                    <div class="col-span-12 lg:col-span-6">
                     <label for="first_name_old" class="block font-sans font-medium mb-1 text-gray-400 leading-tighter text-sm">First Name</label>
                        <input placeholder=" " name="first_name_old[]" value="Kari" class="font-sans my-2 py-2 font-medium h-14 block text-base border-gray-300 " id="first_name_old" type="text" autocomplete="off" disabled="">
                    </div>
                <div class="col-span-12 lg:col-span-6">
                      <label for="last_name_old" class="block font-sans font-medium mb-1 text-gray-400 leading-tighter text-sm">Last Name</label>
                        <input placeholder=" " name="last_name_old[]" value="kalan" class=" font-sans my-2 py-2 font-medium h-14 block text-base border-gray-300 " id="last_name_old" type="text" autocomplete="off" disabled="">
                </div>
                <div class="col-span-12 lg:col-span-6">
                       <label for="address_old" class="block font-sans font-medium mb-1 text-gray-400 leading-tighter text-sm">Address</label>
                        <textarea name="address_old[]" class="textarea w-full text-input-grey p-4 rounded-xs font-sans font-normal text-base tracking-normal border border-gray-400" rows="2" id="address_old" disabled="">Madurai</textarea>
                </div>
            </div> 
        </div> 
    </div>
    <div class="column" style="float:left;width: 50%;" id="old_holder">
        <div class="px-6 py-4"> 
            <div class="font-bold text-xl mb-2">Old Account Holder </div>
                <div class="grid grid-cols-12 gap-4" >
                    <div class="col-span-12 lg:col-span-6">
                        <label for="first_name_old" class="block font-sans font-medium mb-1 text-gray-400 leading-tighter text-sm">First Name</label>
                            <input placeholder=" " name="first_name_old[]" value="Kari" class="font-sans my-2 py-2 font-medium h-14 block text-base border-gray-300 " id="first_name_old" type="text" autocomplete="off" disabled="">
                    </div>
                    <div class="col-span-12 lg:col-span-6">
                        <label for="last_name_old" class="block font-sans font-medium mb-1 text-gray-400 leading-tighter text-sm">Last Name</label>
                            <input placeholder=" " name="last_name_old[]" value="kalan" class=" font-sans my-2 py-2 font-medium h-14 block text-base border-gray-300 " id="last_name_old" type="text" autocomplete="off" disabled="">
                    </div>
                    <div class="col-span-12 lg:col-span-6">
                        <label for="address_old" class="block font-sans font-medium mb-1 text-gray-400 leading-tighter text-sm">Address</label>
                            <textarea name="address_old[]" class="textarea w-full text-input-grey p-4 rounded-xs font-sans font-normal text-base tracking-normal border border-gray-400" rows="2" id="address_old" disabled="">Madurai</textarea>
                    </div>
                </div> 
            </div> 
        </div>
    </div>
</div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    $('.select2').select2();
    $("#account_details").on("focusout",function(e) {
 var dataString = $(this).serialize();
  
 $.ajax({
   type: "POST",
   url: "/account_draft",
   data: dataString,
   success: function () {
     $("#message").html("<h2>Contact Form Submitted!</h2>").append("<p>We will be in touch soon.</p>")
       .hide()
       .fadeIn(1500, function () {
         $("#message").append(
           "<img id='checkmark' src='images/check.png' />"
         );
       });
   }
 });

 e.preventDefault();
});
</script>
</body>
</html>


