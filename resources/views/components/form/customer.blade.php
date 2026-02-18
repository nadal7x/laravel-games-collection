@props(['element'])

<div class="form-buttons">
    <div class="content-buttons">
        <div class="general-button tab-button">General</div>
    </div>
    <div class="form-options-buttons">
        <div class="delete-button tab-button" data-endpoint="{{ route('customers_destroy', ':id') }}"><svg
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <title>delete-outline</title>
                <path
                    d="M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19M8,9H16V19H8V9M15.5,4L14.5,3H9.5L8.5,4H5V6H19V4H15.5Z" />
            </svg>
        </div>
        <div class="clear-button tab-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <title>broom</title>
                <path
                    d="M19.36,2.72L20.78,4.14L15.06,9.85C16.13,11.39 16.28,13.24 15.38,14.44L9.06,8.12C10.26,7.22 12.11,7.37 13.65,8.44L19.36,2.72M5.93,17.57C3.92,15.56 2.69,13.16 2.35,10.92L7.23,8.83L14.67,16.27L12.58,21.15C10.34,20.81 7.94,19.58 5.93,17.57Z" />
            </svg>
        </div>
        <div class="save-button tab-button" data-endpoint="{{ route('customers_store') }}"><svg
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <title>content-save-outline</title>
                <path
                    d="M17 3H5C3.89 3 3 3.9 3 5V19C3 20.1 3.89 21 5 21H19C20.1 21 21 20.1 21 19V7L17 3M19 19H5V5H16.17L19 7.83V19M12 12C10.34 12 9 13.34 9 15S10.34 18 12 18 15 16.66 15 15 13.66 12 12 12M6 6H15V10H6V6Z" />
            </svg>
        </div>
    </div>
</div>
<div class="form-content">
    <form>
        <input type="hidden" name="id" value="{{ $element ? $element->id : '' }}">
        <div class="form-field">
            <label>{{ __('admin/titles.name') }}</label>
            <input type="text" name="name" value="{{ $element ? $element->name : '' }}">
        </div>
        <div class="form-field">
            <label>{{ __('admin/titles.email') }}</label>
            <input type="mail" name="email" value="{{ $element ? $element->email : '' }}">
        </div>
        @if (!$element)
            <div class="form-field">
                <label>{{ __('admin/titles.password') }}</label>
                <input type="password" name="password" value="">
            </div>
            <div class="form-field">
                <label>{{ __('admin/titles.password_confirmation') }}</label>
                <input type="password" name="password_confirmation" value="">
            </div>
        @endif
    </form>
</div>
