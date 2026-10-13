<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Services\ResumeParser;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function index()
    {
        $resumes = auth()->user()->resumes()->latest()->get();
        return view('resumes.index', compact('resumes'));
    }

    public function create()
    {
        return view('resumes.create');
    }

    public function store(Request $request, ResumeParser $parser)
    {
        $request->validate([
            'resume' => 'required|file|mimes:pdf,docx|max:5120', // 5MB max
        ]);

        $file = $request->file('resume');
        $path = $file->store('resumes', 'public');

        $text = $parser->extractText($file);

        $resume = auth()->user()->resumes()->create([
            'original_filename' => $file->getClientOriginalName(),
            'file_path' => $path,
            'parsed_text' => $text,
        ]);

        return redirect()->route('resumes.show', $resume)
            ->with('success', 'Resume uploaded and parsed successfully.');
    }

    public function show(Resume $resume)
    {
        $this->authorize('view', $resume); // we'll add this policy next
        return view('resumes.show', compact('resume'));
    }
}
