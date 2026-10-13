<x-app-layout>
    <div class="max-w-2xl mx-auto mt-10">
        <h1 class="text-xl font-bold mb-2">{{ $resume->original_filename }}</h1>
        <pre class="whitespace-pre-wrap bg-gray-100 p-4 rounded text-sm">{{ $resume->parsed_text }}</pre>
    </div>
</x-app-layout>
