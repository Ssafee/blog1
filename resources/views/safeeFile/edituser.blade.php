@extends('templates.app')
@section('content')
    
<form action="{{route('updateuser')}}" method="post">
    @csrf

    <input type="text" name="name" value="{{$data->name}}" placeholder="name">
    <input type="text" name="lname" value="{{$data->lname}}" placeholder="Last Name">
   
    <select name="city" >
        @foreach ($city as $item)
            <option value="{{$item->id}}"
                {{ ($item->id == $data->city)  ? 'selected' : '' }}
 
            
            >{{$item->name}}</option>
        @endforeach
    </select>
    <input type="hidden" name="id" value="{{$data->id}}" >
    <input type="submit" value="update">
</form>
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