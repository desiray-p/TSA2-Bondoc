<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $customerModel = new \App\Models\CustomerModel();

        $customers = $customerModel->findAll();

        return view('customers', ['customers' => $customers]);
    }

    public function newCustomer()
    {
        return view('customer_new');
    }

    public function create()
    {
        $customerModel = new \App\Models\CustomerModel();

        if (!$this->validate([
            'full_name' => 'required',
            'email' => 'required|valid_email'
        ])) {
            return redirect()->back()->withInput();
        }

        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone')
        ];

        $customerModel->insert($data);

        return redirect()->to(base_url('customers'));
    }

    public function edit($id)
    {
        $customerModel = new \App\Models\CustomerModel();

        $customer = $customerModel->find($id);

        return view('customer_edit', ['customer' => $customer]);
    }

    public function update($id)
{
    $customerModel = new \App\Models\CustomerModel();

    if (!$this->validate([
        'full_name' => 'required',
        'email' => 'required|valid_email'
    ])) {
        return redirect()->back()->withInput();
    }

    $data = [
        'full_name' => $this->request->getPost('full_name'),
        'email' => $this->request->getPost('email'),
        'phone' => $this->request->getPost('phone')
    ];

    $customerModel->update($id, $data);

    return redirect()->to(base_url('customers'));
}

}