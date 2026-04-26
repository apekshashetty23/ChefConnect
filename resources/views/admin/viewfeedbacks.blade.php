<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ChefConnect | View Feedbacks</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #fafafa;
        }

        /* SIDEBAR */
        .admin-sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            background: linear-gradient(to bottom, #ff5e62, #ff9966);
            color: #fff;
            padding: 30px 20px;
        }

        .admin-sidebar h2 {
            text-align: center;
            margin-bottom: 40px;
            font-weight: 700;
        }

        .admin-sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #fff;
            text-decoration: none;
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 10px;
            transition: 0.3s;
        }

        .admin-sidebar a:hover,
        .admin-sidebar a.active {
            background: rgba(255,255,255,0.2);
        }

        /* CONTENT */
        .admin-content {
            margin-left: 260px;
            padding: 40px;
        }

        .page-title {
            font-weight: 600;
            color: #ff5c5c;
            margin-bottom: 25px;
        }

        .table-card {
            background: #fff;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        table thead {
            background: #ff5e62;
            color: #fff;
        }

        table th, table td {
            vertical-align: middle;
        }

        .badge-user {
            background: #ffe3e3;
            color: #dc3545;
            font-weight: 500;
            padding: 6px 10px;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<!-- ===== SIDEBAR ===== -->
<div class="admin-sidebar">
    <h2>🍳 ChefConnect</h2>

    <a href="{{ route('admin.dashboard') }}">
        <i class="fa fa-home"></i> Dashboard
    </a>

    <a href="{{ route('admin.addrecipe') }}">
        <i class="fa fa-utensils"></i> Add Recipe
    </a>

    <a href="{{ route('admin.recipes') }}">
        <i class="fa fa-eye"></i> View Recipes
    </a>

    <a href="{{ route('admin.feedbacks') }}" class="active">
        <i class="fa fa-comment"></i> Feedbacks
    </a>

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit"
            style="background:none;border:none;color:white;width:100%;text-align:left;padding:12px 15px;border-radius:10px;">
            <i class="fa fa-sign-out-alt me-2"></i> Logout
        </button>
    </form>
</div>

<!-- ===== CONTENT ===== -->
<div class="admin-content">

    <h3 class="page-title">💬 User Feedbacks</h3>

    <div class="table-card">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Feedback Message</th>
                </tr>
            </thead>
            <tbody>
                @forelse($feedbacks as $feedback)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <span class="badge-user">
                            {{ $feedback->name }}
                        </span>
                    </td>
                    <td>{{ $feedback->email }}</td>
                    <td>{{ $feedback->message }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted py-4">
                        No feedbacks available yet 😴
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

</body>
</html>
