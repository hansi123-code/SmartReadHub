<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="admin-body">

<div class="flex min-h-screen">

    
<!-- SIDEBAR -->
    <div class="sidebar">
        <!-- LOGO -->
        <div class="sidebar-header">
            <div class="logo-box">
                <i class="fas fa-book-open"></i>
            </div>
            <h2>Smart ReadHub</h2>
            <p>Admin Panel</p>
        </div>

        <!-- MENU -->
        <nav class="sidebar-menu">
            <a class="nav-item nav-active" href="#">
                <i class="fas fa-chart-line"></i> <span>Dashboard</span>
            </a>
            <a class="nav-item" 
       href="{{ route('admin.books.index') }}">

       <i class="fas fa-book"></i>

        <span>Manage Books</span>

        </a>
            <a class="nav-item" href="{{ route('admin.books.create') }}">
                <i class="fas fa-plus-circle"></i> <span>Add Books</span>
            </a>
            
            <a class="nav-item" 
       href="{{ route('admin.users') }}">

       <i class="fas fa-users"></i>

       <span>Users</span>

       </a>
            <a class="nav-item" href="{{ route('admin.reports') }}">
    <i class="fas fa-chart-pie"></i>
    <span>Reports</span>
</a>
        </nav>

        <!-- LOGOUT -->
        <div class="sidebar-footer">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button>
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>


    <!-- MAIN CONTENT -->
    <div class="main-content">

        <!-- TOP BAR -->
        <div class="topbar">
            <div>
                <h1>Welcome, {{ Auth::user()->name }} 👋</h1>
                <p>Dashboard Overview</p>
            </div>
        </div>

        <!-- STATS -->
        <div class="stats-grid">
            <div class="stat-card">
                <div>
                    <p>Total Books</p>
                    <h2>{{ $totalBooks }}</h2>
                </div>
                <div class="stat-icon stat-blue">
                    <i class="fas fa-book"></i>
                </div>
            </div>

            <div class="stat-card">
                <div>
                    <p>Total Users</p>
                    <h2>{{ $totalUsers }}</h2>
                </div>
                <div class="stat-icon stat-green">
                    <i class="fas fa-users"></i>
                </div>
            </div>

            <div class="stat-card">
                <div>
                    <p>Total Categories</p>
                    <h2>{{ $totalCategories }}</h2>
                </div>
                <div class="stat-icon stat-purple">
                    <i class="fas fa-folder-open"></i>
                </div>
            </div>
        </div>

        <!-- MY BOOKS -->
        <div class="my-books-card">
            <div>
                <h2>My Books</h2>
                <p>Books added by you</p>
            </div>
            <div class="my-books-count">
                {{ $myBooks }}
            </div>
        </div>

        <!-- RECENT - GRID KARALA -->
        <div class="recent-card">
            <div class="section-header">
                <h2>Recent Activity</h2>
                <i class="fas fa-history"></i>
            </div>

            <div class="book-grid"> <!-- book-scroll ain -->
                @forelse($recentBooks as $book)
                    <div class="book-card">
                        <div class="book-cover">
                            <img src="{{ asset('uploads/covers/' . $book->cover_image) }}" alt="{{ $book->title }}">
                        </div>
                        <p class="book-title">{{ $book->title }}</p>
                    </div>
                @empty
                    <div class="empty-msg">
                        <i class="fas fa-book"></i>
                        <p>No books yet</p>
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</div>

<style>
/* ========== BASE ========== */
* { margin: 0; padding: 0; box-sizing: border-box; }
.admin-body{
    font-family: 'Inter', sans-serif;
    background: #f8fafc;
}

