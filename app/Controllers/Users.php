<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new \App\Models\UserModel();

        $users = $userModel->findAll();

        return view('users', ['users' => $users]);
    }

    public function newUser()
    {
        return view('user_new');
    }

    public function create()
    {
        $userModel = new \App\Models\UserModel();

        if (!$this->validate([
            'username' => 'required|is_unique[users.username]',
            'full_name' => 'required'
        ])) {
            return redirect()->back()->withInput();
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'email' => $this->request->getPost('email')
        ];

        $userModel->insert($data);

        return redirect()->to(base_url('users'));
    }

    public function edit($id)
    {
        $userModel = new \App\Models\UserModel();

        $user = $userModel->find($id);

        return view('user_edit', ['user' => $user]);
    }

    public function update($id)
    {
        $userModel = new \App\Models\UserModel();

        if (!$this->validate([
            'username' => 'required',
            'full_name' => 'required'
        ])) {
            return redirect()->back()->withInput();
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'email' => $this->request->getPost('email')
        ];

        $avatar = $this->request->getFile('avatar');

        if ($avatar && $avatar->isValid() && !$avatar->hasMoved()) {

            if (!in_array($avatar->getExtension(), ['jpg', 'jpeg', 'png'])) {
                return redirect()->back()->withInput();
            }

            if ($avatar->getSize() > 2 * 1024 * 1024) {
                return redirect()->back()->withInput();
            }

            $newName = $avatar->getRandomName();

            $avatar->move(ROOTPATH . 'public/uploads/avatars', $newName);

            $image = service('image')
                ->withFile(ROOTPATH . 'public/uploads/avatars/' . $newName)
                ->fit(300, 300)
                ->save(ROOTPATH . 'public/uploads/avatars/' . $newName);

            $data['avatar'] = $newName;
        }

        $userModel->update($id, $data);

        return redirect()->to(base_url('users'));
    }
}