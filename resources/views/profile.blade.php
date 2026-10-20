<!DOCTYPE html>
<html lang="en">

<head>
<title>My Profile | Smart E-Book</title>
@vite(['resources/css/app.css'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="profile-body">

<div class="profile-container">

    <!-- Profile Header -->
    <div class="profile-header">
        <div class="header-blob blob-1"></div>
        <div class="header-blob blob-2"></div>

        <div class="header-content">
            <div class="avatar-box">
                <i class="fas fa-user"></i>
            </div>

            <div class="header-text">
                <h1>{{ $user->name }}</h1>
                <p class="email"><i class="fas fa-envelope"></i> {{ $user->email }}</p>
                <p class="member"><i class="fas fa-calendar"></i> Member since {{ $user->created_at->format('F Y') }}</p>
            </div>
        </div>
    </div>

    <!-- Main Grid -->
    <div class="main-grid">

        <!-- Personal Information -->
        <div class="card card-info">
            <div class="card-head">
                <h2>Personal Information</h2>
                <div class="head-icon">
                    <i class="fas fa-user-circle"></i>
                </div>
            </div>

            <div class="info-grid">
                <div class="info-box">
                    <p class="info-label">Full Name</p>
                    <h3 class="info-value">{{ $user->name }}</h3>
                </div>

                <div class="info-box">
                    <p class="info-label">Email Address</p>
                    <h3 class="info-value">{{ $user->email }}</h3>
                </div>

                <div class="info-box">
                    <p class="info-label">Account Type</p>
                    <h3 class="info-value badge">User</h3>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card card-actions">
            <h2>Quick Actions</h2>

            <div class="action-buttons">
                <a href="{{ route('profile.edit') }}" class="btn btn-gradient">
                    <i class="fas fa-edit"></i> Edit Profile
                </a>

                <a href="{{ route('dashboard') }}" class="btn btn-dark">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </div>
        </div>
    </div>

    <!-- Reading Statistics -->
    <div class="card card-stats">
        <div class="card-head">
            <div>
                <h2>Reading Statistics</h2>
                <p class="subtitle">Your reading activity overview</p>
            </div>
            <div class="head-icon">
                <i class="fas fa-chart-line"></i>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card stat-blue">
                <div class="stat-icon"><i class="fas fa-book"></i></div>
                <h3>{{ $booksRead }}</h3>
                <p>Books Read</p>
            </div>

            <div class="stat-card stat-yellow">
                <div class="stat-icon"><i class="fas fa-bookmark"></i></div>
                <h3>{{ $bookmarks }}</h3>
                <p>Bookmarks</p>
            </div>

            <div class="stat-card stat-green">
                <div class="stat-icon"><i class="fas fa-download"></i></div>
                <h3>{{ $downloads }}</h3>
                <p>Downloads</p>
            </div>

            <div class="stat-card stat-purple">
                <div class="stat-icon"><i class="fas fa-star"></i></div>
                <h3>{{ $reviews }}</h3>
                <p>Reviews</p>
            </div>
        </div>
    </div>

</div>

<style>
/* ========== BASE ========== */
* { margin: 0; padding: 0; box-sizing: border-box; }
.profile-body{
    font-family: 'Inter', sans-serif;
    min-height: 100vh;
    background: linear-gradient(135deg, #f0f9ff 0%, #e0e7ff 40%, #f5f3ff 100%);
    padding: 40px 20px;
}
.profile-container{
    max-width: 1200px;
    margin: 0 auto;
    animation: fadeInUp 0.6s ease;
}
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* ========== HEADER ========== */
.profile-header{
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #4338ca 0%, #2563eb 50%, #0891b2 100%);
    border-radius: 32px;
    padding: 50px 40px;
    color: white;
    box-shadow: 0 20px 50px rgba(37, 99, 235, 0.25);
}
.header-blob{
    position: absolute;
    border-radius: 50%;
}
.blob-1{
    width: 300px;
    height: 300px;
    background: rgba(255,255,255,0.08);
    right: -100px;
    top: -100px;
}
.blob-2{
    width: 240px;
    height: 240px;
    background: rgba(34, 211, 238, 0.15);
    left: -80px;
    bottom: -80px;
}
.header-content{
    position: relative;
    display: flex;
    align-items: center;
    gap: 32px;
}
.avatar-box{
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(10px);
    border: 3px solid rgba(255,255,255,0.25);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}
.avatar-box i{
    font-size: 52px;
    color: white;
}
.header-text h1{
    font-size: 36px;
    font-weight: 800;
    margin-bottom: 8px;
}
.header-text .email, .header-text .member{
    font-size: 15px;
    color: rgba(255,255,255,0.9);
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 6px;
}

/* ========== CARDS ========== */
.main-grid{
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 28px;
    margin-top: 32px;
}
.card{
    background: rgba(255,255,255,0.75);
    backdrop-filter: blur(20px);
    border-radius: 28px;
    padding: 32px;
    border: 1px solid rgba(255,255,255,0.6);
    box-shadow: 0 8px 30px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
}
.card:hover{
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(59, 130, 246, 0.12);
}
.card-head{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 28px;
}
.card-head h2{
    font-size: 26px;
    font-weight: 800;
    color: #1e293b;
}
.card h2{
    font-size: 22px;
    font-weight: 800;
    color: #1e293b;
    margin-bottom: 24px;
}
.head-icon{
    width: 56px;
    height: 56px;
    background: linear-gradient(135deg, #4f46e5, #06b6d4);
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.head-icon i{
    font-size: 26px;
    color: white;
}
.subtitle{
    color: #64748b;
    font-size: 14px;
    margin-top: 6px;
}

/* ========== INFO ========== */
.info-grid{
    display: flex;
    flex-direction: column;
    gap: 18px;
}
.info-box{
    padding: 20px;
    background: rgba(248, 250, 252, 0.8);
    border: 1px solid #e2e8f0;
    border-radius: 18px;
    transition: 0.3s;
}
.info-box:hover{
    background: white;
    border-color: #bfdbfe;
}
.info-label{
    font-size: 12px;
    color: #64748b;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.info-value{
    font-size: 18px;
    font-weight: 700;
    color: #1e293b;
    margin-top: 6px;
}
.info-value.badge{
    display: inline-block;
    background: #e0e7ff;
    color: #4338ca;
    padding: 5px 14px;
    border-radius: 10px;
    font-size: 14px;
}

/* ========== ACTIONS ========== */
.action-buttons{
    display: flex;
    flex-direction: column;
    gap: 14px;
}
.btn{
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    padding: 16px;
    border-radius: 16px;
    font-weight: 700;
    font-size: 15px;
    text-decoration: none;
    transition: all 0.3s;
}
.btn-gradient{
    background: linear-gradient(90deg, #4f46e5, #06b6d4);
    color: white;
    box-shadow: 0 4px 15px rgba(79, 70, 229, 0.25);
}
.btn-gradient:hover{
    transform: scale(1.03);
    box-shadow: 0 8px 25px rgba(79, 70, 229, 0.4);
}
.btn-dark{
    background: #1e293b;
    color: white;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}
.btn-dark:hover{
    transform: scale(1.03);
    background: #0f172a;
    box-shadow: 0 8px 25px rgba(15, 23, 42, 0.3);
}

/* ========== STATS ========== */
.card-stats{
    margin-top: 28px;
}
.stats-grid{
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 22px;
}
.stat-card{
    border-radius: 22px;
    padding: 26px 20px;
    text-align: center;
    border: 1px solid;
    transition: 0.3s;
}
.stat-card:hover{
    transform: translateY(-6px);
}
.stat-icon{
    width: 54px;
    height: 54px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
}
.stat-icon i{
    font-size: 24px;
}
.stat-card h3{
    font-size: 38px;
    font-weight: 800;
    margin-bottom: 6px;
    color: #1e293b;
}
.stat-card p{
    font-size: 14px;
    font-weight: 600;
    color: #64748b;
}

.stat-blue{ background: #eff6ff; border-color: #dbeafe; }
.stat-blue .stat-icon{ background: #dbeafe; color: #2563eb; }

.stat-yellow{ background: #fefce8; border-color: #fef08a; }
.stat-yellow .stat-icon{ background: #fef08a; color: #ca8a04; }

.stat-green{ background: #f0fdf4; border-color: #bbf7d0; }
.stat-green .stat-icon{ background: #bbf7d0; color: #16a34a; }

.stat-purple{ background: #faf5ff; border-color: #e9d5ff; }
.stat-purple .stat-icon{ background: #e9d5ff; color: #9333ea; }

/* ========== RESPONSIVE ========== */
@media(max-width: 1024px){
    .main-grid{ grid-template-columns: 1fr; }
    .stats-grid{ grid-template-columns: repeat(2, 1fr); }
}
@media(max-width: 768px){
    .header-content{ flex-direction: column; text-align: center; }
    .profile-header{ padding: 40px 24px; }
    .header-text h1{ font-size: 28px; }
    .card{ padding: 24px; }
}
</style>

</body>
</html>