<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        // Mengambil semua data project dari database
        $projects = Project::latest()->get();
        return view('profile.index', compact('projects'));
    }
}