<?php
include 'db_config.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Raipur Municipal Admin Panel</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
body{font-family:Inter,sans-serif;background:#f3f4f6}
.sidebar-item:hover{background:rgba(255,255,255,0.08)}
.active-link{background:#3567d6!important;color:#fff}
.card{transition:.2s;cursor:pointer}
.card:hover{transform:translateY(-4px);box-shadow:0 10px 45px rgba(33, 2, 51, 0.1)}
.header{
position:fixed;
top:0;
left: 255px;
width:86%;
height:60px;
background:rgba(218, 226, 228, 0.9);
color:white;
display:flex;
align-items:center;
justify-content:space-between;
padding:0 20px;
box-sizing:border-box;
z-index:1000;
}

.header-left{
font-size:29px;
font-weight:bold;
margin-left:580px;
color:blue;
}

.header-right{
display:flex;
align-items:center;
gap:10px;
font-size:16px;
color:black;
margin-right:35px;
}

.user-icon{
width:28px;
height:28px;
border-radius:3px;
}

.header-right a{
color:black;
font-size:16px;
}

.header-right a:hover{
text-decoration:underline;
}
</style>
</head>

<body class="flex h-screen overflow-hidden">
    <header class="header">

<div class="header-left">
ADMIN PANEL
</div>

<div class="header-right">

<img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="user-icon">

<span>Hello admin |</span>
   <a href="logout.php" style="text-decoration:none;">
<button>
    <i class="fa-solid fa-right-from-bracket"></i> Logout
</button></a>
</a>
</div>

</header>

<!-- SIDEBAR -->
<aside class="w-64 bg-[#0a192f] text-gray-300 flex flex-col">

<div class="p-6 flex items-center space-x-3">
<div class="bg-white p-2 rounded">
<i class="fas fa-university text-[#0a192f]"></i>
</div>
<div>
<p class="text-[15px] uppercase tracking-wider text-white-400">Raipur Municipal Corporation</p>
</div>
</div>

<nav class="flex-1 px-4 space-y-1 text-sm">

<div class="active-link p-3 mb-4 flex items-center space-x-3 rounded">
<i class="fas fa-th-large"></i>
<span>Dashboard</span>
</div>

<p class="text-[10px] uppercase font-bold text-gray-500 py-2">Management</p>

<a href="tender.html" class="sidebar-item flex justify-between items-center p-2 rounded">
<div class="flex items-center space-x-5">
<i class="fas fa-file-invoice"></i><span><b><i>Tenders</i></b></span>
</div>
</a>

<a href="grievance.html" class="sidebar-item flex justify-between items-center p-2 rounded">
<div class="flex items-center space-x-4">
<i class="fas fa-exclamation-circle"></i><span><b><i>Grievance</i></b></span>
</div>
</a>

<a href="upcoming.html" class="sidebar-item flex items-center space-x-5 p-2 rounded">
<i class="fas fa-calendar-alt"></i><span><b><i>Upcoming Events</i></b></span>
</a>
<a href="gallery.html" class="sidebar-item flex items-center space-x-4 p-2 rounded">
    <i class="fas fa-images"></i><span><b><i>Gallery</i></b></span>
</a>

<a href="officer.html" class="sidebar-item flex items-center space-x-4 p-2 rounded">
    <i class="fas fa-user-tie"></i><span><b><i>Officer List</i></b></span>
</a>
<p class="text-[10px] uppercase font-bold text-gray-500 py-6">Public Services</p>

<a href="hall.html" class="sidebar-item flex items-center space-x-4 p-2 rounded">
    <i class="fas fa-key"></i><span><b><i>Hall Booking</i></b></span>
</a>

<a href="raipurian.html" class="sidebar-item flex items-center space-x-4 p-2 rounded">
    <i class="fas fa-users"></i><span><b><i>For Raipurians</i></b></span>
</a>
<a href="update.html" class="sidebar-item flex items-center space-x-4 p-2 rounded">
<i class="fas fa-edit"></i><span><b><i>Detail Update</i></b></span>
</a>

<a href="Watertank.html" class="sidebar-item flex items-center space-x-4 p-2 rounded">
    <i class="fas fa-tint"></i><span><b><i>Water Tank</i></b></span>
</a>
<a href="feedback.html" class="sidebar-item flex items-center space-x-4 p-2 rounded">
    <i class="fas fa-comment-dots"></i><span><b><i>Feedback</i></b></span>
</a>
<a href="Report.html" class="sidebar-item flex items-center space-x-4 p-2 rounded">
    <i class="fas fa-chart-line"></i><span><b><i>Reports</i></b></span>
</a>

</nav>
</aside>

<!-- MAIN -->
<main class="flex-1 flex flex-col min-w-0">

<div class="flex-1 overflow-y-auto p-8">

<div class="flex justify-between items-end mb-8">
<div>
    <br>
<div class="text">
    <h2 style="font-size: 24px; font-weight: bold; color: #333;margin-top:9px;">Dashboard Overview</h2>
</div>
<p class="text-gray-500 text-sm">Select a category to manage records and updates.</p>
</div>

<div class="date-box">
     📅 <span id="todayDate">wednesday, February 26, 2026</span>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    let today = new Date();

    let options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };

    document.getElementById("todayDate").innerText =
    today.toLocaleDateString('en-IN', options);
});
</script>


