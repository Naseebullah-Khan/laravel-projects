<x-layout>
    <x-slot:heading>
        Edit Job: {{ $job->title }}
    </x-slot:heading>
    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-label for="title">Title</x-label>
                        <div class="mt-2">
                            <x-input value="{{ $job->title }}" type="text" name="title" id="title"
                                placeholder="Software Engineer" />
                            <x-error error="title" />
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <x-label for="salary">Salary</x-label>
                        <div class="mt-2">
                            <x-input value="{{ $job->salary }}" type="text" name="salary" id="salary"
                                placeholder="50,000 AFG per year" />
                            <x-error error="salary" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div class="flex items-center">
                <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>
            </div>

            <div class="flex items-center gap-x-6">
                <a href="/jobs/{{ $job->id }}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                <div>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                </div>
            </div>
        </div>
    </form>

    <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
