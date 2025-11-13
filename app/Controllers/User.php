<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        return view('users/list', $data);
    }

    public function create()
    {
        helper('form'); //Load form helper for set_value() and csrf_field()
        echo view('users/create'); // load the form view
    }

    public function store()
    {
        helper(['form', 'url']);

        $validation = \Config\Services::validation();
        $validation->setRules([
            'name'   => 'required|min_length[3]',
            'email'  => 'required|valid_email|is_unique[users.email]',
            'mobile' => 'required|integer|max_length[10]',
            'gender' => 'required',
            'state'  => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('users/create', ['validation' => $validation]);
        }

        $userModel = new UserModel();
        $userModel->save([
            'name'   => esc($this->request->getPost('name')),
            'email'  => esc($this->request->getPost('email')),
            'mobile' => esc($this->request->getPost('mobile')),
            'gender' => esc($this->request->getPost('gender')),
            'state'  => esc($this->request->getPost('state'))
        ]);

        return redirect()->to('/user')->with('success', 'User added successfully');
    }

    public function edit($id)
    {
        helper('form');

        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);

        return view('users/edit', $data);
    }

    public function update($id)
    {
        helper(['form', 'url']);

        $validation = \Config\Services::validation();
        $validation->setRules([
            'name'   => 'required|min_length[3]',
            'email'  => 'required|valid_email',
            'mobile' => 'required|integer|max_length[10]',
            'gender' => 'required',
            'state'  => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            $userModel = new UserModel();
            $data['user'] = $userModel->find($id);
            $data['validation'] = $validation;
            return view('users/edit', $data); 
        }

        $userModel = new UserModel();
        $userModel->update($id, [
            'name'   => esc($this->request->getPost('name')),
            'email'  => esc($this->request->getPost('email')),
            'mobile' => esc($this->request->getPost('mobile')),
            'gender' => esc($this->request->getPost('gender')),
            'state'  => esc($this->request->getPost('state')),
        ]);

        return redirect()->to('/user')->with('success', 'User updated successfully');
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);

        return redirect()->to('/user')->with('success', 'User deleted successfully');
    }   
}
