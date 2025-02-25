@extends('app')

@section('contents')
    <section>
        <div style="display: flex; justify-content: center;">
            <div class="col-md-6">

                @if ($errors->all())
                    <div class="mt-4">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="card mt-5 mb-5">
                    <div class="card-body">
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                                {{-- @error('name')
                                    <p class="mt-2 text-danger">{{ $message }}</p>
                                @enderror --}}
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                                {{-- @error('email')
                                    <p class="mt-2 text-danger">{{ $message }}</p>
                                @enderror --}}
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject">
                                {{-- @error('subject')
                                    <p class="mt-2 text-danger">{{ $message }}</p>
                                @enderror --}}
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea id="message" name="message" class="form-control"></textarea>
                                {{-- @error('message')
                                    <p class="mt-2 text-danger">{{ $message }}</p>
                                @enderror --}}
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
