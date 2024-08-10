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
                    <h5 class="card-title">Search Contact</h5>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form action="{{ route('contacts.index') }}" method="GET">
                            <div class="form-group">
                                <label for="name">Name or Email</label>
                                <input type="text" class="form-control" id="search" name="search" value="{{ request()->search }}" placeholder="Search by name or email">
                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Contact List</h5>
                </div>
                <div class="card-body">
                        <div class="float-left">
                            <form action="{{ route('contacts.index') }}" method="GET">
                                <label for="sort">Sort by:</label>
                                <select name="sort" id="sort">
                                    <option value="">Select option</option>
                                    <option value="name" {{ request('sort') == 'name'? 'selected' : '' }}>Name (A-Z)</option>
                                    <option value="created_at" {{ request('sort') == 'created_at'? 'selected' : '' }}>Created At (Oldest)</option>
                                </select>
                                <button type="submit">Sort</button>
                            </form>
                        </div>
                        <div style="margin-bottom: 10px;" class="float-right">
                        <a href="{{ route('contacts.create') }}" class="btn btn-sm btn-primary">Add Contact</a>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->created_at }}</td>
                                <td>
                                    <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form style="display: inline;" action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        @if(session()->has('success'))
        alert("{{ session()->get('success') }}");
        @endif
    </script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
