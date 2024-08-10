<!DOCTYPE html>
<html>
<head>
    <title>Contact Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a href="#" class="navbar-brand"><b>Contact Management Application</b></a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="/contacts" class="nav-item nav-link active">Home</a>
                <a href="/contacts/create" class="nav-item nav-link">New Contact</a>
            </div>
        </div>
    </div>
</nav>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Create New Contact</h5>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        {{session()->get('success')}}
                        <form action="{{ route('contacts.store') }}" method="POST">
                            @csrf
                            <div>
                                <label for="name">Name:</label>
                                <input class="form-control" type="text" id="name" name="name">
                            </div>
                            <div>
                                <label for="email">Email:</label>
                                <input class="form-control" type="email" id="email" name="email">
                            </div>
                            <div>
                                <label for="phone">Phone:</label>
                                <input class="form-control" type="tel" id="phone" name="phone">
                            </div>
                            <div>
                                <label for="address">Address:</label>
                                <textarea class="form-control" id="address" name="address"></textarea>
                            </div><br>
                            <button class="btn btn-primary btn-sm" type="submit">Create Contact</button>
                        </form><br>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
