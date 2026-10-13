<?php
namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class Tasks extends BaseController
{
    public function welcome()
    {
        $taskModel = new TaskModel();
        $today = date('Y-m-d');

        $tasks = $taskModel
            ->where('task_date', $today)
            ->where('is_archived', 0)
            ->findAll();

        return view('welcome', ['tasks' => $tasks]);
    }

    public function index()
    {
        $taskModel = new TaskModel();

        $tasks = $taskModel
            ->where('is_archived', 0)
            ->orderBy('task_date', 'ASC')
            ->findAll();

        return view('tasks', ['tasks' => $tasks]);
    }

    public function profile()
    {
        $userModel = new UserModel();
        $user = $userModel->first();

        return view('profile', ['user' => $user]);
    }

    public function new()
    {
        return view('tasks/new');
    }

    public function create()
    {
        $rules = [
            'title' => 'required',
            'task_date' => 'required|valid_date[Y-m-d]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $taskModel->insert([
            'title' => $this->request->getPost('title'),
            'status' => $this->request->getPost('status') ?: 'pending',
            'task_date' => $this->request->getPost('task_date'),
            'is_archived' => 0
        ]);

        return redirect()->to(base_url('tasks'))
            ->with('success', 'Task added successfully.');
    }

    public function edit($id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->where('is_archived', 0)->find($id);

        if (!$task) {
            return redirect()->to(base_url('tasks'))
                ->with('error', 'Task not found.');
        }

        return view('tasks/edit', ['task' => $task]);
    }

    public function update($id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->where('is_archived', 0)->find($id);

        if (!$task) {
            return redirect()->to(base_url('tasks'))
                ->with('error', 'Task not found.');
        }

        $rules = [
            'title' => 'required',
            'task_date' => 'required|valid_date[Y-m-d]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel->update($id, [
            'title' => $this->request->getPost('title'),
            'status' => $this->request->getPost('status') ?: 'pending',
            'task_date' => $this->request->getPost('task_date')
        ]);

        return redirect()->to(base_url('tasks'))
            ->with('success', 'Task updated successfully.');
    }

    public function delete($id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->find($id);

        if (!$task || $task['is_archived']) {
            return redirect()->to(base_url('tasks'))
                ->with('error', 'Task not found.');
        }

        $taskModel->update($id, ['is_archived' => 1]);

        return redirect()->to(base_url('tasks'))
            ->with('success', 'Task archived successfully.');
    }
}
