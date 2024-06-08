@extends('Student.base')
@section('contents')


<br>
<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Manage Property
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/property">Property Listing</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $property->propertyName }}, {{$property->city}} {{$property->state}} </li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div style="float: left; margin-right: 10px;">
                <img src="/storage/{{$property->propertyImage}}" style="width: 100%; height:250px;">
            </div>
            <div style="overflow: hidden;">
                <h5 class="card-title mb-0" style="font-size: 1.5rem;">{{ $property->propertyName }}</h5>
                <p class="card-text">
                    <i class="fas fa-map-marker-alt"></i>
                    {{ $property->propertyAddress }} {{ $property->poscode }} {{ $property->city }}, {{ $property->state }}
                </p>
                <p class="card-text"><i class="ion ion-ios-bed me-2"></i>{{ $property->bedroom }} Bedroom(s) &nbsp;<i class="fas fa-shower me-2"></i>{{ $property->bathroom }} Bathroom(s)</p>
                <p class="card-text">Property details:</p>
                <ul>
                    <li>{{ $property->propertyType }}</li>
                    <li>{{ $property->gender }} gender preferred</li>
                    <li>{{ $property->race }} race preferred</li>
                    <li>{{ $property->noPeople }} max of people</li>
                    <li>RM{{ $property->propertyRentPrice }} per month</li>
                    <li>Furnish : </b>{{ $property->propertyFurnish }}</li>
                </ul>
                    <p>*{{ $property->propertyDesc }}</p>
                    <a href="https://wa.me/{{ $property->ownerPhoneNo }}" target="_blank">
                        <i class="fab fa-whatsapp"></i> {{ $property->ownerPhoneNo }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    
@stop
    