<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{ $answersCount ." ". \Str::plural('Answer',$answersCount) }}</h2>
                    <hr>
                    @include('layouts._messages')

                    @forelse ($answers as $answer)
                    <div class="media">
                        @include('shared._vote',[
                        'model' => $answer
                        ])
                        <div class="media-body">
                            {{ $answer->body }}
                            <div class="row">
                                <div class="col-4">
                                    <div class="ml-auto">

                                        @can ('update', $answer)
                                        <a href="{{ route('questions.answers.edit',[$question->id,$answer->id]) }}"
                                            class="btn btn-sm btn-outline-info">Edit</a>
                                        @endcan

                                        @can ('delete', $answer)
                                        <form class="d-inline"
                                            action="{{ route('questions.answers.destroy',[$question->id,$answer->id]) }}"
                                            method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" name="button" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                        @endcan

                                    </div>
                                </div>
                                <div class="col-4"></div>

                                <div class="col-4">
                                    @include('shared._author',[
                                    'model' => $answer,
                                    'label' => 'answered'
                                    ])
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>
                    @empty
                    <p>There are currently no answer</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>