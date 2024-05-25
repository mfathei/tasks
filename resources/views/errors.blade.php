@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->getBags() as $bag)
        @foreach ($bag->all() as $field => $error)
          <li>{{ $error }}</li>
        @endforeach
      @endforeach
    </ul>
  </div>
@endif
