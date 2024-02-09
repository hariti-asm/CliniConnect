@foreach ($sessions as $session)
    <p>Doctor: {{ $session->doctor->name }}</p>
    <p>Session ID: {{ $session->id }}</p> <!-- Debugging -->
    @if ($session->patient)
        <p>Patient(s): 
            {{ $session->patient->name }} ({{ $session->patient->email }})
        </p>
    @else
        <p>No patient assigned to this session.</p>
    @endif
    <p>Date: {{ $session->date }}</p>
    <p>Start Time: {{ $session->start_time }}</p>
    <p>End Time: {{ $session->end_time }}</p>
    <hr>
@endforeach
