<div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                       <h3>Your answer</h3>
                    </div>
                    <hr>
                <form action="{{ route('questions.answers.store',$question->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="body" rows="7" id="" class="form-control @error('body') is-invalid @enderror"></textarea>
                            @error('body')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong> </div>
                        @enderror

                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary px-5 float-right" >Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>