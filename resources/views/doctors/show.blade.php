<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
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
 
 

 
 <div class="w-full max-w-[80%] mx-auto ml-[200px] mt-10">
    <p class=" w-full max-w-7xl ml-[11%] mt-6 text-[#0D9276] font-semibold italic bg-gray-300 rounded">Sessions</p>

    <table class="w-full max-w-7xl  mx-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  
                   
                   
                    <th scope="col" class="px-6 py-3">
                        <p class="text-lg text-black font-semibold italic">
                            Start time
                        </p>
                    </th>
                    <th scope="col" class="px-4 py-3">
                        <p class="text-lg text-black font-semibold italic">
                          End time
                        </p>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <p class="text-lg text-black font-semibold italic">
                            Date
                        </p>
                    </th>
                   
                   
                   
                  
                </tr>
            </thead>
            <tbody>
                @foreach ($sessions as $session)
                    @if ($session->patient) 
                    {{-- @dd($session->patient) --}}
                    {{-- {{$session->doctor->speciality->name}} --}}
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">
                                <p class="text-lg">
                                    {{ $session->start_time }}
                                </p>
                            </td>
                            <td class="px-6 py-4"> 
                                <p class="text-lg">

                                    {{ $session->end_time}}
                                </p>
                            </td>
                           
                          
                           
                            
                            <td class="px-6 py-4">
                                <p class="text-lg">
                                    {{ $session->created_at }}
                                </p>
                            </td>
                           
                            
                          
                       
                        </tr>
                    @endif
                @endforeach
            </tbody>
            
        </table>
        

        <p class=" w-full max-w-7xl ml-[11%] mt-6 text-[#0D9276] font-semibold italic bg-gray-300 rounded">Medical records</p>
        <table class="w-full max-w-7xl  mx-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-lg text-black font-semibold italic">Patient</p>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-lg text-black font-semibold italic">Illness</p>
                        </th>
                        
                        <th scope="col" class="px-6 py-3">
                            <p class="text-lg text-black font-semibold italic">Medications</p>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-lg text-black font-semibold italic">Dosage</p>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <p class="text-lg text-black font-semibold italic">Date</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $patient)
                        @foreach ($patientIllnesses[$patient->id] as $illnessName => $illnesses)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                @foreach ($sessions as $session)

                                <td>

                                    <p>{{$session->patient->name}}</p>
                                </td>
                                @endforeach
                                <td class="px-6 py-4">{{ $illnessName }}</td>
                                <td class="px-6 py-4">
                                    <ul>
                                        @foreach ($illnesses as $illness)
                                        {{-- @dd($illness->name) --}}
                                            {{-- @foreach ($illness->medications as $medication) --}}
                                                <li>{{ $illness->name }}</li>
                                            {{-- @endforeach --}}
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="px-6 py-4">
                                    <ul>
                                                <li>{{ $illness->dosage }}</li>
                                    </ul>
                                </td>
                                <td class="px-6 py-4">{{ $session->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
                
                
                
                
                
                
            </table>
            
        
        
        
    <script src="../js/script.js"></script>
   
    <script>
        // Define openModal function to open the modal
        function openModal(sessionId) {
            const modal = document.getElementById(`my_modal_${sessionId}`);
            modal.showModal();
        }
    
        // Call openModal function when the page is loaded
        window.addEventListener('DOMContentLoaded', function() {
            openModal('{{ $session->id }}');
        });
    
        // Define closeModal function to close the modal
        function closeModal(sessionId) {
            const modal = document.getElementById(`my_modal_${sessionId}`);
            modal.close();
        }
    </script>
    
</body>
</html>