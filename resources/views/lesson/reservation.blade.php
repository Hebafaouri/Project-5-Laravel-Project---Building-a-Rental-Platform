
@extends('lesson.lessonlayout')
@section('content')
@foreach ($users as $user)
@endforeach
@foreach ($houseDatas as $houseData)houseDatas
@endforeach
@foreach ($bookings as $booking)
<div class="row">
  <div class="col-md-6">
    <div class="card bg-cover text-center" style="background-image: url({{ asset($houseData->image1) }})">
      <div class="card-body z-index-2 py-9">                        
        <h2 class="text-white">{{$user->user_name}}</h2>
        <p class="text-white">
        {{$user->address}}
        {{$user->phone}}
        </p>
        <label class="badge badge-light text-dark">{{$booking->start_date}}</label>
        <label class="badge badge-light text-dark">{{$booking->end_date}}</label>
      </div>
      <div class="mask bg-gradient-primary border-radius-lg"></div>
    </div>
  </div>
  @endforeach
  @endsection