@extends('template.layout')
@section('content')
    {{ $title }}
    {{ $name }}
    <table class="table">
        @foreach ($listStudent as $std)
            <tr>
                <td>{{ $std->id }}</td>
                <td><img src="{{$std->image? Storage::url($std->image): ''}}" alt="" style="width: 150px"></td>
                <td>{{ $std->name }}</td>
                <td>{{ $std->email }}</td>
                <td>{{ $std->address }}</td>
                @if ( $std->status == 1)
                    <td>Present</td>
                @else
                    <td>Absent</td>
                @endif
                <td><a href="{{route('editStudent',['id'=>$std->id])}}">Sửa</a></td>
                <td><a href="{{route('deleteStudent',['id'=>$std->id])}}">Xóa</a></td>
            </tr>
        @endforeach
    </table>
    <form action="{{ route('searchStudent') }}" method="POST">
        @csrf
        <input type="text" name="searchStudent">
        <input type="submit" value="Search" name="btnSubmit">
    </form>
@endsection