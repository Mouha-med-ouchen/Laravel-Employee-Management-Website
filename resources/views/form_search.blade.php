<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <title>Employee_Form</title>
    <style>
        body {
            background-color: #f8f9fa;
            padding: 30px;
        }

        h1 {
            color: #495057;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            text-align: center;
            vertical-align: middle;
        }

        th {
            background-color: #007bff;
            color: white;
            padding: 10px;
        }

        td {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
        }

        img {
            border-radius: 5px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn {
            margin-top: 5px;
        }

        .table-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    @include('layouts.nav')

    <div class="container">
        
        <h4><a href="{{ route('addemployee') }}" class="btn btn-success">Add New Employee</a></h4>
        <form action="{{route('searchemployee')}}" method="POST" class="d-flex align-items-center gap-2">
            @csrf
            <input class="form-control form-control-lg" type="text" name="search" placeholder="Search..." aria-label="Search">
            <button type="submit" class="btn btn-lg d-flex align-items-center justify-content-center">
                <i class="bi bi-search" style="font-size: 1.5rem;"></i>
            </button>

        </form>

       

        <div class="table-container mt-4">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Mail</th>
                        <th scope="col">CV</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td><img src="{{ asset('photoemployees/' . $employee->photo) }}" alt="Employee Photo" width="100" height="100"></td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->address }}</td>
                            <td><a href="{{route('pdfdownloademployee',$employee->id)}}" ><i class="bi bi-chat-right-text"></i></a></td>

                             <td><a onclick="showDownloadMessage()" href="{{route('pdfdownloademployee',$employee->id)}}" ><i class="bi bi-arrow-down-circle-fill fs-2"></i></a></td>
                            <td><a href="{{route('editemployee',$employee->id)}}" class="btn btn-warning btn-sm">Update</a></td>
                            <td>
                                <a onclick="return confirm('Do you want realy delete this recodr?!')" class="btn btn-danger btn-sm" href="{{ route('deleteemployee', $employee->id) }}">Delete</a>
                            </td>

                        </tr>
                        <script>
                            function showDownloadMessage() {
                                setTimeout(function() {
                                    iziToast.show({
                                        title: 'Success',
                                        message: 'CV is downloaded.',
                                        color: 'green',
                                        position: 'center',
                                        timeout: 5000,
                                        progressBar: true,
                                        animateInside: true,
                                        transitionIn: 'fadeInDown',
                                        transitionOut: 'fadeOutUp',
                                        titleSize: '20px',
                                        messageSize: '16px',
                                        backgroundColor: '#28a745',
                                        class: 'custom-toast',
                                    });
                                }, 2000); 
                            }
                        </script>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
    <a href="{{ route('showemployee') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Go Back
    </a>
</div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
