<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function getTask(Request $request)
     {
         $perPage = $request->input('length', 10);
         $page = $request->input('page', 1);
         $search = $request->input('search');
         $status = $request->input('status');
     
         $query = Task::query();
     
         // Check if the authenticated user has role_id == 1 (admin)
         if (Auth::check() && Auth::user()->role_id == 1) {
             // Admin can see all tasks
             if ($search) {
                 $query->where('title', 'like', '%' . $search . '%');
             }
             if ($status) {
                 $query->where('status', '=', $status);
             }
         } else {
             // Non-admin users can only see tasks they created (role_id == 2)
             $query->where('created_by', Auth::id());
     
             if ($search) {
                 $query->where('title', 'like', '%' . $search . '%');
             }
             if ($status) {
                 $query->where('status', '=', $status);
             }
         }
     
         $total = $query->count();
         $tasks = $query->offset(($page - 1) * $perPage)
             ->limit($perPage)
             ->get();
     
         return response()->json([
             'data' => $tasks,
             'recordsTotal' => $total,
             'recordsFiltered' => $total,
         ]);
     }


    public function getTodo(Request $request){

        $tasks = Task::where('status','=', 1)->get();
        return count($tasks);

    }

    public function viewTask(Request $request, $id)
    {

       
        $task = Task::where('id',$id)->first();

        if (!$task) {
            abort(404, 'Task not found');
        }

        $attachments = Attachment::where('task_id','=', $task->id)->get();

        return view('view_task', ['task' => $task,'attachments' => $attachments]);
    }
     
     

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $request->validate([
            'title' => 'required|string|max:100',
            'content' => 'required|string',
            'status' => 'required|in:1,2,3',
            'images.*' => 'image|max:4096', // max 4MB per image
        ]);
       
        // Determine if the task is published or saved as draft
        $isPublished = $request->input('action') === 'publish' ? 1 : 0;

        // Create the task
        $task = Task::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'status' => $request->input('status'),
            'is_published' => $isPublished,
            'created_by' => Auth::id(),
        ]);

        // Handle attachments
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('attachments', 'public');

                Attachment::create([
                    'task_id' => $task->id,
                    'path' => $path,
                    'created_by' => Auth::id(),
                ]);
            }
        }

        return response()->json(['message' => 'Task created successfully', 'task' => $task], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
