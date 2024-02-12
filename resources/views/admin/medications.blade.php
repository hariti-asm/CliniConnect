<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>AdminHub</title>
</head>
<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">AdminHub</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="{{route('admin.index')}}">
                    <i class='bx bxs-dashboard text-[#0D9276]' ></i>
                    <span class="text-[#0D9276]">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.patients')}}">
                    <i class='bx bxs-shopping-bag-alt' ></i>
                    <span class="text">Patients</span>
                </a>
            </li>
            <li>
                <a href="{{route("admin.medications")}}">
                    <i class='bx bxs-doughnut-chart' ></i>
                    <span class="text">Medications</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-message-dots' ></i>
                    <span class="text">Message</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-group' ></i>
                    <span class="text">Team</span>
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
                <a href="#" class="logout">
                    <i class='bx bxs-log-out-circle' ></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu' ></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn bg-[#0D9276]"><i class=' bx bx-search' ></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class='bx bxs-bell' ></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
				<img src="../{{$doctor->image }}">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    
                </div>
                <button data-toggle="modal" data-target="#addMedicineModal" type="button" class=" bg-[#0D9276] rounded-full px-2 py-1 ">
                    <span class="text-white text-semibold">Add New Medicine</span>
                </button>
               
            </div>
         
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Recent Medicines</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                  
                
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date Order</th>
                                <th>Action</th> <!-- New column for actions -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($medications as $medication)
                            <tr>
                                <td>
                                    <p class="text-gray-500 text-sm">{{ $medication->name }}</p>
                                </td>
                                <td>
                                    
                                    <p class="text-gray-500 text-sm">{{ $medication->created_at->format('d-m-Y') }}</p></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#editMedicineModal{{ $medication->id }}"><i class='bx bx-edit'></i></a>
                                   
                                    <form id="updateMedicineForm{{ $medication->id }}" action="{{ route('medications.update', $medication->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('PUT')
                                    </form>
                                    <!-- Courbeille icon for delete -->
                                    <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this medicine?')) document.getElementById('deleteMedicineForm{{ $medication->id }}').submit();"><i class='bx bxs-trash'></i></a>
                                    <!-- Delete form -->
                                    <form id="deleteMedicineForm{{ $medication->id }}" action="{{ route('medications.destroy', $medication->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            <!-- Edit medicine Modal -->
                            <div id="editMedicineModal{{ $medication->id }}" class="modal fade" tabindex="-1" aria-labelledby="editMedicineModalLabel{{ $medication->id }}" aria-hidden="true" style="display: none;">
                                <!-- Modal content for editing medicine -->
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
               
                <div id="addMedicineModal" class="modal fade" tabindex="-1" aria-labelledby="addMedicineModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header flex justify-between">
                                <h5 class="modal-title" id="addMedicineModalLabel">Add New Medicine</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
                            </div>
                            <div class="modal-body">
                                <form id="addMedicineForm" class="flex flex-col gap-4" action="{{ route('admin.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="medicine_name">Medicine Name:</label>
                                        <input type="text" class="form-control border border-[#DBE7C9]  px-2 py-2 rounded-xl focus:outline-none" id="medicine_name" name="medicine_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="medicine_description">Medicine desc:</label>
                                        <input type="text" class="form-control border  border-[#DBE7C9] px-2 py-2 rounded-xl focus:outline-none" id="medicine_description" name="medicine_description" required>
                                    </div>
                                    <button type="submit" class="bg-[#99BC85] font-semibold text-white text-md px-3 py-1 rounded-full w-full max-w-sm">Add Medicine</button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            


        </main>
    </section>
    

    <script>
     document.addEventListener("DOMContentLoaded", function () {
        const modalToggles = document.querySelectorAll("[data-modal-toggle]");
        const modalCloses = document.querySelectorAll("[data-modal-hide]");

        modalToggles.forEach((toggle) => {
            toggle.addEventListener("click", () => {
                const target = toggle.getAttribute("data-modal-target");
                const modal = document.getElementById(target);
                modal.classList.toggle("hidden");
                modal.setAttribute("aria-hidden", modal.classList.contains("hidden"));
            });
        });

        modalCloses.forEach((close) => {
            close.addEventListener("click", () => {
                const target = close.getAttribute("data-modal-hide");
                const modal = document.getElementById(target);
                modal.classList.add("hidden");
                modal.setAttribute("aria-hidden", modal.classList.contains("hidden"));
            });
        });
        const editIcons = document.querySelectorAll('[data-toggle="modal"]');
        editIcons.forEach((icon) => {
            icon.addEventListener("click", () => {
                const targetModalId = icon.getAttribute("data-target");
                const modal = document.getElementById(targetModalId);
                modal.classList.remove("hidden");
                modal.setAttribute("aria-hidden", modal.classList.contains("hidden"));
            });
        });
    });
   
        const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
    const li = item.parentElement;

    item.addEventListener('click', function () {
        allSideMenu.forEach(i=> {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
    sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
    if(window.innerWidth < 576) {
        e.preventDefault();
        searchForm.classList.toggle('show');
        if(searchForm.classList.contains('show')) {
            searchButtonIcon.classList.replace('bx-search', 'bx-x');
        } else {
            searchButtonIcon.classList.replace('bx-x', 'bx-search');
        }
    }
})





if(window.innerWidth < 768) {
    sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
    searchButtonIcon.classList.replace('bx-x', 'bx-search');
    searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
    if(this.innerWidth > 576) {
        searchButtonIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
    if(this.checked) {
        document.body.classList.add('dark');
    } else {
        document.body.classList.remove('dark');
    }
})
    </script>
</body>
</html>
