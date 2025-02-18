<x-layout>
    <x-page-heading>New Job</x-page-heading>
    <x-forms.form action="/jobs" method="POST">
        <x-forms.input label="Title" name="title" placeholder="Software Engineer" />
        <x-forms.input label="Salary" name="salary" placeholder="50,000 AFG" />
        <x-forms.input label="Location" name="location" placeholder="Kabul, Afghanistan" />

        <x-forms.select label="Schedule" name="schedule">
            <option value="Part-Time">Part-Time</option>
            <option value="Full-Time">Full-Time</option>
        </x-forms.select>

        <x-forms.input label="URL" name="url" placeholder="https://acme.com/jobs/SE-wanted" />
        <x-forms.checkbox label="Featured 'Costs Extra'" name="featured" />

        <x-forms.divider />

        <x-forms.input label="Tags 'comma separated'" name="tags" placeholder="Frontend, Backend, Full-Stack" />

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>
