

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- izi --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Employee_Form</title>
</head>
<body>
@include('layouts.nav')
<div class="container mt-5" >
    <div class="card shadow-lg p-4 ">
        <h2 class="text-center mb-4">Create Employee</h2>
        <form action="{{route('createemployee')}}" method="POST" enctype="multipart/form-data">
            @if ($errors->any())
                  <div class="">
                    <ul class="mb-0">
                         @if ($errors->any())
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    @foreach($errors->all() as $error)
                                        iziToast.show({
                                            title: 'Error',
                                            position: 'topLeft',
                                            message: '{{ $error }}',
                                            color: 'red'
                                        });
                                    @endforeach
                                });
                            </script>
                        @endif
                 </ul>
                </div>
            @endif

            @csrf
            <div class="row">
                <!-- Name -->
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name:<span class="text-danger">*</span></label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Enter Name">
                </div>
                <!-- Phone -->
                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Phone:<span class="text-danger">*</span></label>
                    <input type="text" id="phone" class="form-control" name="phone" placeholder="Enter Phone">
                </div>
                <!-- Email -->
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email:<span class="text-danger">*</span></label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="Enter Email">
                </div>
                <!-- Address -->
                <div class="col-md-6 mb-3">
                    <label for="address" class="form-label">Address:<span class="text-danger">*</span></label>
                    <input type="text" id="address" class="form-control" name="address" placeholder="Enter Address">
                </div>
                <!-- Photo -->
                <div class="col-md-12 mb-3">
                    <label for="photo" class="form-label">Photo:<span class="text-danger">*</span></label>
                    <input class="form-control" type="file" name="photo" id="photo">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="photo" class="form-label">CV:<span class="text-danger">*</span>
                   </label>
                    <input class="form-control" type="file" name="pdfresume" id="photo">
                </div>
            </div>
            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Create</button>
            </div>
        </form>
      


    </div>
</div>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</body>
</html>