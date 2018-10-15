<?php
echo Form::open(['route' => 'login']);
    echo Form::text('email');
    echo Form::text('password');
    echo Form::submit('Login');
echo Form::close();