</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

<a href="tender.html" class="card block bg-white border-2 border-blue-500 rounded-xl p-6">
<div class="flex justify-between mb-4">
<div class="p-3 bg-blue-50 text-blue-600 rounded-lg"><i class="fas fa-file-contract"></i></div>
</div>
<h3 class="font-bold text-gray-800 mb-1">Tenders</h3>
<p class="text-xs text-gray-500">Manage notices, add new tenders, and view submissions.</p>
</a>

<a href="grievance.html" class="card block bg-white border-2 border-red-500 rounded-xl p-6">
<div class="p-3 bg-red-50 text-red-500 rounded-lg w-fit mb-4">
<i class="fas fa-exclamation-triangle"></i>
</div>
<h3 class="font-bold text-gray-800 mb-1 mt-1">Grievance</h3>
<p class="text-xs text-gray-500">Review and resolve public complaints.</p>
</a>

<a href="upcoming.html" class="card block bg-white border-2 border-orange-500 rounded-xl p-6">
<div class="p-3 bg-orange-50 text-orange-500 rounded-lg w-fit mb-4">
<i class="fas fa-calendar-check"></i>
</div>
<h3 class="font-bold text-gray-800 mb-1">Upcoming Events</h3>
<p class="text-xs text-gray-500">Schedule and manage city events.</p>
</a>

<a href="gallery.html" class="card block bg-white border-2 border-teal-500  rounded-xl p-6">
<div class="p-3 bg-teal-50 text-teal-500 rounded-lg w-fit mb-4">
<i class="fas fa-image"></i>
</div>
<h3 class="font-bold text-gray-800 mb-1">Gallery</h3>
<p class="text-xs text-gray-500">Upload and organize site photos.</p>
</a>



<a href="officer.html" class="card block bg-white border-2 border-purple-500 rounded-xl p-6">
<div class="p-3 bg-purple-50 text-purple-500 rounded-lg w-fit mb-4">
<i class="fas fa-user-shield"></i>
</div>
<h3 class="font-bold text-gray-800 mb-1">Officer List</h3>
<p class="text-xs text-gray-500">Update staff directory and roles.</p>
</a>

<a href="hall.html" class="card block bg-white border-2 border-yellow-500 rounded-xl p-6">
<div class="p-3 bg-yellow-50 text-yellow-600 rounded-lg w-fit mb-4">
<i class="fas fa-key"></i>
</div>
<h3 class="font-bold text-gray-800 mb-1">Hall Booking</h3>
<p class="text-xs text-gray-500">Manage community hall reservations.</p>
</a>

<a href="raipurian.html" class="card block bg-white border-2 border-pink-500 rounded-xl p-6">
<div class="p-3 bg-pink-50 text-pink-500 rounded-lg w-fit mb-4">
<i class="fas fa-users"></i>
</div>
<h3 class="font-bold text-gray-800 mb-1">For Raipurians</h3>
<p class="text-xs text-gray-500">Citizen-centric announcements.</p>
</a>

<a href="update.html" class="card block bg-white border-2 border-slate-500 rounded-xl p-6">
<div class="p-3 bg-slate-50 text-slate-500 rounded-lg w-fit mb-4">
<i class="fas fa-external-link-alt"></i>
</div>
<h3 class="font-bold text-gray-800 mb-1">Detail Update</h3>
<p class="text-xs text-gray-500">General content updates.</p>
</a>

<a href="Watertank.html" class="card block bg-white border-2 border-yellow-500 rounded-xl p-6">
<div class="p-3 bg-yellow-50 text-yellow-600 rounded-lg w-fit mb-4">
<i class="fas fa-tint"></i>
</div>
<h3 class="font-bold text-gray-800 mb-1">Water Tank</h3>
<p class="text-xs text-gray-500">Manage water tank information.</p>
</a>

<a href="feedback.html" class="card block bg-white border-2 border-blue-500 rounded-xl p-6">
<div class="p-3 bg-slate-50 text-slate-500 rounded-lg w-fit mb-4">
<i class="fas fa-comment"></i>
</div>
<h3 class="font-bold text-gray-800 mb-1">Feedback</h3>
<p class="text-xs text-gray-500">Citizen feedback management.</p>
</a>

<a href="Report.html" class="card block bg-white border-2 border-red-500 rounded-xl p-6">
<div class="p-3 bg-red-50 text-red-500 rounded-lg w-fit mb-4">
<i class="fas fa-chart-bar"></i>
</div>
<h3 class="font-bold text-gray-800 mb-1 mt-1">Reports</h3>
<p class="text-xs text-gray-500">Generate and monitor reports.</p>
</a>  






</div>
</div>
<footer class="bg-blue-500 border-t text-center py-3 text-base text-white ">
© 2026 Raipur Municipal Corporation. All Rights Reserved.
</footer>
</main>

<script>
const navItems=document.querySelectorAll('.sidebar-item');
navItems.forEach(item=>{
item.addEventListener('click',function(){
navItems.forEach(i=>i.classList.remove('active-link'));
this.classList.add('active-link');
});
});
</script>


</body>
</html>

