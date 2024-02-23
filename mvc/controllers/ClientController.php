<?php

namespace App\Controllers;

use App\Models\Course;
use App\Providers\View;
use App\Providers\Validator;


class ClientController
{

    public function index()
    {
        echo "index";
        $course = new Course;
        $select = $course->select();
        //print_r($select);
        //include('views/course/index.php');
        if ($select) {
            return View::render('course/index', ['clients' => $select]);
        } else {
            return View::render('error');
        }
    }

    public function show($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $course = new Course;
            $selectId = $course->selectId($data['id']);
            if ($selectId) {
                return View::render('course/show', ['course' => $selectId]);
            } else {
                return View::render('error');
            }
        } else {
            return View::render('error', ['message' => 'Could not find this data']);
        }
    }

    public function create()
    {
        return View::render('course/create');
    }

    public function store($data)
    {

        $validator = new Validator;
        $validator->field('name', $data['name'], 'Le nom')->min(2)->max(25);
        $validator->field('address', $data['address'])->max(45);


        if ($validator->isSuccess()) {
            $course = new Course;
            $insert = $course->insert($data);
            if ($insert) {
                return View::redirect('course');
            } else {
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            //print_r($errors);
            return View::render('course/create', ['errors' => $errors, 'course' => $data]);
        }
    }

    public function edit($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $course = new Course;
            $selectId = $course->selectId($data['id']);
            if ($selectId) {
                return View::render('course/edit', ['course' => $selectId]);
            } else {
                return View::render('error');
            }
        } else {
            return View::render('error', ['message' => 'Could not find this data']);
        }
    }
    public function update($data, $get)
    {
        // echo $get['id'];

        $validator = new Validator;
        $validator->field('name', $data['name'], 'Le nom')->min(2)->max(25);
        $validator->field('address', $data['address'])->max(45);
        $validator->field('zip_code', $data['zip_code'], 'Zip Code')->max(10);
        $validator->field('phone', $data['phone'])->max(20);
        $validator->field('email', $data['email'])->required()->email()->max(45);

        if ($validator->isSuccess()) {
            $course = new Course;
            $update = $course->update($data, $get['id']);
            if ($update) {
                return View::redirect('course');
            } else {
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            //print_r($errors);
            return View::render('course/edit', ['errors' => $errors, 'course' => $data]);
        }
    }

    public function delete($data)
    {
        $course = new  Course;
        $delete = $course->delete($data['id']);
        if ($delete) {
            return View::redirect('course');
        } else {
            return View::render('error');
        }
    }
}
