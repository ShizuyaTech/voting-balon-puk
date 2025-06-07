<h1>Enter Your Voter ID</h1>
<form method="POST" action="{{ route('voter.enter') }}">
    @csrf
    <label for="voter_id">Voter ID:</label>
    <input type="text" name="voter_id" id="voter_id" required>
    <button type="submit">Enter</button>
</form>