<x-app-layout>
    <div class="max-w-xl mx-auto mt-10">
        <h1 class="text-xl font-bold mb-4">Upload your resume</h1>

        @if ($errors->any())
            <div class="text-red-600 mb-4">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('resumes.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="file" name="resume" accept=".pdf,.docx" required class="mb-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                Upload
            </button>
        </form>
    </div>
</x-app-layout>
