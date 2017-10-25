@extends('layout')

@section('header')
    <style>
form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
@stop
@section('content')

    <h2 class="center-content">Login Form</h2>
{!! Form::open(['url' => 'login']) !!}
    <div class="container">
        <label>
            <b>
                <?php echo Form::label('Username', 'Username'); ?>
            </b>
        </label>
            <?php 
                echo Form::text('username', null ,array('required' => 'required', 'placeholder' => 'Enter Username', 'autocomplete' => 'off'));
            ?>
        <label>
            <b>
                <?php echo Form::label('Password', 'Password'); ?>
            </b>
        </label>
            <?php 
                echo Form::password('password', ['required' => 'required', 'placeholder' => 'Enter Password']);
            echo Form::submit('Click Me!');
            ?>
    </div>
{!! Form::close() !!}
@stop