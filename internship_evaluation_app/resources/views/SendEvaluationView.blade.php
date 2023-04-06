@component('mail::message')

Beste {{ $name }},

U behaalde totaal: 83% <br>
Gefeliciteerd, u bent geslaagd voor de stage bij Dignify

@component('mail::button', ['url' => 'https://www.syntra-limburg.be/'])
    Download PDF

@endcomponent

@endcomponent