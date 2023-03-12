@extends('front.layout.index')
@section('content')
<div class="fui-row-full">
        <div >
            @include('front.layout.header')
            @foreach($providers as $provider)
            <h1>{{ $provider->id}}</h1>
                <p>{{ $provider->title}}</p>
                <p>{{ $provider->price}}</p>
                <p>{{ $provider->adress}}</p>
                <p>{{ $provider->city}}</p>
            @endforeach

        </div>
</div>
<script type="text/javascript">
    
</script>
@endsection
