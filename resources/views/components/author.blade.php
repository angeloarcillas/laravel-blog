<div class="flex justify-end items-end">
  <div class="border border-teal-400 p-6 mr-2">
  </div>
  <div class="text-xs text-gray-700">
    <p>{{$label .' '.$model->created_at->diffForHumans()}}
      <a class="block mt-1 text-blue-400"
        href="#">{{$model->user->name}}</a>
  </div>
</div>