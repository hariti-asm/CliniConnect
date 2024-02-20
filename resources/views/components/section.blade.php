


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../css/style.css">
  
    <link rel="stylesheet" href="../css/tooplate-style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/tooplate-style.css">

</head>
<body >
@props(['doctor'])
<section id="sidebar">
     <a href="#" class="brand">
         <i class='bx bxs-smile'></i>
         <span class="text">HealthCare</span>
     </a>
     <ul class="side-menu top">
         <li class="active">
            <a href="{{ route('sessions.show', ['id' => Auth()->user()->id]) }}">
                <i class='bx bxs-dashboard text-[#0D9276]' ></i>
                 <span class="text-[#0D9276]">Sessions</span>
             </a>
         </li>
         <li>
             <a href="{{ route('patients.show',['id' => Auth()->user()->id]) }}">
                 <i class='bx bxs-shopping-bag-alt' ></i>
                 <span class="text">Patients</span>
             </a>
         </li>
         <li>
             <a  href="{{ route('medications.index')}}" >
                 <i class='bx bxs-doughnut-chart' ></i>
                 <span class="text">Medications</span>
             </a>
         </li>
         <li>
                 <a href="{{ route('certificates.show',['id' => Auth()->user()->id]) }}">
                 <i class='bx bxs-message-dots' ></i>
                 <span class="text">Certificates</span>
             </a>
         </li>
         <li>
             <a href="{{ route('feedback.show', ['id' => Auth()->user()->id]) }}">
                 <i class='bx bxs-group' ></i>
                 <span class="text">Feedback</span>
             </a>
         </li>
     </ul>
     <ul class="side-menu">
         <li>
             <a href="#">
                 <i class='bx bxs-cog' ></i>
                 <span class="text">Settings</span>
             </a>
         </li>
         <li>
          <form id="logoutForm" method="POST" action="{{ route('logout') }}">
               @csrf
           </form>
           
           <a href="#" class="logout" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
               <i class='bx bxs-log-out-circle'></i>
               <span class="text">Logout</span>
           </a>
           
           
         </li>
     </ul>
 </section>
 <section id="content">
    <!-- NAVBAR -->
    <nav>
        <i class='bx bx-menu' ></i>
        <a href="#" class="nav-link">Categories</a>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Search...">
                <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
            </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label>
        <a href="#" class="notification">
            <i class='bx bxs-bell' ></i>
            <span class="num">8</span>
        </a>
        <a href="#" class="profile">
           
            <img src="../{{ Auth()->user()->image }}">
        </a>
    </nav>
 </section>