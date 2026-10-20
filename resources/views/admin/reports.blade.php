<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Reports | Smart E-Book</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="admin-body">

<div class="admin-container">

    <!-- ================= HEADER ================= -->
    <div class="page-header">
        <div>
            <h1><i class="fas fa-chart-pie mr-3"></i> System Reports</h1>
            <p>Smart E-Book Management System Analytics</p>
        </div>
        <button onclick="window.print()" class="print-btn">
            <i class="fas fa-print"></i> Print Report
        </button>
    </div>

    <!-- ================= STATISTICS CARDS ================= -->
    <div class="stats-grid">
        <!-- Total Books Card -->
        <div class="stat-card stat-blue">
            <div>
                <p>Total Books</p>
                <h2>{{ $totalBooks }}</h2>
            </div>
            <div class="stat-icon">
                <i class="fas fa-book"></i>
            </div>
        </div>

        <!-- Total Users Card -->
        <div class="stat-card stat-green">
            <div>
                <p>Total Users</p>
                <h2>{{ $totalUsers }}</h2>
            </div>
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
        </div>

        <!-- Total Views Card -->
        <div class="stat-card stat-purple">
            <div>
                <p>Total Views</p>
                <h2>{{ $totalViews }}</h2>
            </div>
            <div class="stat-icon">
                <i class="fas fa-eye"></i>
            </div>
        </div>

        <!-- Total Downloads Card -->
        <div class="stat-card stat-red">
            <div>
                <p>Total Downloads</p>
                <h2>{{ $totalDownloads }}</h2>
            </div>
            <div class="stat-icon">
                <i class="fas fa-download"></i>
            </div>
        </div>
    </div>

    <!-- ================= BOOKS BY CATEGORY CHART ================= -->
    <div class="content-card">
        <div class="card-header">
            <div>
                <h2>Books By Category</h2>
                <p>Number of books available in each category</p>
            </div>
            <div class="card-icon">
                <i class="fas fa-chart-bar"></i>
            </div>
        </div>
        <div class="chart-wrapper">
            <canvas id="categoryChart"></canvas>
        </div>
    </div>

    <!-- ================= TOP 5 POPULAR BOOKS ================= -->
    <div class="content-card">
        <div class="card-header">
            <div>
                <h2>Top 5 Popular Books</h2>
                <p>Most downloaded books in the system</p>
            </div>
            <div class="card-icon icon-yellow">
                <i class="fas fa-fire"></i>
            </div>
        </div>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Cover</th>
                        <th>Book Title</th>
                        <th>Category</th>
                        <th class="text-center">Views</th>
                        <th class="text-center">Downloads</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($popularBooks as $book)
                    <tr>
                        <td>
                            <img src="{{ asset('uploads/covers/'.$book->cover_image) }}" class="book-cover">
                        </td>
                        <td class="font-semibold">{{ $book->title }}</td>
                        <td><span class="badge">{{ $book->category }}</span></td>
                        <td class="text-center text-gray">{{ $book->views }}</td>
                        <td class="text-center text-gray">{{ $book->downloads }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty-state">
                            <i class="fas fa-book"></i>
                            <p>No Books Available</p>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- ================= PRINT INFORMATION ================= -->
    <div class="report-footer">
        Smart E-Book Management System Report <br>
        Generated Date: {{ date('Y-m-d') }}
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
    margin-bottom: 28px;
    box-shadow: 0 8px 24px rgba(67, 56, 202, 0.25);
}
.page-header h1{ font-size: 32px; font-weight: 700; }
.page-header p{ margin-top: 6px; color: rgba(255,255,255,0.9); font-size: 14px; }
.print-btn{
    background: white;
    color: #4338ca;
    padding: 12px 24px;
    border-radius: 10px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: 0.2s;
}
.print-btn:hover{ transform: translateY(-2px); box-shadow: 0 6px 16px rgba(0,0,0,0.15); }

