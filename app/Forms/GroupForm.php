<?php namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class GroupForm extends Form
{
    public function buildForm()
    {
      $this
        ->add('name', 'text')
        ->add('permalink', 'text')
        ->add('description', 'textarea')
        ->add('Create', 'submit', [
              'attr' => ['class' => 'btn btn-primary']
          ])
        ;
    }
}
