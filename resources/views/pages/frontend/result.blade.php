@extends('layout.frontend.index')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1>Kết quả của bạn</h1>
            <h3>Bạn trả lời đúng {{ $correct_answers_count }} trên {{ $question_count }} câu hỏi</h3>
            <h3>Bạn được {{ $point }} điểm</h3>

            <?php $i = 1; ?>
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th>CÂU HỎI</th>
                        <th>ĐÁP ÁN</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $datum)
                    
                        @if ($key != '_token' && $key != 'invisible')
                            <tr>
                                <td>Câu {{ $i}}: {{App\models\Question::find($key)->question }}</td>
                                <td>
                                    <p>{{ App\models\Answer::find($datum)->answer }}</p>
                                    <?php $i++; ?>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            {{-- @foreach ($data as $key => $datum)
                @if ($key != '_token' && $key != 'invisible')
                    <p>Your guess for question {{ $i }} was {{ App\models\Answer::find($datum)->answer }}</p>
                    <?php $i++; ?>
                @endif
            @endforeach --}}
            <div class="row">
            </div>
        </div>
    </div>
@endsection
