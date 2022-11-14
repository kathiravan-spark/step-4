<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <!-- Style -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
<!-- jquery link -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Select2 Script -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<body>
    <div class="m-3">
        <label for="bankname" class="form-label">Search Bank Name</label>
            <select class="bank-select-multi" id="bank" multiple="multiple" name="bank[]" style="width:70%;">
                @foreach($bankName as $bankList)
                    <option value="{{$bankList->name}}">{{$bankList->name}}</option>
                @endforeach
            </select>
    </div>
    <div class="dynamic-field m-3"></div>
<script>
$(document).ready(function(){ 

 $(".bank-select-multi").select2({
    tags:true,
    placeholder:'Select the Bank'
 });
 $("select.type").select2({
    tags:true,
    placeholder:'Select the Bank'
 });


 $(document).on('change', '#bank', function(ev) {
    var selected_bank =$('#bank option:selected').toArray().map(item => item.text);  
    alert(selected_bank);
   var type="<select class='form-control type' id='account-type' name='account_type' style='width:70%;'><option value='1'>Saving</option><option value='2'>Credit</option><option value='3'>Current</option></select>"
   
   $(".dynamic-field").append(type);
    alert($('#account-type option:selected'));
   
    });



});



 
    </script>
</body>
</html>


