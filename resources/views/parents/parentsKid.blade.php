@extends('layouts.my_app')
@section('subtitle')
  select kid
@endsection

@section('contentheader_title')
    select kid
@endsection

@section('content')
@php
use Carbon\Carbon;
@endphp
<div class="container-fluid px-4">
                        <h1 class="mt-4">Parents Kids</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/hospitals/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">kids</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Date Of Birth</th>
                                            <th>Age</th>
                                            <th>Place Of Birth</th>
                                            <th>Gender</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>#</th>
                                            <th>Name</th>
                                            <th>Date Of Birth</th>
                                            <th>Age</th>
                                            <th>Place Of Birth</th>
                                            <th>Gender</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                      @foreach ($kids as $kid)
                                      <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$kid->kid_name}}</td>
                                            <td>{{ Carbon::parse($kid->date_of_birth)->format('F j, Y')}}</td>
                                            @php 
                                                $birthDate = Carbon::parse($kid->date_of_birth);
                                                $currentDate = Carbon::now();

                                                $years = $birthDate->diffInYears($currentDate);
                                                $years=round($years, 0);
                                                $months = $birthDate->diffInMonths($currentDate) % 12;
                                                $weeks = $birthDate->diffInWeeks($currentDate) % 4;
                                                $days = $birthDate->diffInDays($currentDate) % 7;

                                                $ageString = '';
                                               
                                                if ($years > 0) {
                                                    $ageString .= $years . ' year' . ($years > 1 ? 's' : '') . ' ';
                                                }

                                                if ($months > 0) {
                                                    $ageString .= $months . ' month' . ($months > 1 ? 's' : '') . ' ';
                                                }

                                                if ($weeks > 0) {
                                                    $ageString .= $weeks . ' week' . ($weeks > 1 ? 's' : '') . ' ';
                                                }

                                                if ($days > 0) {
                                                    $ageString .= $days . ' day' . ($days > 1 ? 's' : '') . ' ';
                                                }

                                                $age = trim($ageString); // Trim any trailing space
                                                @endphp

                                           
                                            <td>{{$age}}</td>

                                            <td>{{$kid->place_birth}}</td>
                                            <td>{{$kid->gender_name}}</td>
                                            <td><a type="button" class="btn btn-outline-primary btn-sm" href="/parents/kids/vaccines/{{base64_encode($kid->id)}}">View</a></td>
                                        </tr>
                                      @endforeach  
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection