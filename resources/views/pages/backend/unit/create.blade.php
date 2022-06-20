@extends('layout.backend.index')
@section('content')
<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
       <div class="iq-header-title">
          <h4 class="card-title">Create unit</h4>
       </div>
    </div>
    <div class="iq-card-body">
       <form class="form-horizontal" action="{{url('/admin/course').'/'.$course->id.'/createunit'}}" method="POST">
         @csrf
          <div class="form-group row">
             <label class="control-label col-sm-2 align-self-center mb-0" for="email">Tên bài:</label>
             <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="email" placeholder="Enter name">
             </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-sm-2 align-self-center mb-0" for="email">Mô tả:</label>
            <div class="col-sm-10">
               <input type="text" name="description" class="form-control" id="email" placeholder="Enter name">
            </div>
         </div>
        <div class="form-group col-sm-6">
            <label for="uname">Slide:</label>
            <select class="form-control" name="slide_id" id="email">
                @foreach ($slide as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach
            </select>
        </div>
          {{-- <div class="form-group">
            <label for="exampleInputdatetime">Thời gian bắt đầu</label>
            <input type="datetime-local" name="start_time" class="form-control" id="exampleInputdatetime" >
         </div> --}}
        <div class="form-group col-sm-6">
            <label for="uname">Bai tap:</label>
            <select class="form-control" name="quizzes_id" id="email">
                @foreach ($quiz as $item)
                    <option value="{{ $item->id }}">{{ $item->quiz }}</option>
                @endforeach
            </select>
        </div>
        
          <div class="form-group">
             <button type="submit" class="btn btn-primary">Submit</button>
             <button type="submit" class="btn iq-bg-danger">Cancel</button>
          </div>
       </form>
    </div>
 </div>
 @endsection
