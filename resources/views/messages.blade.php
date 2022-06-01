<link rel="stylesheet" class="logo" href="{{asset('../css/style.css')}}">

<!--extend layout master.blade.php -->

@extends('layouts/master')

<!--sets value for section title to "Mini Twitter" (section title is used in messages.blade.php) -->
@section('title', '')
<img class="logo" src="{{ asset('img/mini-twitter-logo.png') }}">

<!--starts section content, defines some html for section content and end section content
ts value for section title to "Mini Twitter" (section content is used in messages.blade.php) -->
@section('content')

<h3 class="slogan">WE WANNA KNOW WHAT YOU'RE THINKING,<br>
THERE ARE SOME THINGS YOU CAN'T HIDE <span style='font: size 35px;'>&#129297;</span>
</h3>

<h2>Share your thoughts here &#128151; </h2>

<form action="/create" method="post">
   <input type="text" name="title" placeholder="Title">
   <input type="text" name="content" placeholder="Content">
   <!-- this blade directive is necessary for all form posts somewhere in between
       the form tags -->
   @csrf
   <button type="submit">POST</button>

</form>

<!-- loops through the $messages, that this blade template
   gets from MessageController.php. for each element of the loop which
   we call $message we print the properties (title, content
   and created_at in an <li> element -->
@foreach ($messages as $message)
<li>
   <b>{{$message->title}}:</b><br>
   {{$message->content}}<br>
   <form action="/message/{{$message->id}}" method="post">

      @csrf
      @method('delete')
      <button type="submit">DELETE</button>
      <!-- <a href="/message/{{$message->id}}">EDIT</a> -->
      
      <a href="/message/{{$message->id}}">
        <input type="button" value="EDIT">
    </a>

   </form>
 
      
   {{$message->created_at->diffForHumans()}}
</li>
@endforeach
</ul>


@endsection