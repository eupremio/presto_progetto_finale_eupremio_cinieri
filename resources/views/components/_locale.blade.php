<form method="POST" action="{{ route('setLocale', $lang) }}">
    @csrf

    <button type="submit" class="btn">
        <img
            src="{{ asset('vendor/blade-flags/country-' . $lang . '.svg') }}"
            width="25"
            height="25"
            alt="{{ $lang }}"
        >
    </button>
</form>