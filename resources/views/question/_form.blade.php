@csrf
<div class="form-group">
    <label for="question-title">Question Title</label>
                                            {{-- set old value or existing value --}}
    <input type="text" name="title" value="{{ old('title',$question->title) }}" id="question-title"
        class="form-control @error('title') is-invalid @enderror">
    @error('title')
    <div class="invalid-feedback"><strong>{{ $message }}</strong> </div>
    @enderror
</div>

<div class="form-group">
    <label for="question-body"></label>
    <textarea name="body" rows="10" id="question-body"
        class="form-control  @error('body') is-invalid @enderror">{{ old('body',$question->body) }}</textarea>
    @error('body')
    <div class="invalid-feedback"><strong>{{ $message }}</strong> </div>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $btnText }}</button>
</div>