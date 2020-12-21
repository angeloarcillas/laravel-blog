<p class="text-center text-gray-700">
  <svg viewBox="0 0 20 20" class="w-6 mx-auto">
    <g id="Page-1" stroke="none" stroke-width="1"
      fill="none" fill-rule="evenodd">
      <g class="fill-current">
        <polygon id="Star-3"
          points="10 15 4.12214748 18.0901699 5.24471742 11.545085 0.489434837 6.90983006 7.06107374 5.95491503 10 0 12.9389263 5.95491503 19.5105652 6.90983006 14.7552826 11.545085 15.8778525 18.0901699">
        </polygon>
      </g>
    </g>
  </svg>
  {{$model->best_answer_id ?? 0}}
</p>

@if ($model->user->id === auth()->user()->id &&
$model == instaceof App\Models\Answer)

<form id="best-{{$model->id}}"
  action="{{ $model->path('best')}}">
  @csrf
  <input type="hidden" name="vote" value="true">
</form>
@endif