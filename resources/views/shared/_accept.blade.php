@can('accept', $model)
    <a href="#" title="Mark as best answer" class="{{ $model->status }}"
        onclick="event.preventDefault();document.querySelector('#accept-answer-{{$model->id}}').submit();">/</a>
   
    <form action="{{route('answers.accept',$model->id)}}" method="POST" 
        id="accept-answer-{{$model->id}}" class="d-none">
        @csrf
    </form>

    @else
        @if ($model->is_best)
            <a href="#" title="Best answer" class="{{ $model->status }}">/</a>
        @endif
@endcan