@extends('templates.app')
@section('content')
<table>

    <thead>
        <tr>
            <th>Name</th>
            <th>Last Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>
              {{$item->name}}  
            </td>
            <td>
                {{$item->lname}}  
              </td>
              <td>
                {{$item->cname}}  
              </td>
              <td>
                  <a href="{{route('edituser',$item->id)}}  ">edit</a>
              </td>
        </tr>
            
        @endforeach
        <tr></tr>
    </tbody>
</table>
    
@endsection