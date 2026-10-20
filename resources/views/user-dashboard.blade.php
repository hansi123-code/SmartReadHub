<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart E-Book Management System</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
</head>

<body class="dashboard-body">
<div class="dashboard-wrapper">

<!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-top">
            <div class="logo-box">
                <i class="fas fa-book-open"></i>
            </div>
            <h2 class="logo-text">Smart ReadHub</h2>
            <p class="logo-sub">User Dashboard</p>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('dashboard') }}" class="nav-link active">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('books') }}" class="nav-link">
                <i class="fas fa-book"></i>
                <span>Explore Books</span>
            </a>
            
            <a href="{{ route('library') }}" class="nav-link">
                <i class="fas fa-bookmark"></i>
                <span>My Library</span>
            </a>


            <a href="{{ route('profile.page') }}" class="nav-link">
                <i class="fas fa-user"></i>
                <span>Profile</span>
            </a>
        </nav>

        <div class="sidebar-bottom">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>


    <!-- MAIN CONTENT -->
    <main class="main-content">
        
        <!-- HEADER -->
        <header class="welcome-banner">
            <div class="welcome-text">
                <h1>Welcome Back, {{ Auth::user()->name }} 👋</h1>
                <p>Continue reading your favourite books and discover new knowledge every day.</p>
            </div>
            <div class="welcome-illustration">
                <i class="fas fa-book-reader"></i>
            </div>
        </header>

        <!-- STATS GRID -->
        <section class="stats-section">
            <div class="stat-card">
                <div class="stat-info">
                    <p class="stat-label">Total Books</p>
                    <h3 class="stat-value">{{ $totalBooks }}</h3>
                </div>
                <div class="stat-icon stat-blue">
                    <i class="fas fa-book"></i>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <p class="stat-label">Total Read Books</p>
                    <h3 class="stat-value">{{ $totalReadBooks }}</h3>
                </div>
                <div class="stat-icon stat-green">
                    <i class="fas fa-book-reader"></i>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <p class="stat-label">Total Bookmarked</p>
                    <h3 class="stat-value">{{ $totalBookmarks }}</h3>
                </div>
                <div class="stat-icon stat-yellow">
                    <i class="fas fa-bookmark"></i>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <p class="stat-label">Total Categories</p>
                    <h3 class="stat-value">{{ $totalCategories }}</h3>
                </div>
                <div class="stat-icon stat-purple">
                    <i class="fas fa-folder-open"></i>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <p class="stat-label">Total Downloads</p>
                    <h3 class="stat-value">{{ $totalDownloads }}</h3>
                </div>
                <div class="stat-icon stat-red">
                    <i class="fas fa-download"></i>
                </div>
            </div>
        </section>

        <!-- RECENT ACTIVITY -->
        <section class="activity-section">
            <div class="section-header">
                <div>
                    <h2 class="section-title">Recent Activity</h2>
                    <p class="section-subtitle">Your recent reading activities</p>
                </div>
                <div class="section-icon">
                    <i class="fas fa-history"></i>
                </div>
            </div>

            @if(isset($recentBooks) && $recentBooks->count() > 0)
                <div class="activity-list">
                    @foreach($recentBooks as $activity)
                    <div class="activity-row">
                        <div class="activity-icon-box">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <div class="activity-details">
                            <h4>{{ $activity->book->title }}</h4>
                            <p>You opened this book recently</p>
                        </div>
                        <div class="activity-time">
                            {{ $activity->created_at->diffForHumans() }}
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <h3>No Recent Activity</h3>
                    <p>Start exploring books to see your activity here.</p>
                </div>
            @endif
        </section>

    </main>
</div>

