<?php
echo Form::open(['route' => 'register']);
    echo Form::text('name');
    echo Form::text('email');
    echo Form::text('password');
    echo Form::submit('Register');
echo Form::close();
if(isset($errors)) {
    dump($errors);
}