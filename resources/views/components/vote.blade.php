<a href="#"
  onclick="event.preventDefault();
  document.querySelector('#upVote-{{$model->id}}').submit()">
  <svg viewBox="0 0 20 20" class="w-12 mx-auto">
    <g id="Page-1" stroke="none" stroke-width="1"
      fill="none" fill-rule="evenodd">
      <g class="fill-current">
        <polygon
          points="10.7071068 7.05025253 10 6.34314575 4.34314575 12 5.75735931 13.4142136 10 9.17157288 14.2426407 13.4142136 15.6568542 12">
        </polygon>
      </g>
    </g>
  </svg>
</a>
<p class="-my-2 text-center">
  {{$model->votes_count}}</p>
<div>
  <svg viewBox="0 0 20 20" class="w-12 mx-auto">
    <g id="Page-1" stroke="none" stroke-width="1"
      fill="none" fill-rule="evenodd">
      <g class="fill-current">
        <polygon id="Combined-Shape"
          points="9.29289322 12.9497475 10 13.6568542 15.6568542 8 14.2426407 6.58578644 10 10.8284271 5.75735931 6.58578644 4.34314575 8">
        </polygon>
      </g>
    </g>
  </svg>
</div>


<form id="upVote-{{$model->id}}"
  action="{{ $model->path('vote') }}">
  @csrf
  <input type="hidden" name="vote" value="true">
</form>

<form id="downVote-{{$model->id}}"
  action="{{ $model->path('vote') }}">
  @csrf
  <input type="hidden" name="vote" value="false">
</form>
