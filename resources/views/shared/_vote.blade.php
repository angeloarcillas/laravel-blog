@if ($model instanceOf App\Question)
    @php
        $name = 'question';
        $firstURISegment = 'questions';
    @endphp

@elseif ($model instanceOf App\Answer)
    @php
        $name = 'answer';
        $firstURISegment = 'answers';
    @endphp
@endif

@php
    $formId = $name . "-" . $model->id;
    $formAction = "/{$firstURISegment}/{$model->id}/vote";
@endphp

<div class="d-flex flex-column vote-controls">
    <a href="#" title="This {{ $name }} if useful" class="vote-up 
    {{ Auth::guest() ? 'off' : '' }}"
        onclick="event.preventDefault();document.querySelector('#up-vote-{{ $formId }}').submit();">^</a>
    <form id="up-vote-{{ $formId }}" action="{{ $formAction }}" method="POST" class="d-none">
        @csrf
        <input type="hidden" name="vote" value="1">
    </form>

    <span class="votes-count">{{$model->votes_count}}</span>
    
    <a href="#" title="This {{ $name }} if not useful" class="vote-down 
    {{ Auth::guest() ? 'off' : '' }}"
        onclick="event.preventDefault();document.querySelector('#down-vote-{{ $formId }}').submit();">v</a>
    <form id="down-vote-{{ $formId }}" action="{{ $formAction }}" method="POST" class="d-none">
        @csrf
        <input type="hidden" name="vote" value="-1">
    </form>

    @if ($model instanceOf App\Question)
        @include('shared._favorite',[
        'model' => $model
        ])

    @elseif ($model instanceOf App\Answer)
        @include('shared._accept',[
        'model' => $model
        ])
    @endif
</div>