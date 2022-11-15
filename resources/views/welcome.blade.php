<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- Style -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
    <!-- jquery link -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Select2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <title>Step-4</title>
<body>

    <div class="m-3">
        <label for="bankname" class="form-label">Search Bank Name</label>
            <select class="bank-select-multi" id="bank" multiple="multiple" name="bank[]" style="width:70%;">
                @foreach($bankName as $bankList)
                    <option value="{{$bankList->id}}">{{$bankList->name}}</option>
                @endforeach
            </select>
    </div>
    <div class="m-3">
        <div class ="dynamic-field m-3"></div>
        <div class ="dynamic-form m-3"></div>
    </div>
<script>
$(document).ready(function(){

 $(".bank-select-multi").select2({
    tags:true,
    placeholder:'Select the Bank'
 });

    $(document).on('change', '#bank', function(ev) {
        var type="<select class='form-control type' id='account-type' name='account_type' style='width:50%;'><option></option><option value='1'>Saving</option><option value='2'>Credit</option><option value='3'>Current</option></select>"
        $(".dynamic-field").append(type);
            $("select.type").select2({
                tags:true,
                placeholder:'Select the Bank',
            });
    });


    $(document).on('change', '#account-type', function(ev) {

        var selected_bank =$('#bank option:selected').toArray().map(item => item.value);
        alert(selected_bank);
        var account_type = $('#account-type option:selected').val();
        alert(account_type);
      
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
            $.ajax({
                url: "get-user/",
                type: 'POST',
                data: {
                    selected_bank:selected_bank,
                    account_type:account_type,
                },
            success: function (data) {
              
            },
            error: function (data) {
                alert('error')
            }
        });
        var form ="<form><div class='form-group' ><label for='account_number'>Account Number</label><input type='text'style='width:70%;' pattern='[0-9]{13}'class='form-control'id='account_number'aria-describedby='emailHelp' placeholder='Enter email'></div><div class='form-group'><small id='acccountnumberHelp' class='form-text text-muted'>We'll never share your account number with anyone else.</small><label for='account_name'>Account Name</label><input style='width:70%;' type='text' class='form-control' id='account_name'placeholder='Password'></div><div><button type='submit' class='btn btn-primary'>Submit</button></form>."

        $(".dynamic-form").append(form);
    });
});



 
    </script>
</body>
</html>


