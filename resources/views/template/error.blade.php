{{-- bien error duoc tu sinh ra --}}
@if ($errors->any()) 
   <ul>
        @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
        @endforeach
   </ul>
@endif
{{-- @if (Session::has('success'))
    <strong>{{ Session::get() }}</strong>
@endif --}}