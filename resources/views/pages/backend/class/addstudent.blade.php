@extends('layout.backend.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="form-inline">
                        <div class="form-group">
                        </div>
                    </form>
                </div>
                <h4 class="page-title">HỌC SINH</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{route('class.addstudent',['course_id'=>$course->id,'id'=>$class->id])}}" method="POST">
                @csrf
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="check_all" onclick='selects()'></th>
                        <th>STT</th>
                        <th>TÊN</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                        
                    @endphp
                    @foreach ($student as $value)
                        <tr>
                            <td style="text-align:center;">
                                <input type="checkbox" name="ids[{{ $value->id }}]" value="{{ $value->id }}" class="checkBoxClass">
                                  
                                </td>
                            <td>{{ $count }}</td>
                            <td>{{ $value->name }}</td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
            <input type="submit" value="Thêm học sinh">
        </form>
    </div>
</div>
    @push('js')
        <script>
            function selects() {
                var checkboxes = document.getElementsByClassName('checkBoxClass');
                var check_all = document.getElementById('check_all');
                if (check_all.checked) {
                    for (var i = 0; i < checkboxes.length; i++) {
                        checkboxes[i].checked = true;
                    }
                } else {
                    for (var i = 0; i < checkboxes.length; i++) {
                        checkboxes[i].checked = false;
                    }
                }
            }
        </script>
        
    @endpush
    

    @endsection
