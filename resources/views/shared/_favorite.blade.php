<a href="#" title="Mark as favorite" class="favorite 
    {{ Auth::guest() ? 'off' : ($model->is_favorited ? 'favorited' : '') }}"
    onclick="event.preventDefault();document.querySelector('#favorite-question-{{$model->id}}').submit();">*
    <span class="favorites-count">{{$model->favorites_count}}</span>
</a>

<form action="/questions/{{$model->id}}/favorites" method="POST" 
    id="favorite-question-{{$model->id}}" class="d-none">
    @csrf
</form>