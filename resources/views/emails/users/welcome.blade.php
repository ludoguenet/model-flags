<x-mail::message>
# Introduction

Bienvenue {{ $user->name }}

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