/* STATS GRID */
.stats-grid{
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 28px;
}
.stat-card{
    background: white;
    border-radius: 14px;
    padding: 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border: 1px solid #e3e8ee;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}
.stat-card p{ color: #64748b; font-size: 14px; font-weight: 500; }
.stat-card h2{ font-size: 32px; font-weight: 700; margin-top: 8px; }
.stat-icon{
    width: 56px;
    height: 56px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}
.stat-blue .stat-icon{ background: #e0e7ff; color: #4338ca; }
.stat-blue h2{ color: #4338ca; }
.stat-green .stat-icon{ background: #d1fae5; color: #059669; }
.stat-green h2{ color: #059669; }
.stat-purple .stat-icon{ background: #ede9fe; color: #7c3aed; }
.stat-purple h2{ color: #7c3aed; }
.stat-red .stat-icon{ background: #fee2e2; color: #dc2626; }
.stat-red h2{ color: #dc2626; }

/* CONTENT CARD */
.content-card{
    background: white;
    border: 1px solid #e3e8ee;
    border-radius: 14px;
    padding: 28px;
    margin-bottom: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}
.card-header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
}
.card-header h2{ font-size: 22px; font-weight: 700; color: #1e293b; }
.card-header p{ color: #64748b; font-size: 14px; margin-top: 4px; }
.card-icon{
    width: 48px;
    height: 48px;
    background: #e0e7ff;
    color: #4338ca;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}
.icon-yellow{ background: #fef3c7; color: #d97706; }

/* CHART */
.chart-wrapper{ height: 380px; }

/* TABLE */
.table-wrapper{ overflow-x: auto; }
table{ width: 100%; border-collapse: collapse; }
thead tr{ border-bottom: 1px solid #e3e8ee; }
thead th{
    padding: 14px 16px;
    text-align: left;
    font-weight: 600;
    font-size: 13px;
    color: #050505;
    text-transform: uppercase;
}
tbody tr{
    border-bottom: 1px solid #f1f5f9;
    transition: 0.2s;
}
tbody tr:hover{ background: #7cb3eb; }
tbody td{ padding: 16px; font-size: 14px; }
.text-center{ text-align: center; }
.text-gray{ color: #030e1d; }
.book-cover{
    width: 48px;
    height: 64px;
    border-radius: 8px;
    object-fit: cover;
    border: 1px solid #e3e8ee;
}
.badge{
    padding: 6px 12px;
    background: #e0e7ff;
    color: #4338ca;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}
.empty-state{
    text-align: center;
    padding: 40px;
    color: #94a3b8;
}
.empty-state i{ font-size: 32px; margin-bottom: 8px; }

/* FOOTER */
.report-footer{
    text-align: center;
    color: #201e20;
    font-size: 13px;
    margin-top: 20px;
}

/* PRINT CSS */
@media print{
    .print-btn{ display: none; }
    .admin-body{ background: white; }
    .stat-card, .content-card{ box-shadow: none !important; border: 1px solid #ddd; }
}

@media(max-width: 1024px){
    .stats-grid{ grid-template-columns: repeat(2, 1fr); }
}
@media(max-width: 640px){
    .stats-grid{ grid-template-columns: 1fr; }
    .page-header{ flex-direction: column; gap: 16px; text-align: center; }
}
</style>

<script>
const categoryLabels = [
@foreach($categoryChart as $category)
'{{ $category->category }}',
@endforeach
];

const categoryValues = [
@foreach($categoryChart as $category)
{{ $category->total }},
@endforeach
];

const ctx = document.getElementById('categoryChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: categoryLabels,
        datasets: [{
            label: 'Number of Books',
            data: categoryValues,
            backgroundColor: '#4338ca',
            borderRadius: 8,
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: { color: '#f1f5f9' },
                ticks: { precision: 0, color: '#64748b' }
            },
            x: {
                grid: { display: false },
                ticks: { color: '#64748b' }
            }
        }
    }
});
</script>

</body>
</html>