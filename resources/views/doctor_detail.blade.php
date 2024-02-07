<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<x-app-layout>
<body class="bg-gray-100">
    

  
  <!-- Main modal -->
  <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex items-center justify-center">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Book an appointment 
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <h2 class="text-2xl font-bold">{{ $doctor->name }}</h2>
                <div class="overflow-x-auto">
                    <table class="w-full table-auto border-collapse border border-gray-200">
                        <thead>
                            <tr>
                                <th class="border border-gray-200 px-2 py-1">Time</th>
                                <th class="border border-gray-200 px-2 py-1">Book</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sessions as $time)
                                @if ($time->status === 'available')
                                    <tr>
                                        <td class="border border-gray-200 px-2 py-1">{{ $time->start_time }}</td>
                                        <td class="border border-gray-200 px-2 py-1 flex justify-center">
                                            <form action="{{ route('appointments.book', $time->id) }}" method="POST">
                                                @csrf
                                                <button class="bg-[#99BC85] hover:bg-[#99BC85] text-white px-3 py-1 rounded focus:outline-none">Book</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="default-modal" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            </div>
        </div>
    </div>
</div>





  
    <div class="container mx-auto p-4 ml-5">
        <div>
            <img src="../{{$doctor->image}}" class="w-32 h-32 object-cover object-center rounded-full" alt="Doctor Image">
            <h2 class="text-2xl font-bold">{{ $doctor->name }}</h2>
            <p class="text-lg text-gray-600">{{ $doctor->speciality->name }}</p>
            <div class="flex items-center mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 mr-2" fill="none" stroke="#a5c422" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 14v7a2 2 0 002 2h10a2 2 0 002-2v-7"/>
                </svg>
                
                <p class="text-sm text-gray-600">{{ $doctor->email }}</p>
            </div>
            <div class="flex items-center mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#a5c422" stroke-width="2">
                    <path d="M5.11596 12.7268L8.15456 9.08666C8.46255 8.69067 8.61655 8.49267 8.69726 8.27061C8.76867 8.07411 8.79821 7.86486 8.784 7.65628C8.76793 7.42055 8.67477 7.18766 8.48846 6.72187L7.77776 4.94513C7.50204 4.25581 7.36417 3.91116 7.12635 3.68525C6.91678 3.48618 6.65417 3.3519 6.37009 3.29856C6.0477 3.23803 5.68758 3.32806 4.96733 3.50812L3 4.00002C3 14 9.99969 21 20 21L20.4916 19.0324C20.6717 18.3122 20.7617 17.952 20.7012 17.6297C20.6478 17.3456 20.5136 17.083 20.3145 16.8734C20.0886 16.6356 19.7439 16.4977 19.0546 16.222L17.4691 15.5878C16.9377 15.3752 16.672 15.2689 16.4071 15.2608C16.1729 15.2536 15.9404 15.3013 15.728 15.4002C15.4877 15.512 15.2854 15.7144 14.8807 16.1191L11.7943 19.1569" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                
            
                <p class="text-sm text-gray-600">{{ $doctor->phone }}</p>
            </div>
        </div>
    </div>
    
    
    
    <div class="container mx-auto p-4">
        <div class="flex flex-wrap">
            <!-- Morning Sessions -->
            <div class="w-full md:w-1/2 p-4">
                <h3 class="text-xl font-semibold mb-4">Morning Sessions</h3>
                @php $morningSessionCount = 0; @endphp
                @foreach ($morning_sessions as $date => $sessions)
                    <div class="bg-white rounded-lg shadow-md p-4 mb-4">
                        <div class="flex justify-between mb-4">
                            <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($date)->format('F Y') }}</div>
                            <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($date)->format('l') }}</div>
                        </div>
                        <div class="grid grid-cols-4 gap-2 mb-4">
                            @foreach ($sessions as $session)
                                @if ($morningSessionCount < 10)
                                    @php 
                                        $buttonClass = ($session->status == 'taken') ? 'bg-[#E1F0DA] cursor-not-allowed' : 'bg-[#474F7A] text-white';
                                        $disabled = ($session->status == 'taken') ? 'disabled' : '';
                                        $checked = ($session->status == 'taken') ? 'checked' : '';
                                        $statusText = ($session->status == 'taken') ? 'taken' : 'available';
                                        $sessionTime = \Carbon\Carbon::parse($session->start_time)->format('h:i A');
                                    @endphp
                                    <button class="{{ $buttonClass }} px-2 py-1 rounded-full text-xs {{ $disabled }}" {{ $disabled }}>
                                        {{ $sessionTime }}
                                    </button>
                                    @php $morningSessionCount++; @endphp
                                @else
                                    @break
                                @endif
                            @endforeach
                        </div>
                        <!-- Status Text and Button -->
                        <div class="text-center text-xs text-gray-500 flex justify-between items-center">
                            <div class="flex items-center justify-start mb-2">
                                <input type="checkbox" class="appearance-none border border-gray-300 w-4 h-4 rounded-sm checked:bg-[#E1F0DA] checked:border-transparent" checked disabled>
                                <span class="ml-1 mr-4">taken</span>
                                <input type="checkbox" class="appearance-none border border-gray-300 w-4 h-4 rounded-sm checked:bg-[#474F7A] checked:border-transparent" checked disabled>
                                <span>available</span>
                            </div>
                            @if ($session->status == 'available')
                                <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="bg-[#99BC85] text-white px-1 py-1 rounded-md text-sm">Take Appointment</button>
                            @endif
                        </div>
                    </div>
                    @if ($morningSessionCount >= 10)
                        @break
                    @endif
                @endforeach
            </div>
    
            <!-- Afternoon Sessions -->
            <div class="w-full md:w-1/2 p-4">
                <h3 class="text-xl font-semibold mb-4">Afternoon Sessions</h3>
                @php $afternoonSessionCount = 0; @endphp
                @foreach ($afternoon_sessions as $date => $sessions)
                    <div class="bg-white rounded-lg shadow-md p-4 mb-4">
                        <div class="flex justify-between mb-4">
                            <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($date)->format('F Y') }}</div>
                            <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($date)->format('l') }}</div>
                        </div>
                        <div class="grid grid-cols-4 gap-2 mb-4">
                            @foreach ($sessions as $session)
                                @if ($afternoonSessionCount < 10)
                                    @php 
                                        $buttonClass = ($session->status == 'taken') ? 'bg-[#99BC85] cursor-not-allowed' : 'bg-[#474F7A] text-white';
                                        $disabled = ($session->status == 'taken') ? 'disabled' : '';
                                        $checked = ($session->status == 'taken') ? 'checked' : '';
                                        $statusText = ($session->status == 'taken') ? 'taken' : 'available';
                                        $sessionTime = \Carbon\Carbon::parse($session->start_time)->format('h:i A');
                                    @endphp
                                    <button class="{{ $buttonClass }} px-2 py-1 rounded-full text-xs {{ $disabled }}" {{ $disabled }}>
                                        {{ $sessionTime }}
                                    </button>
                                    @php $afternoonSessionCount++; @endphp
                                @else
                                    @break
                                @endif
                            @endforeach
                        </div>
                        <!-- Status Text and Button -->
                        <div class="text-center text-xs text-gray-500 flex justify-between items-center">
                            <div class="flex items-center justify-start mb-2">
                                <input type="checkbox" class="appearance-none border border-gray-300 w-4 h-4 rounded-sm checked:bg-[#E1F0DA] checked:border-transparent" checked disabled>
                                <span class="ml-1 mr-4">taken</span>
                                <input type="checkbox" class="appearance-none border border-gray-300 w-4 h-4 rounded-sm checked:bg-gray-500 checked:border-transparent" checked disabled>
                                <span>available</span>
                            </div>
                            @if ($session->status == 'available')
                                <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="bg-[#99BC85] text-white px-1 py-1 rounded-md text-sm">Take Appointment</button>
                            @endif
                        </div>
                    </div>
                    @if ($afternoonSessionCount >= 10)
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    
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
        });
    </script>
</body>
</x-app-layout>
</html>
