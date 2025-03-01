@extends('app')

@section('contents')
    <section>
        <div style="display: flex; justify-content: center;">
            <div class="col-md-6">
                <div class="card mt-5 mb-5">
                    <div class="card-body">
                        <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="file" class="form-label">File</label>
                                <input type="file" class="form-control" id="file" name="file">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                @foreach ($files as $file)
                    <div class="card mt-5 mb-5">
                        <div class="card-body">
                            <img src="storage/{{ $file->file_path }}" style="width: 100px;" alt="file">
                        </div>
                    </div>
                @endforeach
                <div class="card mt-5 mb-5">
                    <div class="card-body">
                        <a href="{{ route('file.download') }}">Download File</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
