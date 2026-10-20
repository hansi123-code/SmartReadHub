<<!DOCTYPE html>
<html lang="en">
<head>
<title>SmartRead AI Assistant</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Colorful Icons from CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
* { margin:0; padding:0; box-sizing:border-box; }
body{
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    min-height:100vh;
    display:flex;
    flex-direction:column;
}

/* MAIN CONTAINER */
.ai-container{
    width:90%;
    max-width:1000px;
    margin:40px auto;
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius:24px;
    padding:35px;
    box-shadow:0 25px 50px rgba(0,0,0,0.4);
    flex:1;
}

/* HEADER */
.ai-header{
    text-align:center;
    color:white;
    margin-bottom:30px;
}
.ai-header .icon-wrapper{
    width:80px;
    height:80px;
    margin:0 auto 20px;
    background: linear-gradient(135deg, #f59e0b, #ef4444, #ec4899);
    border-radius:24px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:40px;
    color:white;
    animation: float 3s ease-in-out infinite;
    box-shadow: 0 0 30px rgba(236,72,153,0.4);
}
@keyframes float{
    0%,100%{ transform:translateY(0px); }
    50%{ transform:translateY(-10px); }
}
.ai-header h1{
    font-size:32px;
    font-weight:800;
    background: linear-gradient(90deg, #60a5fa, #a78bfa, #f472b6);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.ai-header p{
    color:rgba(255,255,255,0.7);
    font-size:15px;
    margin-top:8px;
}

/* CHAT BOX */
.chat-box{
    height:450px;
    background: rgba(0,0,0,0.2);
    padding:25px;
    border-radius:18px;
    overflow-y:auto;
    border:1px solid rgba(255,255,255,0.1);
}
.chat-box::-webkit-scrollbar{ width:8px; }
.chat-box::-webkit-scrollbar-thumb{ background:#475569; border-radius:10px; }

.message{
    display:flex;
    gap:12px;
    max-width:80%;
    padding:14px 20px;
    margin:16px 0;
    border-radius:18px;
    font-size:15px;
    line-height:1.6;
    animation: slideIn 0.3s ease;
}
@keyframes slideIn{ from{opacity:0; transform:translateY(10px);} to{opacity:1; transform:translateY(0);} }

.bot{
    background: rgba(255,255,255,0.95);
    color:#1e293b;
    border-bottom-left-radius:6px;
}
.bot .icon{
    width:38px;
    height:38px;
    background:linear-gradient(135deg, #8b5cf6, #ec4899);
    border-radius:12px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-size:16px;
    flex-shrink:0;
}
.bot b{ color:#6366f1; }
.bot i{ margin-right:6px; color:#ec4899; }

.user{
    background:linear-gradient(135deg, #6366f1, #8b5cf6);
    color:white;
    margin-left:auto;
    border-bottom-right-radius:6px;
    font-weight:500;
}

/* INPUT AREA */
.chat-input{
    display:flex;
    gap:15px;
    margin-top:25px;
}
.chat-input input{
    flex:1;
    padding:16px 24px;
    border-radius:16px;
    border:2px solid rgba(255,255,255,0.15);
    background: rgba(255,255,255,0.1);
    color:white;
    font-size:15px;
    outline:none;
    transition:0.3s;
}
.chat-input input::placeholder{ color:rgba(255,255,255,0.5); }
.chat-input input:focus{
    border-color:#8b5cf6;
    background: rgba(255,255,255,0.15);
}
.chat-input button{
    background:linear-gradient(135deg, #6366f1, #ec4899);
    color:white;
    border:none;
    padding:0 35px;
    border-radius:16px;
    cursor:pointer;
    font-weight:600;
    font-size:15px;
    display:flex;
    align-items:center;
    gap:8px;
    transition:0.3s;
}
.chat-input button:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 25px rgba(139,92,246,0.4);
}

/* SUGGESTIONS */
.suggestions{
    display:flex;
    gap:10px;
    flex-wrap:wrap;
    margin-bottom:20px;
}
.sug-btn{
    background: rgba(255,255,255,0.1);
    border:1px solid rgba(255,255,255,0.2);
    color:white;
    padding:8px 16px;
    border-radius:20px;
    font-size:13px;
    cursor:pointer;
    transition:0.3s;
    font-weight:500;
}
.sug-btn:hover{ background: rgba(139,92,246,0.5); }
.sug-btn i{ margin-right:6px; color:#fbbf24; }

@media(max-width:768px){
    .ai-container{ padding:20px; }
    .message{ max-width:90%; }
    .chat-input button{ padding:0 20px; }
}
</style>
</head>
<body>

@include('layouts.navbar')

<div class="ai-container">
    <div class="ai-header">
        <div class="icon-wrapper">
            <i class="fa-solid fa-robot"></i>
        </div>
        <h1>SmartRead AI Assistant</h1>
        <p>Your intelligent reading companion powered by Smart Search</p>
    </div>

    <div class="chat-box" id="chatBox">
        <div class="suggestions">
            <button class="sug-btn" onclick="sendSuggestion('give me horror books')"><i class="fa-solid fa-ghost"></i> Horror</button>
            <button class="sug-btn" onclick="sendSuggestion('popular books')"><i class="fa-solid fa-fire"></i> Popular</button>
            <button class="sug-btn" onclick="sendSuggestion('give me books by')"><i class="fa-solid fa-pen-nib"></i> By Author</button>
<button class="sug-btn" onclick="sendSuggestion('give me IT Project Management books')"><i class="fa-solid fa-diagram-project"></i> IT </button>
        </div>

        <div class="message bot">
            <div class="icon"><i class="fa-solid fa-robot"></i></div>
            <div>
                Hello 👋 <br>
                I am <b>SmartRead AI Assistant</b>. 
                I can help you find books, authors and reading recommendations instantly.
            </div>
        </div>
    </div>

    <div class="chat-input">
        <input id="message" type="text" placeholder="Ask something about books... e.g: give me adventure books">
        <button id="send"><i class="fa-solid fa-paper-plane"></i> Send</button>
    </div>
</div>

</body>
</html>

<script>
const input = document.getElementById("message");
const button = document.getElementById("send");
const chatBox = document.getElementById("chatBox");

function sendSuggestion(text){
    input.value = text;
    sendMessage();
}

function sendMessage(){
    let message = input.value.trim();
    if(message==""){ return; }

    // show user message
    chatBox.innerHTML += `<div class="message user">${message}</div>`;
    input.value="";
    chatBox.scrollTop = chatBox.scrollHeight;

    // show typing
    chatBox.innerHTML += `<div class="message bot" id="typing"><div class="icon"><i class="fa-solid fa-robot"></i></div><div>Thinking...</div></div>`;
    chatBox.scrollTop = chatBox.scrollHeight;

    // send Laravel request
    fetch("/assistant/chat",{
        method:"POST",
        headers:{
            "Content-Type":"application/json",
            "X-CSRF-TOKEN":"{{ csrf_token() }}"
        },
        body:JSON.stringify({ message:message })
    })
    .then(response=>response.json())
    .then(data=>{
        document.getElementById("typing").remove();
        chatBox.innerHTML += `
        <div class="message bot">
            <div class="icon"><i class="fa-solid fa-robot"></i></div>
            <div>${data.reply}</div>
        </div>`;
        chatBox.scrollTop = chatBox.scrollHeight;
    });
}

button.onclick = sendMessage;
input.addEventListener("keypress", function(e){
    if(e.key === "Enter"){ sendMessage(); }
});
</script>