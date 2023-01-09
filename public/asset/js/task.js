$(document).ready(function(){

    $(".bank-select-multi").select2();
    $(document).on('change', '#bank', function(ev) {
        let selected_bank = '';
         selected_bank = $(this).val();
         let currentBankId =selected_bank[selected_bank.length - 1];

       
        var type="<div class='bank-id' id='"+currentBankId+"' ><select class='form-control type'id='account-type' name='account_type' style='width:50%;'><option></option><option value='1'>Saving</option><option value='2'>Credit</option><option value='3'>Current</option></select></div><br>";
 
        if($("#"+currentBankId).length == 0){
            $(".dynamic-field").append(type);
        }
        if(selected_bank == ''){
            $(".dynamic-field").empty();
        }
    });
    $(document).on('click','.select2-selection__choice__remove',function(){

        var a = $(this).attr('aria-describedby');
        console.log(a)
        let arr = a.split('-');
        let id = arr[5]+'-'+arr[6]+'-'+arr[7]+'-'+arr[8]+'-'+arr[9];
        $('#'+id).empty();
        $(".dynamic-form").empty();
        $(".final-result").empty();
    })


    $(document).on('change', '#account-type', function(ev) {

        var selected_bank =$('#bank option:selected').toArray().map(item => item.value);
        console.log(selected_bank);
        var account_type = $('#account-type option:selected').val();
        console.log(account_type);
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "get-user/",
            type: 'POST',
            _token : "{{ csrf_token() }}",
            data: {
                selected_bank:selected_bank,
                account_type:account_type,
            },
            success: function (data) {
                console.log(data);
                if(data['result']!=null){
                var account_number = data['result']['account_number'];
                var account_name = data['result']['account_name'];
                var form ="<div class='flex text-white'><label text-white for='account_number'>Account Number</label><input type='text'style='width:20%;class='form-control' value='"+account_number+"' readonly id='account_number'>&nbsp&nbsp<input type='radio'name='options' value='1'id='transfer'>&nbsp<label for='transfer'>Transfer Account</label>&nbsp&nbsp<input type='radio' value='2' name='options'id='close'>&nbsp<label for='close'>Close Account</label><input type='hidden' value='"+account_name+"'id='account_name'><div class='result'></div></div>";
                }
                else{
                    var account_number = '';
                    console.log(selected_bank);
                    var csrf_token = "{{ csrf_token() }}";
                    var form ="<form method='post' action='{{route('add-account')}}'><input name='_token' value='"+csrf_token+"' type='hidden'><div class='form-group text-white'><label for='account_number'>Account Number</label><input type='number'style='width:70%;'required class='form-control' name='account_number' id='account_number'placeholder='Enter account number'></div><div class='form-group'><small id='acccountnumberHelp' class='form-text text-muted'>We'll never share your account number with anyone else.</small><input type ='hidden' name='bank_id' value='"+selected_bank+"'><input type='hidden' name='account_type' value='"+account_type+"'><label class='text-white' for='account_name'>Account Name</label><input name='account_name' required style='width:70%;'type='text' class='form-control'  id='account_name'placeholder='Account Name'></div><div><button type='submit' class='btn btn-primary'>Submit</button>&nbsp&nbsp<button class='btn btn-danger' id='remove'>Close</button></div></form>.";
                }
                console.log(account_number)
                $(".dynamic-form").append(form);
            },
            error: function (data) {
                alert('error')
            }
        });
        $(document).on("click","#remove",function() {
            $(".dynamic-form").empty();
            });
    
    });

    $(document).on("click","#transfer",function() {
        $(".final-result").empty();
      var value= $('#transfer').val();
      var account_name = $("#account_name").val();
      console.log(value);
      console.log(account_name);
      $.ajax({
        url: "get-result/",
        type: 'POST',
        data: {value:value,
            account_name:account_name},
        success: function (data) {
            var result = data['result'];
            console.log(result);
            var user = Object.keys(result);
            var nominee = Object.values(result);
            var user_name = user['3'];
            var user_email = user['4'];
            var user_address = user['5'];
            var user_state= user['6'];
            var user_postal_code = user['1'];
            var nominee_name = nominee['3'];
            var nominee_email = nominee['4'];
            var nominee_address = nominee['5'];
            var nominee_state= nominee['6'];
            var nominee_postal_code = nominee['1'];

             var result = "<div class='container'><div class='row  border'><div class='col-lg-6 my-3'><div class='card'><div class='card-header'><h5 class='card-title'>Current Account Holder</h5></div><div class='card-body'><h6 class='card-subtitle mb-2 text-muted'>"+user_name+",</h6><p>"+user_email+",<br>"+user_address+",<br>"+user_state+" - "+user_postal_code+"</p></div></div></div><div class='col-lg-6 my-3'><div class='card'><div class='card-header'><h5 class='card-title'>New Account Holder</h5></div><div class='card-body'><h6 class='card-subtitle mb-2 text-muted'>"+nominee_name+",</h6><p>"+nominee_email+",<br>"+nominee_address+",<br>"+nominee_state+" - "+nominee_postal_code+".</p></div></div></div></div></div></div>";

             $(".final-result").append(result);
        },
        error: function (data) {
            alert('error')
        }
    });

    });
        
    $(document).on("click","#close",function() {
        $(".final-result").empty();
        var value= $('#close').val();
        var account_name = $("#account_name").val();
        console.log(value);
        console.log(account_name);
        $.ajax({
            url: "get-result/",
            type: 'POST',
            data: {value:value,
                account_name:account_name},
            success: function (data) {
                var user = data['result'];
                console.log(result);
                var user_name = user['name'];
                var user_email = user['email'];
                var user_address = user['address'];
                var user_state = user['state'];
                var user_postal_code = user['postal_code'];

                var result ="<div class='container'><div class='row'><div class='col-lg-6 m-3'><div class='card'><div class='card-header'><h5 class='card-title'>Current Account Holder</h5></div><div class='card-body'><h6 class='card-subtitle mb-2 text-muted'>"+user_name+"</h6><p>"+user_email+",<br>"+user_address+",<br>"+user_state+"-"+user_postal_code+",<br></p></div></div></div></div></div>";
                 $(".final-result").append(result);
            },
            error: function (data) {
                alert('error')
            }
        });

    });
});