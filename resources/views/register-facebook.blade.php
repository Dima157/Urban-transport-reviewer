<form method="post" action="{{ route('save_pass') }}">
    <input type="text"name="email"value="{{ $email }}">
    <input type="password"name="pass">
    <input type="submit"value="Save">
</form>