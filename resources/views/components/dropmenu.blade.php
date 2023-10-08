<div class="dropdown {{ $attributes->get('class', '') }}">
    <div class="dropdown-trigger">
        <button class="button" style="border-width: 0" aria-haspopup="true" aria-controls="dropdown-menu-familia">
           {!! $icon !!}
        </button>
    </div>
    <div class="dropdown-menu" id="dropdown-menu-familia" role="menu">
        <div class="dropdown-content">
            {!! $slot !!}
        </div>
    </div>
</div>
