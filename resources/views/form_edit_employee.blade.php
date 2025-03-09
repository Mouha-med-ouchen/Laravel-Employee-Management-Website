<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Form</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        .profile-img {
            border: solid black;
            height: 100px;
            transition: transform 0.3s ease-in-out;
        }
        .profile-img:hover {
            transform: scale(1.1);
        }

        .btn-update {
            background: linear-gradient(45deg, #007bff, #6610f2);
            border: none;
            font-size: 18px;
            transition: 0.3s;
        }
        .btn-update:hover {
            background: linear-gradient(45deg, #6610f2, #007bff);
        }
    </style>
</head>
<body class="bg-light">

    @include('layouts.nav')

    <div class="container mt-5">
        <div class="card shadow-lg border-0 p-4">
            <h4 class="text-center mb-4 text-primary">Edit Employee Data</h4>
            <p class="text-center text-muted">Updating details for: <strong>{{ $employee->email }}</strong></p>

            <form action="{{ route('updateemployee', $employee->id) }}" method="POST" enctype="multipart/form-data">
                 @if ($errors->any())
              <div class="">
                 <ul class="mb-0">
                   <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    @foreach ($errors->all() as $error)
                                        iziToast.show({
                                            title: 'Error',
                                            position: 'topLeft',
                                            message: '{{ $error }}',
                                            color: 'red'
                                        });
                                    @endforeach
                                });
                            </script>
                 </ul>
                </div>
            @endif
                @csrf
                <div class="row">
                    <!-- Name -->
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label fw-bold">Name:</label>
                        <input type="text" id="name" class="form-control form-control-lg" 
                               value="{{ $employee->name }}" name="name" placeholder="Enter Name">
                    </div>

                    <!-- Phone -->
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label fw-bold">Phone:</label>
                        <input type="text" id="phone" class="form-control form-control-lg"  
                               value="{{ $employee->phone }}" name="phone" placeholder="Enter Phone">
                    </div>

                    <!-- Email -->
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label fw-bold">Email:</label>
                        <input type="email" id="email" class="form-control form-control-lg"  
                               value="{{ $employee->email }}" name="email" placeholder="Enter Email">
                    </div>

                    <!-- Address -->
                    <div class="col-md-6 mb-3">
                        <label for="address" class="form-label fw-bold">Address:</label>
                        <input type="text" id="address" class="form-control form-control-lg"  
                               value="{{ $employee->address }}" name="address" placeholder="Enter Address">
                    </div>

                    <!-- Existing Photo -->
                    <div class="col-md-12 mb-3">
                        <label for="photo" class="form-label fw-bold">New CV:</label>
                        <input class="form-control form-control-lg" type="file" name="pdfresume" id="photo">
                    </div>
                    <div class="col-md-12 mb-3 text-center">
                        <label class="form-label fw-bold">Current Photo:</label>
                        <br>
                        <img src="{{ asset('photoemployees/' . $employee->photo) }}" alt="Employee Photo" 
                             class="img-thumbnail rounded-circle shadow profile-img" width="120" height="120">
                    </div>

                    <!-- New Photo Upload -->
                    <div class="col-md-12 mb-3">
                        <label for="photo" class="form-label fw-bold">Upload New Photo:</label>
                        <input class="form-control form-control-lg" type="file" name="photo" id="photo">
                    </div>
                   
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-update px-4 py-2 text-white rounded-pill">
                        UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
