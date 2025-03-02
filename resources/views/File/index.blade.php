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
                                @error('file')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                @foreach ($files as $file)
                    <div class="card mt-5 mb-5">
                        <div class="card-body">
                            {{-- this is not recommended --}}
                            {{-- <img src="uploads/{{ $file->file_path }}" style="width: 100px;" alt="file"> --}}
                            {{-- if you store the only file name then use this approach --}}
                            {{-- <img style="width:655px;" src="{{ asset('uploads') . '/' . $file->file_path }}" alt="image"> --}}
                            {{-- if you store the path to the file then use this approach --}}
                            <img style="width:655px;" src="{{ asset($file->file_path) }}" alt="image">
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
