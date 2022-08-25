<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\Task;
use App\Http\Requests\CreateTask;



class TaskController extends Controller
{
    public function index(int $id){
        $folders = Folder::all();//Models/Folderのデータを全て取得
        $current_folder = Folder::find($id);
        $tasks = $current_folder->tasks()->get();//第一引数がカラム名、台に引数が比較する値、get()で値を取得
        //15行目の非簡略化版 = Task::where('folder_id', $current_folder->id)->get();

        return view('tasks/index',[
            'folders' => $folders,
            'current_folder_id' => $current_folder->id,
            'tasks' => $tasks,
        ]);//第一引数がファイル名、第二引数は渡すデータ
    }

    public function showCreateForm(int $id)
    {
        return view('tasks/create',[
            'folder_id' => $id
        ]);
    }

    public function create(int $id, CreateTask $request)
    {
        $current_folder = Folder::find($id);

        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        $current_folder->tasks()->save($task);

        return redirect()->route('tasks.index',[
            'id' => $current_folder->id,
        ]);
    }
}
