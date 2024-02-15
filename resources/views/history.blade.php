<!-- history.blade.php -->
<x-app-layout>

    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-bold mb-4">Session History</h2>
        @if ($patientSessions->isEmpty())
            <p class="text-lg">No sessions found.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-200 px-4 py-2">Date</th>
                            <th class="border border-gray-200 px-4 py-2">Start Time</th>
                            <th class="border border-gray-200 px-4 py-2">End Time</th>
                            <th class="border border-gray-200 px-4 py-2">Approved</th>
                            <th class="border border-gray-200 px-4 py-2">Doctor Name</th>
                            <th class="border border-gray-200 px-4 py-2">Doctor Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patientSessions as $session)
                            <tr>
                                <td class="border border-gray-200 px-4 py-2">{{ $session->date }}</td>
                                <td class="border border-gray-200 px-4 py-2">{{ $session->start_time }}</td>
                                <td class="border border-gray-200 px-4 py-2">{{ $session->end_time }}</td>
                                <td class="border border-gray-200 px-4 py-2">{{ $session->approved ? 'Yes' : 'No' }}</td>
                                <td class="border border-gray-200 px-4 py-2">{{ optional($session->doctor)->name }}</td>
                                <td class="border border-gray-200 px-4 py-2">{{ optional($session->doctor)->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>

