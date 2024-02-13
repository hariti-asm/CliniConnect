
@props(['doctor'])
<section id="sidebar">
     <a href="#" class="brand">
         <i class='bx bxs-smile'></i>
         <span class="text">HealthCare</span>
     </a>
     <ul class="side-menu top">
         <li class="active">
             <a href="{{ route('sessions.show', ['id' => $doctor->id]) }}">
                 <i class='bx bxs-dashboard text-[#0D9276]' ></i>
                 <span class="text-[#0D9276]">Sessions</span>
             </a>
         </li>
         <li>
             <a href="{{ route('patients.show', ['id' => $doctor->id]) }}">
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
                 <a href="{{ route('certificates.show',['id'=>$doctor->id]) }}">
                 <i class='bx bxs-message-dots' ></i>
                 <span class="text">Certificates</span>
             </a>
         </li>
         <li>
             <a href="{{ route('feedback.show', ['id' => $doctor->id]) }}">
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