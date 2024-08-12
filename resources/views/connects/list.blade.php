<ul>
    @foreach ($socials as $social)
        <li>
            <a href="{{ $social->is_link }}" target="_blank">
                <img src="{{ $social->thumb }}" alt="" />
            </a>
        </li>
    @endforeach
</ul>
