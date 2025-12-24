<x-app-layout>
    <div class="main_content">
        <div class="search_area">
            <input type="text" placeholder="Search...">
            <i class="far fa-search"></i>
        </div>

        <div class="row">
            <x-note.note-card :notes="$notes" />
        </div>
    </div>
</x-app-layout>