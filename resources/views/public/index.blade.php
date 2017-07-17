@extends('layouts.app')

@section('content')
<div class="container" >
    @if (session()->has('message'))
        <div class="alert">
            {{ session('message') }}
        </div>
    @endif

    <style>
        .masthead {
            height: 330px;
        }
        .box > h2 {
            color: black;
        }
        .box > li > a {
            color: blue;
            padding: 0;
        }
        a::after {
            content: " ";
            display:block;
        }
        li > a {
            color: #6699cc;
            text-decoration: none;
        }
    </style>
    
    <div class="row masthead" style="padding: 0; margin:0;">
        <div class="excerpt" style="background: black; color:#f1efe5; height:330px; width:250px;float:left; padding:20px;">
            <h2 style="font-size:30px;">Port Headline.</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore aliquid fuga autem unde veritatis omnis assumenda modi. Voluptatem, amet est eligendi vitae, maxime repellat, consequuntur numquam totam dignissimos distinctio esse!</p>
        </div>
        <div class="img" style="width:700px;height:330px; background:gray;float:left; overflow:hidden;">
            <img src="{{ asset('default/container_ship.png') }}" alt="">
        </div>
    </div>
    <div class="row slots" style="padding: 0; margin:0;">
        <div class="col-lg-4 box" style="float:left; padding:20px;background:#ebebeb;height:200px">
        <h2 style="color:black; font-size:18px;margin-top:0;">Our Services</h2>
        <ul class="nav">
            <li>
                <a href="#">lorem ipsum</a>
            </li>
            <li>
                <a href="">dolor ime</a>
            </li>
            <li>
                <a href="">tries bien</a>
            </li>
        </ul>
        </div>
        <div class="col-lg-4 box" style="float:left; padding:20px;background:#6d6760;height:200px">
        <h2 style="color:black;font-size:18px;margin-top:0;">Your Industry</h2>
        <ul class="nav">
            <li>
                <a href="#">lorem ipsum</a>
            </li>
            <li>
                <a href="">dolor ime</a>
            </li>
            <li>
                <a href="">tries bien</a>
            </li>
        </ul>
        </div>
        <div class="col-lg-4 box" style="float:left; padding:20px;background:#383531;height:200px">
            <h2 style="color:black;font-size:18px;margin-top:0;">Advisory</h2>
            <ul class="nav">
                <li>
                    <a href="#">lorem ipsum</a>
                </li>
                <li>
                    <a href="">dolor ime</a>
                </li>
                <li>
                    <a href="">tries bien</a>
                </li>
            </ul>
        </div>
        <div class="track" style="padding:100px 20px;background:#537777;height:400px; margin-top:20px">
            <div class="row">
                <div class="col-lg-12" style="text-align:center;">
                    <h2 style="color:black;font-size:18px;">Track My Goods</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
                <form action="#" class="col-lg-12">
                    <input type="text" placeholder="Tracking ID" class="form-control" 
                    style="background:transparent; font-size: 30px; 
                    border:none; border-bottom:1px solid #6d6760;padding:20px;text-align:center">
                    <p style="text-align:center;">
                        <input type="submit" value="Get Location" class="btn btn-primary btn-lg" style="margin: 10px auto; width: auto; padding: 15px 30px;font-weight:500">
                    </p>
                </form>
            </div>
        </div>

        <div class="col-lg-12" style="padding:20px;background:#a89f94;height:270px">
        
        </div>
    </div>
</div>
@endsection
