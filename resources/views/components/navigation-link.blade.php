<li class="nav-item">
    <a href="{{ url($attributes['url']) }}" class="nav-link flex align-items-center">
        {{ $slot }}
        <p>{{ $attributes['name'] }}</p>
    </a>
</li>