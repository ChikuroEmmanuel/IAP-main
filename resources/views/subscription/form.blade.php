<!-- resources/views/subscription/form.blade.php -->
<form method="POST" action="{{ route('subscribe') }}">
    @csrf

    <label for="plan">Select Plan:</label>
    <select name="plan" id="plan">
        <option value="1">1 Month</option>
        <option value="3">3 Months</option>
        <option value="6">6 Months</option>
        <!-- Add more options as needed -->
    </select>

    <button type="submit">Subscribe</button>
</form>
