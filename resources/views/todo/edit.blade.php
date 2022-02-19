@extends('layouts.app')

@section('content')
    <div class = "w-100 h-100 d-flex justify-content-center align-items-center">
        <div class = "text-center", style = "width: 40%">
            <h1 class = "display-2 text-white">Edit your todo called</h1>
            <h2 class = "text-white pt-5">What next? Add something to your list!</h2>
            <form action = "{{ route('todo.store')}}" method = "POST">
                @csrf
                <div class = "input-group nb-3 w-100">
                    <input type = "text" class = "form-control form-control-lg" name = "title" placeholder = "Type here.."
                        aria-label = "Recipient's username" arial-describedby = "button-addon2">
                    <div class = "input-group-append">
                        <button class = "btn btn-success" type = "submit" id = "button-addon2">Add to the list</button>
                    </div>
                </div>
            </form>

            <h2 class = "text-white pt-2">My Todo list:</h2> 
            <div class ="bg-white">
                @foreach($todos as $todo)
                    <div class = "w-100 d-flex align-items-center justify-content-between">
                       <div class = "p-4"> @if ($todo->completed == 0)
                        <svg xmlns="http://www.w3.org/2000/svg" class ="icon icon-tabler icon-tabler-chevron-right" width ="36" height ="36" viewBox = "0 0 24 24" stroke-width="1.5"
                            stroke="#000000" fill ="none" stroke-linecape = "round" stroke-linejoin="round">
                            <path stroke = "none" d="M0 0h24v24H0z"/>
                            <polyline points="9 6 15 12 9 18"/>
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" class ="icon icon-tabler icon-tabler-check" width ="36" height ="36" viewBox = "0 0 24 24" stroke-width="1.5"
                            stroke="#000000" fill ="none" stroke-linecape = "round" stroke-linejoin="round">
                            <path stroke = "none" d="M0 0h24v24H0z"/>
                            <polyline points="M5 1215 5110 -10"/>
                        </svg>

                        @endif {{$todo->title}}</div>
                    </div>
                    <div class = "mr-4 d-flex align-items-center">
                        @if($todo->completed==0)
                        <form action = "{{ route('todo.update', $todo->id)}}" method = "POST">
                            @method('PUT')
                            @csrf
                            <input type="text" name ="completed" value ="1" hidden>
                            <button class = "btn btn-success">Mark it as completed </button>
                        </form>
                        @else
                        <form action = "{{ route('todo.update', $todo->id)}}" method = "POST">
                            @method('PUT')
                            @csrf
                            <input type="text" name ="completed" value ="0" hidden>
                            <button class = "btn btn-warning">Mark it as uncompleted </button>
                        </form>
                        @endif
                        <svg xmlns="http://www.w3.org/2000/svg" class ="icon icon-tabler icon-tabler-edit ml-4" width ="36" height ="36" viewBox = "0 0 24 24" stroke-width="1.5"
                            stroke="#000000" fill ="none" stroke-linecape = "round" stroke-linejoin="round">
                            <path stroke = "none" d="M0 0h24v24H0z"/>
                            <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 -2v-3"/>
                            <path d="M9 15h318,5 -8,5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"/>
                            <line x1="16" y1="5" x2="19" y2="8"/>
                        </svg>
                    </div>
                @endforeach
            </div>
        </div>
    </div>  
@endsection