<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add New Book | Admin</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Inter', sans-serif;
}

body{
    min-height:100vh;
    background:#eef2f6; /* Light gray bg */
    padding:40px 20px;
}

.container{
    max-width:850px;
    margin:auto;
}

.form-card{
    background: #b8b9fd; 
    padding:40px;
    border-radius:16px;
    border:1px solid #dbe4f0;
    box-shadow:0 8px 24px rgba(15, 23, 42, .08);
}

/* VIDEO */
.video-box{
    width:100%;
    overflow:hidden;
    border-radius:12px;
    margin-bottom:30px;
    border:1px solid #dbe4f0;
}
.video-box video{
    width:100%;
    height:320px;
    object-fit:cover;
    display:block;
}

/* HEADER */
.header{
    text-align:center;
    margin-bottom:35px;
}
.header .icon{
    width:64px;
    height:64px;
    background:#e0e7ff;
    color:#4338ca;
    border-radius:14px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:28px;
    margin:0 auto 16px;
}
.header h1{
    color:#1e293b;
    font-size:28px;
    font-weight:700;
}
.header p{
    color:#64748b;
    font-size:14px;
    margin-top:6px;
}

/* SUCCESS */
.success{
    background:#dcfce7;
    color:#166534;
    padding:14px 16px;
    border-radius:10px;
    margin-bottom:25px;
    font-size:14px;
    font-weight:500;
    border:1px solid #bbf7d0;
}

/* FORM GRID */
.form-grid{
    display:grid;
    grid-template-columns: repeat(2, 1fr);
    gap:20px;
}
.form-group.full{
    grid-column: span 2;
}

label{
    display:block;
    color:#1e293b;
    margin-bottom:8px;
    font-size:14px;
    font-weight:600;
}

input,
textarea,
select{
    width:100%;
    padding:12px 14px;
    border:1px solid #cbd5e1;
    border-radius:10px;
    background:#ffffff; /* Inputs white thiyenne readability walata */
    font-size:15px;
    color:#1e293b;
    transition:.2s;
}
input::placeholder,
textarea::placeholder{
    color:#94a3b8;
}
input:focus,
textarea:focus,
select:focus{
    outline:none;
    border-color:#4338ca;
    box-shadow:0 0 0 3px rgba(67,56,202,.1);
}
textarea{
    resize:vertical;
}

/* FILE INPUT */
.file-input{
    border:1.5px dashed #94a3b8;
    background:#f1f5f9;
    padding:14px;
    cursor:pointer;
    text-align:center;
}
.file-input:hover{
    border-color:#4338ca;
    background:#eef2ff;
}

/* BUTTON */
.btn{
    width:100%;
    margin-top:30px;
    padding:14px;
    border:none;
    border-radius:10px;
    background:#4338ca; /* Indigo */
    color:white;
    font-size:15px;
    font-weight:600;
    cursor:pointer;
    transition:.2s;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
}
.btn:hover{
    background:#3730a3;
    box-shadow:0 4px 14px rgba(67,56,202,.3);
}

@media(max-width:768px){
    body{ padding:20px; }
    .form-card{ padding:24px; }
    .video-box video{ height:200px; }
    .form-grid{ grid-template-columns: 1fr; }
    .form-group.full{ grid-column: span 1; }
    .header h1{ font-size:24px; }
}
</style>
</head>

<body>

<div class="container">
    <div class="form-card">

        <!-- VIDEO -->
        <div class="video-box">
            <video autoplay muted loop playsinline>
                <source src="{{ asset('video/istockphoto-454330233-640_adpp_is.mp4') }}" type="video/mp4">
            </video>
        </div>

        <!-- HEADER -->
        <div class="header">
            <div class="icon"><i class="fas fa-book"></i></div>
            <h1>Add New Book</h1>
            <p>Fill the details to add a new book to Smart ReadHub</p>
        </div>

        @if(session('success'))
        <div class="success" id="successMessage">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label>Book Title</label>
                    <input type="text" name="title" placeholder="Enter Book Title" required>
                </div>

                <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="author" placeholder="Enter Author Name" required>
                </div>

                <div class="form-group full">
                    <label>Category</label>
                    <select name="category">
                        <option>Short Stories</option>
                        <option>Novels</option>
                        <option>Adventure Stories</option>
                        <option>Horror Stories</option>
                        <option>Sinhala Stories</option>
                        <option>Children Stories</option>
                        <option>Software Engineering</option>
                        <option>Software Quality Assurance</option>
                        <option>IT Project Management</option>
                        <option>Professional World</option>
                        <option>Business Analysis Practice</option>
                        <option>Mobile Application Development</option>
                    </select>
                </div>

                <div class="form-group full">
                    <label>Description</label>
                    <textarea name="description" rows="5" placeholder="Enter Book Description" required></textarea>
                </div>

                <div class="form-group">
                    <label>Cover Image</label>
                    <input type="file" name="cover_image" class="file-input" accept="image/*" required>
                </div>

                <div class="form-group">
                    <label>PDF File</label>
                    <input type="file" name="pdf_file" class="file-input" accept=".pdf" required>
                </div>
            </div>

            <button type="submit" class="btn">
                <i class="fas fa-plus"></i> Save Book
            </button>

        </form>
    </div>
</div>

<script>
setTimeout(function(){
    let msg = document.getElementById('successMessage');
    if(msg){ msg.style.display='none'; }
},3000);
</script>

</body>
</html>