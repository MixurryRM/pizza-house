@extends('layouts.layout')
@section('content')
    <div class="wrapper create-pizza">
        <a href="#" onclick="history.back(); return false;" class="text-decoration-none pizza-color"><i
                class="fa-solid fa-arrow-left"></i></a>
        <h1>Pizza Various</h1>
        <form action="{{ route('various.type') }}" method="POST">
            @csrf
            <label for="name">Type of pizza:</label>
            <input type="text" name="type" id="type" required>
            <input type="submit" class="ms-2" style="width:50px,height:50px" value="Add">
        </form>
        <form action="{{ route('various.base') }}" method="POST">
            @csrf
            <label for="name">Type of Base:</label>
            <input type="text" name="base" id="base" required>
            <input type="submit" class="ms-2" style="width:50px,height:50px" value="Add">
        </form>
        <form action="{{ route('various.topping') }}" method="POST">
            @csrf
            <label for="name">Type of Topping:</label>
            <input type="text" name="topping" id="topping" required>
            <input type="submit" class="ms-2" style="width:50px,height:50px" value="Add">
        </form>
    </div>
@endsection
