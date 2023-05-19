<p>Hallo {{$supporter->data["fname"]}}</p>
<p>Danke, dass du unseren Brief unterschrieben hast. Bitte bestätige deine E-Mail Adresse, damit wir deinen Namen auf unserer Liste anzeigen können.</p>
<div class="my-4">
    <a href="{{__("fbd.site.url")}}/verify/{{$supporter->email_verification_token}}?email={{$supporter->email}}" class="fbd-button">E-Mail Adresse bestätigen</a>
</div>
<p>Wenn du nicht weißt, warum du diese E-Mail erhalten hast, kannst du sie einfach ignorieren.</p>
<p>Nochmals vielen Dank für deine Unterstützung!</p>
<p>
    Das Komitee «Kriegsgewinne besteuern» <br />
    <a href="{{__("fbd.site.url")}}">{{__("fbd.site.url")}}</a>
</p>
