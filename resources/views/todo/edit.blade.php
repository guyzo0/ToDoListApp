@extends('layouts.app')

@section('content')
    <div class = "w-100 h-100 d-flex justify-content-center align-items-center">
        <div class = "text-center", style = "width: 40%">
            <h1 class = "display-2 text-white">Edit your todo called {{$todo->title}}</h1>
           
            <form action = "{{ route('todo.update', $todo->id)}}" method = "POST">
                @csrf
                <div class = "input-group nb-3 w-100">
                    <input type = "text" class = "form-control form-control-lg" name = "title" placeholder = "Type here.."
                        aria-label = "Recipient's username" arial-describedby = "button-addon2">
                    <div class = "input-group-append">
                        <button class = "btn btn-success" type = "submit" id = "button-addon2">Add to the list</button>
                    </div>
                </div>
            </form>

        </div>
    </div>  
@endsection