@extends('dashboard.layout.index')
@section('content')
    
    <a href="{{route('dashboard.provider.getCreate')}}"><button type="button" class="btn btn-primary mb-3 mt-2">Thêm nhà cung cấp</button></a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Tên nhà cung cấp</th>
                <th>giá nhà cung cấp</th>
            </tr>
        </thead>
        <tbody>
            
            @if($providers)
                @foreach($providers as $provider)
                    <tr>
                        <td>{{ $provider->title }}</td>
                        <td>
                            <a class="mr-4" href="">Edit</a>
                            <a href="">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
@if(session('success'))
    @section('script')
        <script type="text/javascript">
            toastr["success"]("{{ session('success') }}");
        </script>
    @endsection
@endif
