
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
    
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../css/tooplate-style.css">

</head>
<body>
    <aside id="logo-sidebar" class="fixed  top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
           <ul class="space-y-2 font-medium">
              <li>
                <a href="{{ route('sessions.show', ['id' => $doctor->id]) }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                       <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Sessions</span>
                 </a>
              </li>
              <li>
                 <a href="{{ route('patients.show', ['id' => $doctor->id]) }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                       <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Patients</span>
                 </a>
              </li>
              <li>
                 <a href="{{ route('certificates.show',['id'=>$doctor->id]) }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                       <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Certificates</span>
                 </a>
                 
                 <a href="{{ route('feedback.show', ['id' => $doctor->id]) }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                       <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Feedback</span>
                 </a>
                 {{-- {{ route('medications.show', ['id' => $doctor->id]) }} --}}
                 <a href="" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                       <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Medications</span>
                 </a>
              </li>
           </ul>
        </div>
    </aside> 
     {{-- <x-section></x-section> --}}
<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>
 
 

 
 <div class="relative overflow-x-auto">
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
                    {{ $patient->name }}
                </td>
                <td class="px-6 py-4">
                    <!-- Button to view certificates -->
                    <button data-modal-target="comment-modal" data-modal-toggle="comment-modal" class="bg-[#99BC85] text-white px-2 py-1 rounded-md text-sm">Generate</button>
                </td>
                <td class="px-6 py-4">
                    <button class="bg-[#99BC85] text-white px-2 py-1 rounded-md text-sm">Edit</button>
                    <button class="bg-[#99BC85] text-white px-2 py-1 rounded-md text-sm" ta-modal-target="comment-modal" data-modal-toggle="comment-modal">View</button>
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
                <input type="hidden" name="patient_id" id="patient_id" value="{{$patient->id}}">
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
                <button type="submit" class="w-full px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600 mb-2">Generate Certificate</button>
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