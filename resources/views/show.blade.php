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
                    <h5 class="card-title">Contact Details</h5>
                </div>
                <div class="card-body">
                    <div class="col-md-6 offset-md-3 text-center">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $contact->name }}</h5>
                                <p class="card-text">Email: {{ $contact->email }}</p>
                                <p class="card-text">Phone: {{ $contact->phone }}</p>
                                <p class="card-text">Address: {{ $contact->address }}</p>
                                <p class="card-text">Created At: {{ $contact->created_at }}</p>
                                <p class="card-text">Updated At: {{ $contact->updated_at }}</p>
                            </div>
                        </div><br>
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back to Contacts</a>
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
