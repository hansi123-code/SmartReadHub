<!DOCTYPE html>
<html>

<head>

<title>Reading Progress</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">


<style>

*{
    box-sizing:border-box;
}


body{

    font-family:'Inter',sans-serif;
    background:#f8fafc;
    margin:0;
    padding:40px;

    color:#1e293b;

}



.container{

    max-width:1200px;
    margin:auto;

}



.header{

    background:linear-gradient(135deg,#2563eb,#7c3aed);

    padding:30px;
    border-radius:20px;

    color:white;

    margin-bottom:35px;

    box-shadow:0 15px 35px rgba(0,0,0,0.1);

}


.header h1{

    margin:0;
    font-size:32px;
    font-weight:800;

}


.header p{

    margin-top:10px;
    opacity:.9;

}



.chart-grid{

    display:grid;

    grid-template-columns:repeat(auto-fit,minmax(450px,1fr));

    gap:30px;

}



.card{

    background:white;

    padding:30px;

    border-radius:20px;

    box-shadow:
    0 10px 25px rgba(15,23,42,.08);

    transition:.3s;

}



.card:hover{

    transform:translateY(-5px);

    box-shadow:
    0 20px 35px rgba(15,23,42,.12);

}



.card-header{

    display:flex;

    align-items:center;

    gap:12px;

    margin-bottom:25px;

}



.icon{

    width:45px;
    height:45px;

    border-radius:12px;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:22px;

    background:#eff6ff;

}



.card h2{

    font-size:20px;

    margin:0;

    font-weight:700;

}



.chart-box{

    height:350px;

}



canvas{

    max-height:350px;

}



.footer{

    text-align:center;

    margin-top:40px;

    color:#64748b;

    font-size:14px;

}



</style>


</head>



<body>


<div class="container">


<div class="header">

<h1>
📚 Reading Analytics
</h1>

<p>
Track your academic and entertainment reading progress
</p>


</div>



<div class="chart-grid">


<div class="card">


<div class="card-header">

<div class="icon">
🎓
</div>

<h2>
Academic Reading Progress
</h2>

</div>


<div class="chart-box">

<canvas id="academicChart"></canvas>

</div>


</div>





<div class="card">


<div class="card-header">

<div class="icon">
🎬
</div>

<h2>
Entertainment Reading Progress
</h2>

</div>


<div class="chart-box">

<canvas id="entertainmentChart"></canvas>

</div>


</div>



</div>



<div class="footer">

Smart E-Book Management System • Reading Insights

</div>


</div>





<script>


new Chart(
document.getElementById('academicChart'),

{

type:'bar',

data:{


labels:[

@foreach($academicProgress as $category => $books)

"{{$category}}",

@endforeach

],


datasets:[{

label:'Reading Progress (%)',

data:[

@foreach($academicProgress as $category => $progress)

{{$progress}},

@endforeach

],


borderRadius:10,

backgroundColor:'#2563eb'


}]


},


options:{


responsive:true,


plugins:{


legend:{

display:true,

position:'bottom'

}


},


scales:{


y:{


beginAtZero:true,

max:100,

ticks:{

callback:function(value){

return value + '%';

}

}


}


}


}


}

);







new Chart(

document.getElementById('entertainmentChart'),

{


type:'bar',


data:{


labels:[

@foreach($entertainmentProgress as $category => $books)

"{{$category}}",

@endforeach

],



datasets:[{


label:'Reading Progress (%)',


data:[

@foreach($entertainmentProgress as $category => $progress)

{{$progress}},

@endforeach

],


borderRadius:10,


backgroundColor:'#7c3aed'


}]


},



options:{


responsive:true,


plugins:{


legend:{

display:true,

position:'bottom'

}


},


scales:{


y:{


beginAtZero:true,

max:100,


ticks:{

callback:function(value){

return value + '%';

}

}


}


}


}


}

);



</script>



</body>

</html>