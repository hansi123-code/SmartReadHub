<!DOCTYPE html>
<html lang="en">
<head>
    <title>Users Management | Admin</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="admin-body">

<div class="admin-container">

    <!-- HEADER -->
    <div class="page-header">
        <div>
            <h1>Users Management</h1>
            <p>Manage all registered users in the system</p>
        </div>
        <div class="header-icon">
            <i class="fas fa-users"></i>
        </div>
    </div>

    @if(session('success'))
    <div class="success-alert">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
    @endif

    <!-- TOOLBAR -->
    <div class="toolbar">
        <form method="GET" class="search-box">
            <i class="fas fa-search"></i>
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search by name or email..."
            >
            <button type="submit">Search</button>
        </form>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <p>Total Users</p>
                <h2>{{ $users->total() }}</h2>
            </div>
        </div>
    </div>

    <!-- TABLE -->
    <div class="table-card">
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Joined</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    @php
                        // Avatar initials logic
                        $nameParts = explode(' ', $user->name);
                        $initials = strtoupper(substr($nameParts[0], 0, 1));
                        if(isset($nameParts[1])){
                            $initials.= strtoupper(substr($nameParts[1], 0, 1));
                        }
                    @endphp
                    <tr>
                        <td>
                            <div class="user-cell">
                                <div class="avatar">
                                    {{ $initials }} <!-- CP, DP වගේ එන්නේ -->
                                </div>
                                <span class="font-semibold">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td class="text-gray">{{ $user->email }}</td>
                        <td class="text-center">
                            <span class="badge-role {{ $user->role == 'admin'? 'badge-admin' : 'badge-user' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="text-center text-gray">{{ $user->created_at->format('d M Y') }}</td>
                        <td class="text-center">
                            <form method="POST" action="{{ route('admin.users.delete',$user->id) }}" onsubmit="return confirm('Delete this user?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn-delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty-state">
                            <i class="fas fa-users"></i>
                            <p>No users found</p>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- PAGINATION -->
    <div class="pagination-wrapper">
        {{ $users->links() }}
    </div>

</div>

<style>
* { margin: 0; padding: 0; box-sizing: border-box; }
.admin-body{
    font-family: 'Inter', sans-serif;
    background: #f5f7fa;
    padding: 32px 20px;
    min-height: 100vh;
}
.admin-container{
    max-width: 1200px;
    margin: 0 auto;
    animation: fadeIn 0.4s ease;
}
@keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

/* HEADER */
.page-header{
    background: linear-gradient(135deg, #4338ca 0%, #2563eb 100%);
    border-radius: 16px;
    padding: 32px;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 8px 24px rgba(67, 56, 202, 0.25);
}
.page-header h1{ font-size: 32px; font-weight: 700; }
.page-header p{ margin-top: 6px; color: rgba(255,255,255,0.9); font-size: 14px; }
.header-icon{
    background: rgba(255,255,255,0.15);
    padding: 18px;
    border-radius: 14px;
}
.header-icon i{ font-size: 32px; }

/* ALERT */
.success-alert{
    background: #e6f4ea;
    color: #137333;
    padding: 14px 18px;
    border-radius: 12px;
    margin-top: 24px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 500;
    border: 1px solid #ceead6;
}

/* TOOLBAR */
.toolbar{
    background: white;
    border: 1px solid #e3e8ee;
    border-radius: 14px;
    padding: 20px;
    margin-top: 24px;
    display: flex;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: wrap;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}
.search-box{
    display: flex;
    flex: 1;
    position: relative;
    align-items: center;
}
.search-box i{
    position: absolute;
    left: 16px;
    color: #94a3b8;
}
.search-box input{
    flex: 1;
    padding: 12px 16px 12px 44px;
    border: 1px solid #e3e8ee;
    border-radius: 10px 0 0 10px;
    font-size: 14px;
    outline: none;
}
.search-box input:focus{ border-color: #4338ca; }
.search-box button{
    background: #4338ca;
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 0 10px 10px 0;
    font-weight: 600;
    cursor: pointer;
    transition: 0.2s;
}
.search-box button:hover{ background: #3730a3; }
.stat-card{
    background: #eef2ff;
    border: 1px solid #c7d2fe;
    padding: 14px 20px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    gap: 12px;
}
.stat-icon{
    width: 40px;
    height: 40px;
    background: #4338ca;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}
.stat-card p{ font-size: 12px; color: #64748b; font-weight: 600; }
.stat-card h2{ font-size: 22px; font-weight: 700; color: #1e293b; }

/* TABLE */
.table-card{
    background: white;
    border: 1px solid #e3e8ee;
    border-radius: 14px;
    margin-top: 20px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}
.table-wrapper{ overflow-x: auto; }
table{ width: 100%; border-collapse: collapse; }
thead{
    background: #1e293b;
    color: white;
}
thead th{
    padding: 16px 20px;
    text-align: left;
    font-weight: 600;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}
thead th.text-center{ text-align: center; }
tbody tr{
    border-bottom: 1px solid #f1f5f9;
    transition: 0.2s;
}
tbody tr:hover{ background: #f8fafc; }
tbody td{
    padding: 16px 20px;
    font-size: 14px;
}
.text-center{ text-align: center; }
.text-gray{ color: #64748b; }

.user-cell{
    display: flex;
    align-items: center;
    gap: 12px;
}
.avatar{
    width: 40px;
    height: 40px;
    background: #e0e7ff;
    color: #4338ca;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 13px;
    text-transform: uppercase;
}
.badge-role{
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}
.badge-admin{ background: #fee2e2; color: #b91c1c; }
.badge-user{ background: #dbeafe; color: #1d4ed8; }

.btn-delete{
    width: 36px;
    height: 36px;
    background: #fef2f2;
    color: #ef4444;
    border: 1px solid #fecaca;
    border-radius: 10px;
    cursor: pointer;
    transition: 0.2s;
}
.btn-delete:hover{
    background: #ef4444;
    color: white;
    border-color: #ef4444;
}

.empty-state{
    text-align: center;
    padding: 50px 20px;
    color: #94a3b8;
}
.empty-state i{ font-size: 40px; margin-bottom: 10px; }

/* PAGINATION */
.pagination-wrapper{
    margin-top: 20px;
    display: flex;
    justify-content: center;
}

@media(max-width: 768px){
   .page-header{ flex-direction: column; gap: 16px; text-align: center; }
   .toolbar{ flex-direction: column; }
   .page-header h1{ font-size: 26px; }
}
</style>

</body>
</html>