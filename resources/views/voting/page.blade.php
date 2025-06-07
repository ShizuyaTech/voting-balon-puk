<h1>Vote for Your Candidate</h1>
@foreach ($candidates as $candidate)
    <div>
        <h2>{{ $candidate->name }}</h2>
        <p>{{ $candidate->description }}</p>
        <form method="POST" action="{{ route('voting.page') }}">
            @csrf
            <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
            <button type="submit">Vote</button>
        </form>
    </div>
@endforeach