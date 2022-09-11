@extends('layout')
@section('content')
<main id="main" class="main">
    <style>
        .myfont {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 100%;
        }

        .mysize {
            size: 100px;
        }
    </style>
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Start Last Reservations -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="card-body">
                                <h5 class="card-title myfont">المواعيد <span class="myfont">| اليوم</span></h5>
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="myfont text-center">ID</th>
                                            <th scope="col" class="myfont text-center">اسم المريض</th>
                                            <th scope="col" class="myfont text-center">التاريخ</th>
                                            <th scope="col" class="myfont text-center">الوقت</th>
                                            <th scope="col" class="myfont text-center">رقم الموبايل</th>
                                            <th scope="col" class="myfont text-center">الحالة</th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reservations as $re)
                                        <tr>
                                            <th scope="row" class="myfont text-center"><a
                                                    href="{{ URL::route('show.reservation' , [$re->id])}}">{{
                                                    $re->id }}</a></th>
                                            @if($re->patient_id)
                                            <th scope="row" class="myfont text-center"><a class="myfont text-center"
                                                    href="{{ URL::route('patient' , [$re->patient_id])}}">{{
                                                    $re->patient->first_name }} {{ $re->patient->last_name }}</a></th>
                                            @else
                                            <td class="myfont text-center">{{ $re->first_name }} {{ $re->last_name
                                                }}</td>
                                            @endif
                                            <td class="myfont text-center"><a href="#" class="text-primary myfont text-center">{{ date('Y/m/d' , strtotime($re->date))
                                                    }}</a></td>
                                            <td class="myfont text-center"><a href="#" class="text-primary myfont text-center">{{ date('h:i a' , strtotime($re->time))
                                                    }}</a></td>
                                            <td class="myfont text-center">{{ $re->phone_number }}</td>
                                            <td class="myfont text-center"><span class="badge bg-success">{{ $re->status }}</span>
                                            </td>
                                            <td>


                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle bg-primary myfont text-center"
                                                        type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        الحالة
                                                    </button>
                                                    <ul class="dropdown-menu" style="width: 20px !important"
                                                        aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item w-50 myfont text-center"
                                                                href="{{ URL::route('reservation.status' , ['id' => $re->id , 'status' => 'waiting'])}}">انتظار</a>
                                                        </li>
                                                        <li><a class="dropdown-item w-50 myfont text-center"
                                                                href="{{ URL::route('reservation.status' , ['id' => $re->id , 'status' => 'done'])}}">حضر</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="center">
                                    {{ $reservations->render() }}
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Last Reservations -->
                </div>
            </div>
            {{-- Righ Side Column --}}
            <div class="col-lg-4">
                <!-- Start The Current Balance -->
                <div class="card">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title myfont">الصندوق <span>| اليوم</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-safe"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class="myfont" dir="rtl" style="margin-right:10px"> {{ $balance->balance }}  ل.س</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End The Current Balance -->

                {{-- Start Current Date Time --}}
                <div class="card">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title myfont">التاريخ <span>| الوقت</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-alarm"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 id="time" class="myfont" dir="ltr" style="margin-right:3px "></h6>
                                    {{-- Setting realtime clock --}}
                                    <script>
                                        `use strict`;

                                        function refreshTime() {
                                            const timeDisplay = document.getElementById("time");
                                            const dateString = new Date().toLocaleString();
                                            const formattedString = dateString.replace(", ", " - ");
                                            timeDisplay.textContent = formattedString;
                                        }
                                        setInterval(refreshTime, 1000);

                                    </script>
                                    {{-- end setting realtime clock --}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Current Time -->
            </div>
    </section>
</main>

@endsection
