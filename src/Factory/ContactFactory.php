<?php

namespace App\Factory;

use App\Entity\Contact;
use Symfony\Component\Form\FormInterface;

class ContactFactory
{
public  static  function  createFormForm(FormInterface $form) :Contact
{
    $contact = new Contact();

    $contact-> setName($form->get('Name')->getData());
    $contact-> setEmail($form->get('Email')->getData());
    $contact-> setMessage($form->get('Message')->getData());
    return $contact;
}
}