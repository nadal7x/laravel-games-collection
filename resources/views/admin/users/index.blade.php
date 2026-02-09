<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        <h1>Usuarios</h1>
        <div class="menu">
            <div class="menu-button"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <title>menu</title>
                        <path d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
                    </svg></span></div>
            <div class="menu-content">
            </div>
        </div>
    </header>
    <main>
        <div class="table">
            <div class="table-tabs">
                <div class="tab-filter tab-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <title>filter-menu</title>
                        <path
                            d="M11 11L16.76 3.62A1 1 0 0 0 16.59 2.22A1 1 0 0 0 16 2H2A1 1 0 0 0 1.38 2.22A1 1 0 0 0 1.21 3.62L7 11V16.87A1 1 0 0 0 7.29 17.7L9.29 19.7A1 1 0 0 0 10.7 19.7A1 1 0 0 0 11 18.87V11M13 16L18 21L23 16Z" />
                    </svg></div>
                <div class="pagination-table tab-button">
                    < 1/1>
                </div>
            </div>
            <div class="table-content">
                @foreach ($records as $record)
                    <table>
                        <tr>
                            <th>Nombre:</th>
                            <td>{{ $record->name }}</td>
                        </tr>
                        <tr>
                            <th>E-mail:</th>
                            <td>{{ $record->email }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de creación:</th>
                            <td>{{ $record->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de actualización:</th>
                            <td>{{ $record->updated_at }}</td>
                        </tr>
                    </table>
                @endforeach
            </div>
        </div>
        <div class="form">
            <div class="form-tabs">
                <div class="content-tabs">
                    <div class="general-tab tab-button">General</div>
                </div>
                <div class="form-options-tabs">
                    <div class="remove-tab tab-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>delete-outline</title>
                            <path
                                d="M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19M8,9H16V19H8V9M15.5,4L14.5,3H9.5L8.5,4H5V6H19V4H15.5Z" />
                        </svg></div>
                    <div class="modify-tab tab-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>pencil-outline</title>
                            <path
                                d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                        </svg></div>
                    <div class="save-tab tab-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>content-save-outline</title>
                            <path
                                d="M17 3H5C3.89 3 3 3.9 3 5V19C3 20.1 3.89 21 5 21H19C20.1 21 21 20.1 21 19V7L17 3M19 19H5V5H16.17L19 7.83V19M12 12C10.34 12 9 13.34 9 15S10.34 18 12 18 15 16.66 15 15 13.66 12 12 12M6 6H15V10H6V6Z" />
                        </svg></div>
                </div>
            </div>
            <div class="form-content">
                <form class="form-crud">
                    <div class="form-field">
                        <label>Nombre</label>
                        <input type="text">
                    </div>
                    <div class="form-field">
                        <label>E-mail</label>
                        <input type="mail">
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>
