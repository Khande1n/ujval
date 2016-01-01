@if (Session::has('noResults'))

    <div class="alert alert-error" role"alert">{{ Session::get('noResults') }} </div>

   {{  session()->forget('noResults') }}

@endif
