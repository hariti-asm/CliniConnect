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
    <div class="container mx-auto p-4 ml-4">
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
                        <div class="flex justify-between mb-2">
                            <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($date)->format('F Y') }}</div>
                            <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($date)->format('l') }}</div>
                        </div>
                        <div class="grid grid-cols-4 gap-2 mb-2">
                            @foreach ($sessions as $session)
                                @if ($morningSessionCount < 10)
                                    @php 
                                        $buttonClass = ($session->status == 'taken') ? 'bg-[#cdd125] cursor-not-allowed' : 'bg-gray-500 text-white';
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
                        <!-- Status Text -->
                        <div class="text-center text-xs text-gray-500">
                            <div class="flex items-center justify-center mb-2">
                                <input type="checkbox" class="appearance-none border border-gray-300 w-4 h-4 rounded-sm checked:bg-[#cdd125] checked:border-transparent" checked disabled>
                                <span class="ml-1 mr-4">taken</span>
                                <input type="checkbox" class="appearance-none border border-gray-300 w-4 h-4 rounded-sm checked:bg-gray-500 checked:border-transparent" checked disabled>
                                <span>available</span>
                            </div>
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
                        <div class="flex justify-between mb-2">
                            <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($date)->format('F Y') }}</div>
                            <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($date)->format('l') }}</div>
                        </div>
                        <div class="grid grid-cols-4 gap-2 mb-2">
                            @foreach ($sessions as $session)
                                @if ($afternoonSessionCount < 10)
                                    @php 
                                        $buttonClass = ($session->status == 'taken') ? 'bg-[#cdd125] cursor-not-allowed' : 'bg-gray-500 text-white';
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
                        <!-- Status Text -->
                        <div class="text-center text-xs text-gray-500">
                            <div class="flex items-center justify-center mb-2">
                                <input type="checkbox" class="appearance-none border border-gray-300 w-4 h-4 rounded-sm checked:bg-[#cdd125] checked:border-transparent" checked disabled>
                                <span class="ml-1 mr-4">taken</span>
                                <input type="checkbox" class="appearance-none border border-gray-300 w-4 h-4 rounded-sm checked:bg-gray-500 checked:border-transparent" checked disabled>
                                <span>available</span>
                            </div>
                        </div>
                    </div>
                    @if ($afternoonSessionCount >= 10)
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    
</body>
</x-app-layout>
</html>
