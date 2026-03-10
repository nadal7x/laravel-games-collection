<form data-endpoint="{{ route('resources') }}">
    <div class="form-field">
        <label>{{ __('admin/titles.name') }}</label>
        <input type="text" name="name" value="">
    </div>
    <div class="form-field">
        <label>{{ __('admin/titles.release_date') }}</label>
        <input type="date" name="release_date" value="">
    </div>
    <div class="form-field">
        <label>{{ __('admin/titles.developer') }}</label>
        <input type="text" name="developer" value="">
    </div>
    <div class="form-field">
        <label>{{ __('admin/titles.publisher') }}</label>
        <input type="text" name="publisher" value="">
    </div>
    <div class="form-field">
        <label>{{ __('admin/titles.rating') }}</label>
        <input type="number" name="rating" value="">
    </div>
</form>
