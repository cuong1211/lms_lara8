@extends('layout.frontend.index')

@section('content')
    <!-- Bootstrap Boilerplate... -->
    <div class="container" >
        <div class="row">
            <div class="col-md-12 col-md-offset-3">
                <h2>{{ $quiz->quiz }}</h2>
                <form method="post" action="{{route('frontend.result',['user_id'=>$user_id,'class_id'=>$class_id,'course_id'=>$course_id,'unit_id'=>$unit_id,'id'=>$quiz->id])}}">
                    {{-- <input name="invisible" type="hidden" value="{{ $quiz->id }}"> --}}
                    @csrf
                    <?php $i = 1; ?>
                    @foreach ($questions as $item1)
                        <fieldset class="form-group row">
                            <legend><strong>Câu {{$i}}</strong>: {{ $item1->question }}</legend>
                            <?php $j = 1; ?>
                            <div class="form-check">
                                @foreach ($item1->answers as $item2)
                                    <div class="row">
                                        <label class="form-check-label col-md-6" for="{{ $item2->id }}">
                                            <span>{{ $item2->answer }}</span> </label>
                                        <input type="radio" id={{ $item2->id}} class="form-check-input " name="{{ $item1->id }}"
                                            value="{{ $item2->id }}" {{ $j == 1 ? 'checked' : '' }}>
                                        <?php $j++; ?>
                                    </div> 
                                @endforeach
                            </div>
                        </fieldset>
                        <?php $i++; ?>
                    @endforeach
                    <button type="submit" class="btn btn-primary mt-5">Submit Answers</button>
                </form>
            </div>
        </div>
    
    </div>
@endsection
