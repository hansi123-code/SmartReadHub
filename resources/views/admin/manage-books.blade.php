<!DOCTYPE html>
<html lang="en">

<head>
<title>Manage Books | Admin</title>
@vite(['resources/css/app.css'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="admin-body">

<div class="admin-wrapper">



    @if(session('success'))
    <div class="success-alert">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
    @endif

    <!-- HEADER -->
    <div class="admin-header">
        <div class="header-blob"></div>
        <div class="header-content">
            <div>
                <h1>Manage Books</h1>
                <p>View and manage all e-books in the system</p>
            </div>
            <div class="header-icon">
                <i class="fas fa-book"></i>
            </div>
        </div>
    </div>

    <!-- SEARCH + COUNT -->
    <div class="toolbar-card">
        <form method="GET" class="search-form">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input 
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search books by title, author...">
            </div>
            <button class="btn-search">
                Search
            </button>
        </form>

        <div class="stat-box">
            
                <i class="fas fa-book"></i>
            </div>
            <div>
                <p>Total Books</p>
                <h2>{{ $books->total() }}</h2>
            </div>
        </div>
    </div>

    <!-- BOOK TABLE -->
    <div class="table-card">
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Cover</th>
                        <th>Book Details</th>
                        <th>Category</th>
                        <th>Rating</th>
                        <th>Activity</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($books as $book)
                    <tr>
                        <td>
                            <img src="{{ asset('uploads/covers/'.$book->cover_image) }}" class="book-cover">
                        </td>

                        <td>
                            <h3>{{ $book->title }}</h3>
                            <p>{{ $book->author }}</p>
                        </td>

                        <td class="text-center">
                            <span class="badge-category">{{ $book->category }}</span>
                        </td>

                        <td class="text-center">
                            <div class="rating">
                                <i class="fas fa-star"></i> {{ $book->rating }}
                            </div>
                        </td>

                        <td class="text-center">
                            <div class="activity">
                                <p><i class="fas fa-eye"></i> {{ $book->views }}</p>
                                <p><i class="fas fa-download"></i> {{ $book->downloads }}</p>
                            </div>
                        </td>

                        <td>
                            <div class="action-btns">
                                <a href="{{ route('admin.books.edit',$book->id) }}" class="btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.books.delete',$book->id) }}" onsubmit="return confirm('Delete this book?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty-state">
                            <i class="fas fa-book-open"></i>
                            <p>No books found</p>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- PAGINATION -->
    <div class="pagination-wrapper">
        {{ $books->links() }}
    </div>

</div>

<style>
/* ========== BASE ========== */
* { margin: 0; padding: 0; box-sizing: border-box; }
.admin-body{
    font-family: 'Inter', sans-serif;
    background: linear-gradient(135deg, #f0f9ff 0%, #e0e7ff 100%);
    min-height: 100vh;
    padding: 32px 20px;
}
.admin-wrapper{
    max-width: 1400px;
    margin: 0 auto;
    animation: fadeIn 0.5s ease;
}
@keyframes fadeIn { from { opacity: 0; transform: translateY(15px); } to { opacity: 1; transform: translateY(0); } }

/* ========== ALERT ========== */
.success-alert{
    background: linear-gradient(90deg, #d1fae5, #a7f3d0);
    color: #065f46;
    padding: 16px 20px;
    border-radius: 16px;
    margin-bottom: 24px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 600;
    border: 1px solid #6ee7b7;
}

/* ========== HEADER ========== */
.admin-header{
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #1e40af 0%, #4f46e5 50%, #9333ea 100%);
    border-radius: 24px;
    padding: 40px;
    color: white;
    box-shadow: 0 20px 50px rgba(79, 70, 229, 0.25);
}
.header-blob{
    position: absolute;
    width: 400px;
    height: 400px;
    background: rgba(255,255,255,0.08);
    border-radius: 50%;
    right: -120px;
    top: -120px;
}
.header-content{
    position: relative;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.header-content h1{
    font-size: 36px;
    font-weight: 800;
}
.header-content p{
    margin-top: 8px;
    color: rgba(255,255,255,0.9);
    font-size: 15px;
}
.header-icon{
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(10px);
    padding: 20px;
    border-radius: 20px;
    border: 1px solid rgba(255,255,255,0.2);
}
.header-icon i{ font-size: 36px; }

/* ========== TOOLBAR ========== */
.toolbar-card{
    background: rgba(255,255,255,0.8);
    backdrop-filter: blur(20px);
    border-radius: 22px;
    padding: 24px;
    margin-top: 28px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.06);
    border: 1px solid rgba(255,255,255,0.6);
    display: flex;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: wrap;
}
.search-form{
    display: flex;
    flex: 1;
    gap: 12px;
}
.search-box{
    position: relative;
    flex: 1;
}
.search-box i{
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: #64748b;
}
.search-box input{
    width: 100%;
    padding: 14px 18px 14px 46px;
    border-radius: 14px;
    border: 1px solid #e2e8f0;
    font-size: 15px;
    background: white;
    transition: 0.3s;
}
.search-box input:focus{
    outline: none;
    border-color: #6366f1;
    box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
}
.btn-search{
    background: linear-gradient(90deg, #4f46e5, #6366f1);
    color: white;
    padding: 14px 28px;
    border-radius: 14px;
    border: none;
    font-weight: 700;
    cursor: pointer;
    transition: 0.3s;
}
.btn-search:hover{
    transform: scale(1.03);
    box-shadow: 0 8px 20px rgba(79, 70, 229, 0.3);
}
.stat-box{
    background: #eef2ff;
    border: 1px solid #c7d2fe;
    padding: 14px 24px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    gap: 14px;
}
.stat-icon{
    width: 44px;
    height: 44px;
    background: #6366f1;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}
.stat-box p{ font-size: 12px; color: #64748b; font-weight: 600; }
.stat-box h2{ font-size: 24px; font-weight: 800; color: #1e293b; }

/* ========== TABLE ========== */
.table-card{
    background: rgba(255,255,255,0.8);
    backdrop-filter: blur(20px);
    border-radius: 22px;
    margin-top: 24px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.06);
    border: 1px solid rgba(255,255,255,0.6);
    overflow: hidden;
}
.table-wrapper{ overflow-x: auto; }
table{ width: 100%; border-collapse: collapse; }
thead{
    background: #0f172a;
    color: white;
}
thead th{
    padding: 18px 20px;
    text-align: left;
    font-weight: 700;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
tbody tr{
    border-bottom: 1px solid #f1f5f9;
    transition: 0.2s;
}
tbody tr:hover{
    background: #f8fafc;
}
tbody td{
    padding: 18px 20px;
    color: #334155;
}
.book-cover{
    width: 56px;
    height: 72px;
    object-fit: cover;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}
tbody td h3{
    font-size: 16px;
    font-weight: 700;
    color: #1e293b;
}
tbody td p{
    font-size: 14px;
    color: #64748b;
    margin-top: 4px;
}
.badge-category{
    background: #f3e8ff;
    color: #9333ea;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
}
.rating{
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    font-weight: 700;
    color: #1e293b;
}
.rating i{ color: #facc15; }
.activity{
    display: flex;
    flex-direction: column;
    gap: 6px;
    font-size: 14px;
    font-weight: 600;
}
.activity i{ margin-right: 6px; }
.action-btns{
    display: flex;
    gap: 10px;
    justify-content: center;
}
.btn-edit, .btn-delete{
    width: 40px;
    height: 40px;
    border-radius: 12px;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: 0.3s;
    color: white;
}
.btn-edit{ background: linear-gradient(135deg, #3b82f6, #2563eb); }
.btn-edit:hover{ transform: scale(1.1); box-shadow: 0 6px 15px rgba(37, 99, 235, 0.3); }
.btn-delete{ background: linear-gradient(135deg, #ef4444, #dc2626); }
.btn-delete:hover{ transform: scale(1.1); box-shadow: 0 6px 15px rgba(220, 38, 38, 0.3); }
.empty-state{
    text-align: center;
    padding: 60px 20px;
    color: #94a3b8;
}
.empty-state i{ font-size: 48px; margin-bottom: 12px; }
.empty-state p{ font-size: 16px; font-weight: 600; }

/* ========== PAGINATION ========== */
.pagination-wrapper{
    margin-top: 24px;
    display: flex;
    justify-content: center;
}

/* ========== RESPONSIVE ========== */
@media(max-width: 768px){
    .header-content{ flex-direction: column; gap: 20px; text-align: center; }
    .toolbar-card{ flex-direction: column; }
}
</style>

</body>
</html>