<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Book | Smart E-Book</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="edit-body">

<div class="edit-wrapper">

    <div class="edit-card">

        <!-- HEADER -->
        <div class="edit-header">
            <div class="header-text">
                <h1>Edit Book</h1>
                <p>Update book details and information</p>
            </div>
            <a href="{{ route('admin.books.index') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>

        <!-- FORM -->
        <form method="POST" action="{{ route('admin.books.update',$book->id) }}">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <!-- Book Title -->
                <div class="form-group">
                    <label><i class="fas fa-book"></i> Book Title</label>
                    <input
                        type="text"
                        name="title"
                        value="{{ $book->title }}"
                        placeholder="Enter book title"
                        required
                    >
                </div>

                <!-- Author -->
                <div class="form-group">
                    <label><i class="fas fa-user-pen"></i> Author</label>
                    <input
                        type="text"
                        name="author"
                        value="{{ $book->author }}"
                        placeholder="Enter author name"
                        required
                    >
                </div>

                <!-- Category -->
                <div class="form-group">
                    <label><i class="fas fa-tags"></i> Category</label>
                    <input
                        type="text"
                        name="category"
                        value="{{ $book->category }}"
                        placeholder="e.g. Fiction, Science"
                        required
                    >
                </div>
            </div>

            <!-- Description -->
            <div class="form-group full-width">
                <label><i class="fas fa-align-left"></i> Description</label>
                <textarea
                    name="description"
                    rows="6"
                    placeholder="Write a brief description about the book...">{{ $book->description }}</textarea>
            </div>

            <!-- BUTTON -->
            <div class="form-footer">
                <button class="btn-update">
                    <i class="fas fa-save"></i> Update Book
                </button>
            </div>

        </form>
    </div>

</div>

<style>

/* ========== BASE ========== */
* { margin: 0; padding: 0; box-sizing: border-box; }
.edit-body{
    font-family: 'Inter', sans-serif;
    min-height: 100vh;
    background: linear-gradient(135deg, #e0e7ff 0%, #f0f9ff 50%, #f5f3ff 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 32px 20px;
}
.edit-wrapper{
    width: 100%;
    max-width: 900px;
    animation: fadeInUp 0.5s ease;
}
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* ========== CARD ========== */
.edit-card{
    background: rgba(180, 148, 238, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 28px;
    padding: 40px;
    box-shadow: 0 20px 60px rgba(59, 130, 246, 0.15);
    border: 1px solid rgba(255,255,255,0.6);
}

/* ========== HEADER ========== */
.edit-header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 36px;
    padding-bottom: 24px;
    border-bottom: 1px solid #e2e8f0;
}
.header-text h1{
    font-size: 32px;
    font-weight: 800;
    color: #1e293b;
    background: linear-gradient(90deg, #020211, #02161a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.header-text p{
    color: #64748b;
    font-size: 14px;
    margin-top: 6px;
}
.btn-back{
    background: #1e293b;
    color: white;
    padding: 12px 20px;
    border-radius: 14px;
    font-weight: 600;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
.btn-back:hover{
    background: #0f172a;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

/* ========== FORM ========== */
.form-grid{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
}
.form-group{
    display: flex;
    flex-direction: column;
}
.form-group.full-width{
    grid-column: span 2;
    margin-top: 8px;
}
.form-group label{
    font-weight: 700;
    font-size: 14px;
    color: #334155;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.form-group label i{
    color: #6366f1;
    font-size: 14px;
}
.form-group input,
.form-group textarea{
    width: 100%;
    padding: 14px 16px;
    border: 1.5px solid #e2e8f0;
    border-radius: 14px;
    font-size: 15px;
    font-family: 'Inter', sans-serif;
    background: white;
    transition: all 0.3s;
    color: #1e293b;
}
.form-group input:focus,
.form-group textarea:focus{
    outline: none;
    border-color: #6366f1;
    box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
    transform: translateY(-1px);
}
.form-group textarea{
    resize: vertical;
    line-height: 1.6;
}

/* ========== BUTTON ========== */
.form-footer{
    margin-top: 32px;
    display: flex;
    justify-content: flex-end;
}
.btn-update{
    background: linear-gradient(90deg, #06051d, #010a0c);
    color: white;
    padding: 16px 32px;
    border-radius: 16px;
    font-weight: 700;
    font-size: 15px;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s;
    box-shadow: 0 8px 20px rgba(79, 70, 229, 0.3);
}
.btn-update:hover{
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 12px 30px rgba(79, 70, 229, 0.4);
}

/* ========== RESPONSIVE ========== */
@media(max-width: 768px){
    .edit-card{ padding: 28px; }
    .form-grid{ grid-template-columns: 1fr; }
    .form-group.full-width{ grid-column: span 1; }
    .edit-header{ flex-direction: column; gap: 16px; align-items: flex-start; }
    .header-text h1{ font-size: 26px; }
}
</style>

</body>
</html>