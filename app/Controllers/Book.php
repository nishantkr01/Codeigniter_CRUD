<?php
namespace App\Controllers;

use App\Models\BookModel;

class Book extends BaseController{
    public function index(){
        $session = \Config\Services::session();
        $data['session'] = $session;

        $model = new BookModel();
        $booksArray = $model->getRecords();

        $data['books'] = $booksArray;

        return view('books/list', $data);
    }

    public function create(){
        $session = \Config\Services::session();
        helper('form');
        $data=[];
        if($this->request->getMethod()=='post'){
            $input = $this->validate(([
                'name' => 'required|min_length[5]',
                'author' => 'required|min_length[5]',
                'isbn_no' => 'min_length[5]'
            ]));

            if($input==true){
                //Form validated successfully so we can save value in database
                $model = new BookModel();

                $model->save([
                    'title' => $this->request->getPost('name'),
                    'author' => $this->request->getPost('author'),
                    'isbn_no' => $this->request->getPost('isbn_no')
                ]);

                $session->setFlashdata('success','Yay Registered Successfully');

                return redirect()->to('books');
            }else{
                //Form not validated Successfully
                $data['validation'] = $this->validator;
            }
        }
        return view('books/create', $data);
    }

    public function edit($id){
        $session = \Config\Services::session();
        helper('form');

        $model = new BookModel();
        $book = $model->getRow($id);

        if(empty($book)){
            $session->setFlashdata('error','Records Not Found');
            return redirect()->to('/books');
        }

        $data=[];
        $data['book'] = $book;
        if($this->request->getMethod()=='post'){
            $input = $this->validate(([
                'name' => 'required|min_length[5]',
                'author' => 'required|min_length[5]',
                'isbn_no' => 'min_length[5]'

            ]));

            if($input==true){
                //Form validated successfully so we can save value in database
                $model = new BookModel();

                $model->update($id,[
                    'title' => $this->request->getPost('name'),
                    'author' => $this->request->getPost('author'),
                    'isbn_no' => $this->request->getPost('isbn_no')
                ]);

                $session->setFlashdata('success','Yay! Updated Successfully');

                return redirect()->to('books');
            }else{
                //Form not validated Successfully
                $data['validation'] = $this->validator;
            }
        }
        return view('books/edit', $data);
    }

    public function delete($id)
    {
        $session = \Config\Services::session();
        helper('form');

        $model = new BookModel();
        $book = $model->getRow($id);

        if(empty($book)){  
            $session->setFlashdata('error','Records Not Found');
            return redirect()->to('/books');
        }

        $model = new BookModel();
        $model->delete($id);

        $session->setFlashdata('success','Record Deleted Successfully');
        return redirect()->to('/books');
    }
}

?>