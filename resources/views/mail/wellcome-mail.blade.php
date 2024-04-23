<x-mail::message>
Bienvenue chez TrustImo !

Madame, Monsieur, {{$user->UserName}}

Nous sommes ravis de vous accueillir chez TrustImo !

En tant que nouveau inscrit, vous avez désormais accès à toutes les fonctionnalités exceptionnelles que notre plateforme a à vous offrir.

Que peut faire TrustImo pour vous ?

<ul>
    <li>Vous aider à trouver le logement ou le biens immobilier qu'il vous faut,</li>
    <li>Vous mettre en contact avec des agences immobilières, des démarcheurs et des propriétaires de biens immbiliers</li>
    <li>Donner de la visibilité à vos annonces immobilières</li>
    <li>Multiplier le nombre de contact sur chacune de vos avvonces</li>
</ul>
Et bien d'autres choses encore.
Nous sommes là pour vous !

N'hésitez pas à nous contacter si vous avez des questions ou des suggestions. Notre équipe d'assistance est toujours disponible pour vous aider.

Encore une fois, bienvenue dans la famille {{$user->UserName}} !

Cordialement,

L'équipe TrustImo

<x-mail::button :url="''">
Connectez-vous
</x-mail::button>

MERCI,<br>
{{ config('app.name') }}
</x-mail::message>



