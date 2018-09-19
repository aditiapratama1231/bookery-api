<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;

class BookController extends AbstractController
{
    
    /**
     * @Route("/books", name="books", methods={"GET"})
     */
    public function index()
    {
    	// $repository = $this->getDoctrine()->getManager();
    	// $book = $repository->getRepository(Book::class);
    	// $books = $book->findAll();
    	// 
    	// $books = new Book();

    	$data = [
    		'data' => Book::get(),
    		'status' => 'success'
    	];

    	return new JsonResponse($data);
    }

    /**
     * @Route("/book", name="book", methods={"GET"})
     */
    public function store()
    {
    	$book = new Book();
    	$book->name = "how to end this pain";
    	$book->summary = "this book tell about how to life";
    	$book->author = "Aditia Pratama";
    	$book->price = 100;

    	$book->save();

    	$data = [
    		'data' => $book,
    		'status' => 'success'
    	];

    	return new JsonResponse($data);
    }
}
