@extends('templates.app')

@section('content')

<form action="{{route('submit')}}" method="post">
    @csrf

    <input type="text" name="name" placeholder="name">
    <input type="text" name="lname" placeholder="Last Name">
    <select name="city" >
        @foreach ($data as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    <input type="submit" value="submit">

</form>
{{-- @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
@error('lname')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
     --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@endsection