@component('mail::message')

Uw evaluatie, {{ $name }}

@component('mail::button', ['url' => 'https://www.syntra-limburg.be/'])
    Download PDF

@endcomponent

@endcomponent