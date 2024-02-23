<?php

namespace App\Controllers;

use App\Models\Course;
use App\Providers\View;
use App\Providers\Validator;


class CourseController
{

    public function index()
    {

        $course = new Course;
        $select = $course->select();
        //print_r($select);
        //include('views/course/index.php');
        if ($select) {
            return View::render('course/index', ['courses' => $select]);
        } else {
            return View::render('error');
        }
    }

    public function show($data = [])
    {
        // echo "show";
        if (isset($data['id']) && $data['id'] != null) {
            $course = new Course;
            $selectId = $course->selectId($data['id']);
            if ($selectId) {
                return View::render('course/show', ['courses' => $selectId]);
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
        $validator->field('name', $data['name'], 'Le nom')->min(2)->max(60);
        $validator->field('description', $data['description'])->max(245);

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
            return View::render('course/create', ['errors' => $errors, 'courses' => $data]);
        }
    }

    public function edit($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            $course = new Course;
            $selectId = $course->selectId($data['id']);
            if ($selectId) {
                return View::render('course/edit', ['courses' => $selectId]);
            } else {
                return View::render('error');
            }
        } else {
            return View::render('error', ['message' => 'Could not find this data']);
        }
    }
    public function update($data, $get)
    {

        $validator = new Validator;
        $validator->field('name', $data['name'], 'Le nom')->required()->min(2)->max(60);
        $validator->field('description', $data['description'])->required()->max(245);

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
            return View::render('course/edit', ['errors' => $errors, 'courses' => $data]);
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
