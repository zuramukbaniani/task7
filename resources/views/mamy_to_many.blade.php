@extends('layouts.app')

@section('content')
    <p>many to many ერთ სტუდენტს შეუძლია დარეგისტრირდეს მრავალ კურსზე ასევე ერთ კურსს შეუძლია მიიღოს რამდენიმე სტუდენტი</p>
    {{ $student_class }}   
@endsection