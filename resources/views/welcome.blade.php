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

            <!-- header -->
<nav class="navbar navbar-expand-lg  navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="{{asset('asset/brand/task.jpg')}}" width="200" height="100" class="d-inline-block align-top" alt="logo">
    </a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <h4 class="nav-link" href="#">Step-4</h4>
            </li>
        </ul>
    </div>
</nav>
            <!-- body -->

<div class=m-2> <h4> Add Nominee and Bank Details</h4>
  <div class="row">
    <div class="col-sm">
        <form method="post" action="{{route('add-user')}}">
            <div class="form-group">
                <label for="myInput">Email address</label>
                <input type="email" class="form-control" id="myInput" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-sm">
        <div class="flex p-2 bg-dark m-4">
            <div class="">
                <label for="bankname" class="form-label text-white">Search Bank Name</label>
                <select class="bank-select-multi" id="bank" multiple="multiple" name="bank[]" style="width:70%;">
                    @foreach($bankName as $bankList)
                        <option value="{{$bankList->id}}">{{$bankList->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="m-3">
                <div class ="dynamic-field m-3"></div>
                <div class ="dynamic-form m-3"></div>
                <div class = "final-result m-3"></div>
            </div>
        </div>
    </div>
  </div>
</div>
<script>
    
    var myInput = document.getElementById("myInput");
    if (sessionStorage.getItem("autosave"))
        myInput.value = sessionStorage.getItem("autosave");

    myInput.addEventListener("change", function() {
        sessionStorage.setItem("autosave", myInput.value);
    });
</script>
<script src="{{ asset('asset/js/task.js')}}"></script>
</body>
</html>


