<div class="modal" id="{{ $attributes->get('id') }}">
  <div class="modal-background"></div>

  <div class="modal-content">
    <div class="box">{!! $slot !!}</div>
  </div>

  <button class="modal-close is-large" aria-label="close"></button>
</div>
