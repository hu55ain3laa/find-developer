@props(['developer', 'currentUserDeveloper' => null, 'recommendedDeveloperIds' => []])

@php
    $isPremium = $developer->subscription_plan->value === 'premium';
    $isPro = $developer->subscription_plan->value === 'pro';
@endphp

@if($isPremium)
    <x-developer-card-premium :developer="$developer" :currentUserDeveloper="$currentUserDeveloper" :recommendedDeveloperIds="$recommendedDeveloperIds" />
@elseif($isPro)
    <x-developer-card-pro :developer="$developer" :currentUserDeveloper="$currentUserDeveloper" :recommendedDeveloperIds="$recommendedDeveloperIds" />
@else
    <x-developer-card-normal :developer="$developer" :currentUserDeveloper="$currentUserDeveloper" :recommendedDeveloperIds="$recommendedDeveloperIds" />
@endif
