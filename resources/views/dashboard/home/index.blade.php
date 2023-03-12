@extends('dashboard.layout.index')
@section('content')
    @if(session('success'))
        @section('script')
            <script type="text/javascript">
                toastr["success"]("{{ session('success') }}");
            </script>
        @endsection
    @endif
@endsection