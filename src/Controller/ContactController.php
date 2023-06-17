<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Factory\ContactFactory;
use App\Form\Type\ContactType;
use App\Repository\ContactRepository;
use PhpParser\Node\Name;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{
    private ContactRepository $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
/**
 * @Route ("/")"
 */
public  function  createContact(Request $request) :Response
{
    $contact = new Contact();
    $form = $this ->createForm(type: ContactType::class,data: $contact);
    $form ->handleRequest($request);
    if ($form ->isSubmitted())
    {
        if(empty($form ->get('Name')->getData())||empty($form ->get('Email')->getData())||empty($form ->get('Message')->getData()))
        {
            $this->addFlash(type: 'error',message: 'Hiba! Kérjük töltsd ki az
összes mezőt!');
            return $this -> renderForm(view: 'form.html.twig', parameters: [
            'form' => $form,
        ]);
        }

        $contact =ContactFactory::createFormForm($form);
        $this-> contactRepository->save($contact);

        $this->addFlash(type: 'success',message: 'Köszönjük szépen a kérdésedet.
Válaszunkkal hamarosan keresünk a megadott e-mail címen.');
    }

    return $this -> renderForm(view: 'form.html.twig', parameters: [
        'form' => $form,
    ]);
}
}