<?php
namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function authenticate()
    {
        $session = session();
        $userModel = new \App\Models\UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user && !empty($user['password']) && password_verify($password, $user['password'])) {
            $session->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'isLoggedIn' => true
            ]);

            return redirect()->to(base_url('tasks'));
        }

        return redirect()->back()->with('error', 'Invalid username or password.');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(base_url('login'));
    }
}
