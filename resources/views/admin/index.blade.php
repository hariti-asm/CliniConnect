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
			<span class="text">HealthCare</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{route('admin.patients')}}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Patients</span>
				</a>
			</li>
			<li>
				<a href="{{"admin.medications"}}">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Medications</span>
				</a>
			</li>
			<li>
				<a href="{{route('reviews.create')}}">
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
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Specialties</a>
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
				<img src="{{ $doctor->image }}">
			</a>
		</nav>
	
		<main>
			
			

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3><?php echo $specialitiesNumber?></h3>
						<p>specialities</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?php echo $patientsNumber?></h3>
						<p>Patientss</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3><?php echo $doctorsNumber?></h3>
						<p>Doctors</p>
					</span>
				</li>
			</ul>

<div class="table-data">
    <div class="order">
        <div class="head">
            <h4>Recent Doctors</h4>
            <i class='bx bx-search'></i>
            <i class='bx bx-filter'></i>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Doctor</th>
                    <th>Engaging Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctors as $patient)
                <tr>
                    <td>
                        <img src="../{{ $patient->image }}">
                        <p class="text-sm">{{ $patient->name }}</p>
                    </td>
                    <td class="text-sm">{{ $patient->created_at->format('d-m-Y') }}</td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
	<div class="todo">
		<div class="head">
			<h4>specialities</h4>
			<a href="#" data-toggle="modal" data-target="#addspecialityModal"><i class='bx bx-plus'></i></a>
			<i class='bx bx-filter'></i>
		</div>
		<ul class="todo-list">
			@foreach($specialities as $speciality)
			<li>
				<p class="text-[14px]">{{ $speciality->name }}</p>
				<div>
					<a href="#" data-toggle="modal" data-target="#editspecialityModal{{ $speciality->id }}" data-speciality-name="{{ $speciality->name }}"><i class='bx bx-edit'></i></a>
					<a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this speciality?')) document.getElementById('deletespecialityForm{{ $speciality->id }}').submit();"><i class='bx bx-trash'></i></a>
					<form id="deletespecialityForm{{ $speciality->id }}" action="{{ route('specialities.destroy', $speciality->id) }}" method="POST" style="display: none;">
						@csrf
						@method('DELETE')
					</form>
				</div>
			</li>
			@endforeach
		</ul>
	</div>
	
<!-- Add speciality Modal (closed by default) -->
<div id="addspecialityModal" class="modal fixed inset-0 overflow-y-auto hidden" tabindex="-1" aria-labelledby="addspecialityModalLabel" aria-hidden="true" data-modal-target="addspecialityModal">
    <div class="modal-dialog flex items-center justify-center min-h-screen">
        <div class="modal-content bg-white rounded-lg shadow-lg max-w-md w-full">
            <div class="modal-header flex justify-between bg-gray-100 py-2 px-4">
                <h5 class="modal-title text-lg font-semibold" id="addspecialityModalLabel">Add Speciality</h5>
                <button type="button" class="btn-close" data-modal-hide="addspecialityModal" aria-label="Close">X</button>
            </div>
            <div class="modal-body p-4">
                <!-- Form for adding a speciality -->
                <form action="{{ route('specialities.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="font-semibold">Speciality Name:</label>
                        <input type="text" class="form-input border border-[#DBE7C9] px-2 py-2 rounded-xl focus:outline-none" id="name" name="name" required>
                    </div>
                    <button type="submit" class="bg-[#99BC85] text-white font-semibold text-md px-3 py-1 rounded-full w-full max-w-sm">Add Speciality</button>
                </form>
            </div>
        </div>
    </div>
</div>


	
@foreach($specialities as $speciality)
<!-- Edit speciality Modal -->
<div class="modal fade hidden" id="editspecialityModal{{ $speciality->id }}" tabindex="-1" aria-labelledby="editspecialityModalLabel{{ $speciality->id }}" aria-hidden="true" data-modal-target="editspecialityModal{{ $speciality->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editspecialityModalLabel{{ $speciality->id }}">Edit speciality</h5>
                <button type="button" class="close" data-modal-hide="editspecialityModal{{ $speciality->id }}" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('specialities.update', $speciality->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Speciality Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $speciality->name }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update speciality</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endforeach	
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
                modal.classList.remove("hidden");
                modal.setAttribute("aria-hidden", "false");
            });
        });

        modalCloses.forEach((close) => {
            close.addEventListener("click", () => {
                const target = close.getAttribute("data-modal-hide");
                const modal = document.getElementById(target);
                modal.classList.add("hidden");
                modal.setAttribute("aria-hidden", "true");
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