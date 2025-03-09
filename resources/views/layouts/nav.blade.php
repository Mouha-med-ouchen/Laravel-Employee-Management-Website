<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top mb-5">
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand fw-bold text-white" href="#">Employee</a>
        
        <!-- Toggle button for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="{{route('Homepage')}}">Home page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="{{route('addemployee')}}">Add Employee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="{{route('showemployee')}}">Employees</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Add some margin to the top of your content to avoid overlapping -->
<div style="margin-top: 80px;"></div>
