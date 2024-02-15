
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
    <link rel="stylesheet" href="css/style.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../css/tooplate-style.css">
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="../css/style.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="../css/tooplate-style.css">
</head>
<body>
    <x-section :doctor="$doctor"></x-section>

<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>
 
 

 
 <div class="w-full max-w-[70%] mx-auto ml-[250px] mt-10">
    <table class="w-full max-w-7xl mx-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Patient Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Genarate certificate
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>        <tbody>
            @foreach ($patients as $patient)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    <p class="text-gray-600 text-lg">

                        {{ $patient->patient->name }}
                    </p>
                </td>
                <td class="px-6 py-4">
                    <!-- Button to view certificates -->
                    <button data-modal-target="comment-modal" data-modal-toggle="comment-modal" class="bg-[#0D9276] text-white px-2 py-1 rounded-md text-sm">Generate</button>
                </td>
                <td class="px-6 py-4">
                    <button class="bg-[#97c0b8] text-white px-2 py-1 rounded-md text-sm">Edit</button>
                    <button class="bg-[#97c0b8] text-white px-2 py-1 rounded-md text-sm" ta-modal-target="comment-modal" data-modal-toggle="comment-modal">View</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Modal -->
    <div id="comment-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
        <div class="max-w-3xl mx-auto mt-8 bg-white p-8 rounded-md shadow-md">
            <h2 class="text-2xl font-bold mb-4">Fill Certificate Details</h2>
            <form action="{{ route('certificates.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-semibold text-gray-700">Title:</label>
                    <input type="text" name="title" id="title" class="w-full border-gray-300 rounded-md mt-1 focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-semibold text-gray-700">Description:</label>
                    <textarea name="description" id="description" class="w-full border-gray-300 rounded-md mt-1 focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                </div>
                <div class="mb-4">
                    <label for="date_received" class="block text-sm font-semibold text-gray-700">Date Received:</label>
                    <input type="date" name="date_received" id="date_received" class="w-full border-gray-300 rounded-md mt-1 focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>
                <div class="mb-4">
                    <label for="issuer" class="block text-sm font-semibold text-gray-700">Issuer:</label>
                    <input type="text" name="issuer" id="issuer" class="w-full border-gray-300 rounded-md mt-1 focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>
                <div class="mb-4">
                    <label for="expiration_date" class="block text-sm font-semibold text-gray-700">Expiration Date:</label>
                    <input type="date" name="expiration_date" id="expiration_date" class="w-full border-gray-300 rounded-md mt-1 focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <!-- Hidden input for doctor_id populated with logged-in doctor's ID -->
                <input type="hidden" name="doctor_id" value="{{ auth()->user()->id }}">
                <!-- Hidden input for patient_id -->
                <input type="hidden" name="patient_id" id="patient_id" value="">
                <div class="mb-4">
                    <label for="illness_id" class="block text-sm font-semibold text-gray-700">Select Illness:</label>
                    <select name="illness_id" id="illness_id" class="w-full border-gray-300 rounded-md mt-1 focus:border-indigo-500 focus:ring-indigo-500" required>
                        <option value="">Select Illness</option>
                        @foreach($illnesses as $illness)
                            <option value="{{ $illness->id }}">{{ $illness->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Button for generating certificate -->
                <button type="submit" class="w-full px-4 py-2 bg-[#0D9276] text-white rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600 mb-2">Generate Certificate</button>
            </form>
        </div>
    </div>
    
    
    
    
    
    
    
</div>

<script>
     const illnessSelect = document.getElementById('illness_id');
    const newIllnessSection = document.getElementById('new-illness-section');

    illnessSelect.addEventListener('change', function() {
        if (illnessSelect.value === '0') {
            newIllnessSection.classList.remove('hidden');
        } else {
            newIllnessSection.classList.add('hidden');
        }
    });
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
    });
</script>
    

</body>
</html>