<style>
/* ========== BASE - LIGHT THEME ========== */
* { margin: 0; padding: 0; box-sizing: border-box; }
.dashboard-body{
    font-family: 'Inter', sans-serif;
    background: #f8fafc;
    color: #334155;
}
.dashboard-wrapper{
    display: flex;
    min-height: 100vh;
    background: linear-gradient(135deg, #f0f9ff 0%, #e0e7ff 100%);
}

/* ========== SIDEBAR - LIGHT GLASS ========== */
.sidebar{
    width: 280px;
    background: rgba(4, 2, 15, 0.8);
    backdrop-filter: blur(20px);
    border-right: 1px solid rgba(148, 163, 184, 0.15);
    display: flex;
    flex-direction: column;
    padding: 24px 0;
    position: fixed;
    height: 100vh;
    box-shadow: 4px 0 20px rgba(0,0,0,0.04);
}
.sidebar-top{
    text-align: center;
    padding: 0 24px 24px;
    border-bottom: 1px solid rgba(148, 163, 184, 0.15);
}
.logo-box{
    width: 60px;
    height: 60px;
    margin: 0 auto 16px;
    background: linear-gradient(135deg, #3b82f6, #6366f1);
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 20px rgba(59, 130, 246, 0.25);
}
.logo-box i{
    font-size: 26px;
    color: white;
}
.logo-text{
    font-size: 20px;
    font-weight: 800;
    color: #f0f3f8;
}
.logo-sub{
    font-size: 12px;
    color: #9bbceb;
    margin-top: 4px;
}
.sidebar-nav{
    flex: 1;
    padding: 24px 16px;
    display: flex;
    flex-direction: column;
    gap: 6px;
}
.nav-link{
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 14px 16px;
    border-radius: 12px;
    color: #e8ecf1;
    font-weight: 500;
    font-size: 14px;
    transition: all 0.25s ease;
    text-decoration: none;
}
.nav-link:hover{
    background: #eff6ff;
    color: #2563eb;
}
.nav-link.active{
    background: linear-gradient(90deg, #3b82f6, #6366f1);
    color: white;
    font-weight: 600;
    box-shadow: 0 4px 14px rgba(59, 130, 246, 0.25);
}
.nav-link i{
    width: 20px;
    font-size: 16px;
}
.sidebar-bottom{
    padding: 16px 16px 0;
    border-top: 1px solid rgba(148, 163, 184, 0.15);
}
.logout-btn{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 14px;
    background: #fee2e2;
    border: none;
    border-radius: 12px;
    color: #dc2626;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.25s ease;
}
.logout-btn:hover{
    background: #fecaca;
    transform: translateY(-2px);
}

/* ========== MAIN CONTENT ========== */
.main-content{
    flex: 1;
    margin-left: 280px;
    padding: 32px 40px;
}

/* WELCOME BANNER */
.welcome-banner{
    background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%);
    border-radius: 24px;
    padding: 40px;
    margin-bottom: 32px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 10px 30px rgba(59, 130, 246, 0.15);
}
.welcome-text h1{
    font-size: 32px;
    font-weight: 800;
    color: white;
    margin-bottom: 8px;
}
.welcome-text p{
    font-size: 15px;
    color: rgba(255,255,255,0.9);
    max-width: 600px;
}
.welcome-illustration i{
    font-size: 90px;
    color: rgba(255,255,255,0.2);
}

/* STATS SECTION */
.stats-section{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
    margin-bottom: 32px;
}
.stat-card{
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(148, 163, 184, 0.15);
    border-radius: 20px;
    padding: 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0,0,0,0.04);
}
.stat-card:hover{
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.08);
}
.stat-label{
    font-size: 13px;
    color: #64748b;
    font-weight: 500;
}
.stat-value{
    font-size: 32px;
    font-weight: 800;
    color: #1e293b;
    margin-top: 8px;
}
.stat-icon{
    width: 54px;
    height: 54px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.stat-icon i{
    font-size: 24px;
}
.stat-blue{ background: #dbeafe; color: #2563eb; }
.stat-green{ background: #dcfce7; color: #16a34a; }
.stat-yellow{ background: #fef9c3; color: #ca8a04; }
.stat-purple{ background: #ede9fe; color: #7c3aed; }
.stat-red{ background: #fee2e2; color: #dc2626; }

/* ACTIVITY SECTION */
.activity-section{
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(148, 163, 184, 0.15);
    border-radius: 24px;
    padding: 32px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.04);
}
.section-header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
}
.section-title{
    font-size: 22px;
    font-weight: 700;
    color: #1e293b;
}
.section-subtitle{
    font-size: 13px;
    color: #64748b;
    margin-top: 4px;
}
.section-icon{
    width: 48px;
    height: 48px;
    background: #dbeafe;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.section-icon i{
    font-size: 20px;
    color: #2563eb;
}
.activity-list{
    display: flex;
    flex-direction: column;
    gap: 12px;
}
.activity-row{
    background: #f8fafc;
    padding: 18px 20px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    gap: 16px;
    transition: all 0.25s ease;
    border: 1px solid #e2e8f0;
}
.activity-row:hover{
    background: #eff6ff;
    border-color: #bfdbfe;
    transform: translateX(4px);
}
.activity-icon-box{
    width: 44px;
    height: 44px;
    background: linear-gradient(135deg, #3b82f6, #6366f1);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.activity-icon-box i{
    color: white;
    font-size: 16px;
}
.activity-details{
    flex: 1;
}
.activity-details h4{
    font-size: 15px;
    font-weight: 600;
    color: #1e293b;
}
.activity-details p{
    font-size: 13px;
    color: #64748b;
    margin-top: 2px;
}
.activity-time{
    font-size: 12px;
    color: #94a3b8;
    font-weight: 500;
}
.empty-state{
    text-align: center;
    padding: 50px 20px;
}
.empty-icon{
    width: 80px;
    height: 80px;
    background: #f1f5f9;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
}
.empty-icon i{
    font-size: 36px;
    color: #94a3b8;
}
.empty-state h3{
    font-size: 18px;
    font-weight: 700;
    color: #1e293b;
}
.empty-state p{
    font-size: 14px;
    color: #64748b;
    margin-top: 6px;
}

/* ========== RESPONSIVE ========== */
@media(max-width: 1024px){
    .sidebar{ display: none; }
    .main-content{ margin-left: 0; padding: 24px 20px; }
    .welcome-illustration{ display: none; }
    .welcome-text h1{ font-size: 24px; }
}
</style>

</body>
</html>