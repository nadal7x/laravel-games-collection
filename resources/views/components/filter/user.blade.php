<form data-endpoint="{{ route('users') }}">
    <div class="form-field">
        <label>{{ __('admin/titles.name') }}</label>
        <input type="text" name="name" value="">
    </div>
    <div class="form-field">
        <label>{{ __('admin/titles.email') }}</label>
        <input type="mail" name="email" value="">
    </div>
</form>
