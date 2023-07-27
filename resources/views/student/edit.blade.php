@extends('template.layout')
@section('content')
<h1>{{ $title }} </h1>
<form action="{{ route('editStudent', ['id'=>request()->route('id')]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label class="col-md-3 col-sm-4 control-label">Ảnh</label>
      <div class="col-md-9 col-sm-8">
          <div class="row">
              <div class="col-xs-6">
                  <img id="anh_the_preview" src="{{ $student->image? Storage::url($student->image): 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}" alt="your image"
                       style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                  <input type="file" name="image" accept="image/*"
                         class="form-control-file @error('image') is-invalid @enderror" id="cmt_anh">
                  <br/>
              </div>
          </div>
      </div>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tên</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$student->name}}">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$student->email}}">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Địa chỉ</label>
      <input type="text" name="address" class="form-control" id="exampleInputPassword1" value="{{$student->address}}">
    </div>
    <div class="form-check">
        <input class="form-check-input" value="1" type="radio" name="status" id="flexRadioDefault1" {{$student->status == 1 ? 'checked': ''}}>
        <label class="form-check-label" for="flexRadioDefault1">
          Có mặt
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" value="2" type="radio" name="status" id="flexRadioDefault2" {{$student->status == 2 ? 'checked': ''}}>
        <label class="form-check-label" for="flexRadioDefault2">
          Vắng mặt
        </label>
      </div>
      <br>
    <button type="submit" class="btn btn-primary">Sửa</button>
  </form>
@endsection