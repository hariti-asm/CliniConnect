<x-app-layout>

    <!-- Display patient information -->
    <div class="max-w-[80%] mx-auto">
    
        <h2 class="text-xl font-bold mb-2 mt-5">Preferred Doctors:</h2>
        <div class="grid grid-cols-3 gap-4">
            @foreach ($preferredDoctors as $favorite)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="../{{ $favorite->doctor->image }}" class="w-full h-[200px] object-cover rounded-t-lg" alt="{{ $favorite->doctor->name }}">
                    <div class="p-4 flex justify-between items-center">
                        <div>
                            <a href="{{ route('doctor_detail', ['id' => $favorite->doctor->id]) }}" class="text-lg font-bold mb-2">{{ $favorite->doctor->name }}</a>
                            <p class="text-gray-600">{{ $favorite->doctor->speciality->name }}</p>
                            <p class="text-gray-300">{{ $favorite->doctor->phone }}</p>
                        </div>
                        <form action="{{ route('remove_from_favorites') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="doctor_id" value="{{ $favorite->doctor->id }}">
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
