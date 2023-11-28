<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test Application</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h1>Customer Form</h1>
        
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
       @endif

        <form action="{{ route('store.customer') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Customer name" name="name" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="name@example.com" name="email" id="email" value="{{ old('email') }}">
                <span id="emailError"></span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Phone</label>
                <input type="number" class="form-control" placeholder="Contact number" name="phone" id="phone" value="{{ old('phone') }}">
                <span id="phoneError"></span>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Address</label>
                <input type="text" class="form-control" placeholder="Address" name="address" value="{{ old('address') }}">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Pincode</label>
                <input type="text" class="form-control" placeholder="Pincode" name="pincode" value="{{ old('pincode') }}">
            </div>

            <div class="">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</body>


<script>

  
// $(document).ready(function(){
//       console.log("hello")
// })


$(document).on('keyup','#email',function(){
      let email = $('#email').val()

      $.ajax({
            method: "GET",
            url: "/checkEmail",
            data: {email: email},
            success : function(response){
                    if(parseInt(response))
                    {
                        $('#emailError').text('Email already exist')
                        $('#emailError').removeClass('text-success')
                        $('#emailError').addClass('text-danger')
                    }
                    else{
                        $('#emailError').text('Valid email')
                        $('#emailError').removeClass('text-danger')
                        $('#emailError').addClass('text-success')
                    }
            }
        })
})


$(document).on('keyup','#phone',function(){
      let phone = $('#phone').val()

      $.ajax({
            method: "GET",
            url: "/checkPhoneNumber",
            data: {phone: phone},
            success : function(response){
                    if(parseInt(response))
                    {
                        $('#phoneError').text('Phone number already exist')
                        $('#phoneError').removeClass('text-success')
                        $('#phoneError').addClass('text-danger')
                    }
                    else{
                        $('#phoneError').text('Valid phone number')
                        $('#phoneError').removeClass('text-danger')
                        $('#phoneError').addClass('text-success')
                    }
            }
        })
})

</script>

</html>
