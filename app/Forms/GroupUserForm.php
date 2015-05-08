<?php namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class GroupUserForm extends Form
{
    public function buildForm()
    {
      $this
        ->add('name', 'text')
        ->add('email', 'email')
        ->add('hobbies', 'text')
        ->add('specialization', 'text')
        ->add('birth_date', 'date',[
            'default_value' => date("Y-m-d")
        ])
        ->add('Create', 'submit', [
              'attr' => ['class' => 'btn btn-primary']
          ])
        ;
    }
}
