@extends('layout.backend.index')

@section('content')
    <!-- Bootstrap Boilerplate... -->
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>{{ $quiz->quiz }}</h1>
                <form method="post" action="{{ url('quizzes/{quiz}') }}">
                    <input name="invisible" type="hidden" value="{{ $quiz->id }}">
                    {{ csrf_field() }}
                    <?php $i = 1; ?>
                    @foreach ($questions as $item1)
                        <fieldset class="form-group row">
                            <legend>{{ $item1->question }}</legend>
                            <?php $j = 1; ?>
                            <div class="form-check">
                                @foreach ($answers as $item2)
                                    <div class="row">
                                        <label class="form-check-label col-md-6" for="{{ $item1->id }}">
                                            {{ $item2->answer }} </label>
                                        <input type="radio" class="form-check-input col-md-6" name="{{ $item1->id }}"
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
