@component('mail::message')
# Introduction

Welcome to freeCodeGram

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