/* ========== SIDEBAR ========== */
.sidebar{
    width: 280px;
    background: linear-gradient(180deg,#0f172a,#1e293b);
    display: flex;
    flex-direction: column;
    box-shadow: 4px 0 20px rgba(0,0,0,0.15);
    position: fixed;
    height: 100vh;
}
.sidebar-header{
    padding: 28px 20px;
    text-align: center;
    border-bottom: 1px solid rgba(255,255,255,0.08);
}
.logo-box{
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #3b82f6, #6366f1);
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 14px;
    box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
}
.logo-box i{ font-size: 26px; color: white; }
.sidebar-header h2{ font-size: 20px; font-weight: 800; color: white; }
.sidebar-header p{ font-size: 12px; color: #94a3b8; margin-top: 4px; }
.sidebar-menu{
    flex: 1;
    padding: 20px 14px;
    display: flex;
    flex-direction: column;
    gap: 6px;
}
.nav-item{
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 16px;
    border-radius: 12px;
    color: #cbd5e1;
    transition: all 0.3s;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
}
.nav-item:hover{
    background: rgba(59, 130, 246, 0.1);
    color: #fff;
    transform: translateX(4px);
}
.nav-active{
    background: linear-gradient(90deg,#3b82f6,#6366f1);
    color: #fff;
    font-weight: 600;
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
}
.nav-item i{ width: 18px; }
.sidebar-footer{
    padding: 16px;
    border-top: 1px solid rgba(255,255,255,0.08);
}
.sidebar-footer button{
    width: 100%;
    background: linear-gradient(90deg, #ef4444, #dc2626);
    color: white;
    padding: 14px;
    border-radius: 12px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: 0.3s;
}
.sidebar-footer button:hover{
    transform: scale(1.03);
    box-shadow: 0 6px 18px rgba(239, 68, 68, 0.4);
}

/* ========== MAIN CONTENT ========== */
.main-content{
    flex: 1;
    margin-left: 280px;
    padding: 32px 40px;
}

/* TOPBAR */
.topbar{
    background: white;
    padding: 24px 28px;
    border-radius: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    border: 1px solid #e2e8f0;
}
.topbar h1{ font-size: 26px; font-weight: 800; color: #1e293b; }
.topbar p{ color: #64748b; font-size: 14px; margin-top: 4px; }

/* STATS */
.stats-grid{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 20px;
    margin-top: 24px;
}
.stat-card{
    background: white;
    padding: 24px;
    border-radius: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    border: 1px solid #e2e8f0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: 0.3s;
}
.stat-card:hover{
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(59, 130, 246, 0.1);
}
.stat-card p{ color: #64748b; font-size: 14px; font-weight: 500; }
.stat-card h2{ font-size: 32px; font-weight: 800; margin-top: 8px; }
.stat-icon{
    width: 54px;
    height: 54px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.stat-icon i{ font-size: 24px; }
.stat-blue{ background: #dbeafe; color: #2563eb; }
.stat-green{ background: #dcfce7; color: #16a34a; }
.stat-purple{ background: #ede9fe; color: #7c3aed; }

/* MY BOOKS CARD */
.my-books-card{
    background: linear-gradient(135deg, #3b82f6, #6366f1);
    padding: 24px 28px;
    border-radius: 20px;
    margin-top: 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: white;
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.2);
}
.my-books-card h2{ font-size: 18px; font-weight: 700; }
.my-books-card p{ font-size: 13px; color: rgba(255,255,255,0.85); margin-top: 4px; }
.my-books-count{ font-size: 40px; font-weight: 800; }

/* RECENT CARD */
.recent-card{
    background: white;
    padding: 28px;
    border-radius: 20px;
    margin-top: 24px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    border: 1px solid #e2e8f0;
}
.section-header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}
.section-header h2{ font-size: 18px; font-weight: 700; color: #1e293b; }
.section-header i{ color: #3b82f6; font-size: 20px; }

/* BOOK GRID - HORIZONTAL SCROLL AIN */
.book-grid{
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); /* screen eke ideta auto */
    gap: 20px;
}
.book-card{
    background: #f8fafc;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid #e2e8f0;
    transition: 0.3s;
}
.book-card:hover{
    transform: translateY(-6px);
    box-shadow: 0 10px 20px rgba(59, 130, 246, 0.12);
}
.book-cover{
    width: 100%;
    height: 210px; /* poddak adu kale */
    background: #e2e8f0;
}
.book-cover img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.book-title{
    padding: 12px;
    font-size: 13px;
    font-weight: 600;
    color: #1e293b;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.empty-msg{
    grid-column: 1 / -1;
    text-align: center;
    padding: 40px;
    color: #94a3b8;
}
.empty-msg i{ font-size: 40px; margin-bottom: 10px; }

/* RESPONSIVE */
@media(max-width: 1024px){
    .sidebar{ display: none; }
    .main-content{ margin-left: 0; padding: 20px; }
}
@media(max-width: 768px){
    .book-grid{
        grid-template-columns: repeat(2, 1fr); /* mobile 2 */
    }
}
</style>

</body>
</html>