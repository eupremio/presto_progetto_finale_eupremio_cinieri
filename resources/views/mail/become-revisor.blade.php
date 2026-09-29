<h1>Richiesta per diventare revisore</h1>

<p>
    L'utente {{ $user->name }} ha richiesto di diventare revisore.
</p>

<p>
    Email: {{ $user->email }}
</p>

<a href="{{ route('make.revisor', ['user' => $user]) }}">
    Rendi revisore
</a>