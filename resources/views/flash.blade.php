@if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

@if (session('error'))
  <div class="alert alert-danger">
    {{ session('error') }}
  </div>
@endif

{{-- To display all messages --}}
@if (session()->has('message'))
  <div class="alert alert-info">
    {{ session('message') }}
  </div>
@endif
