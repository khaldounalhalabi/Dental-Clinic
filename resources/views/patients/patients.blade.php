@extends('layout')
@section('content')
<main id="main" class="main">
    <style>
        .buttonfont {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 100%;
            color: aliceblue;
        }

    </style>


    <div class="pagetitle">
        <a href="{{ route('index.patients') }}">
            <h1 class="myfont text-center">سجل المرضى</h1>
        </a>
    </div>
    <!-- End Page Title -->

    {{-- search --}}
    <div class="card" dir="rtl">
        <div class="card-body">
            <h5 class="card-title">بحث</h5>
            <form class="row g-3" action="{{ route('search.patient') }}" method="POST">
                @csrf
                <div class="col-md-4">
                    <label for="first_name" class="form-label myfont">الاسم الأول</label>
                    <input name="first_name" type="text" class="form-control" id="first_name">
                </div>
                <div class="col-md-4">
                    <label for="last_name" class="form-label">الاسم الأخير</label>
                    <input name="last_name" type="text" class="form-control" id="last_name">
                </div>
                <div class="col-md-4" style="margin-top: 5%">
                    <button class="btn btn-primary" type="submit">بحث</button>
                </div>
            </form>
        </div>
    </div>
    {{-- end search --}}



    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active myfont text-center" data-bs-toggle="tab" data-bs-target="#profile-overview" style="margin-bottom: 10px">جدول المرضى</button>
                            </li>
                        </ul>

                        @if($patients)

                        <table class="table table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col" class="myfont text-center">ID</th>
                                    <th scope="col" class="myfont text-center">الاسم</th>
                                    <th scope="col" class="myfont text-center">تاريخ الميلاد</th>
                                    <th scope="col" class="myfont text-center">رقم الهاتف</th>
                                    <th scope="col" class="myfont text-center">رقم الجوال</th>
                                    <th scope="col" class="myfont text-center">المدينة</th>
                                    <th scope="col" class="myfont text-center">الشارع</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patients as $patient)
                                <tr>
                                    <th scope="row"><a href="{{ URL::route('patient' , ['id' => $patient->id]) }}">{{ $patient->id }}</a> </th>
                                    <td class="myfont text-center"><a href="{{ URL::route('patient' , ['id' => $patient->id]) }}">{{ $patient->first_name }} {{ $patient->last_name }}</a></td>
                                    <td class="myfont text-center" dir="ltr">{{ date('Y/m/d' , strtotime($patient->birth_date)) }}</td>
                                    <td class="myfont text-center" dir="ltr">{{ $patient->home_number }}</td>
                                    <td class="myfont text-center" dir="ltr">{{ $patient->phone_number }}</td>
                                    <td class="myfont text-center">{{ $patient->city }}</td>
                                    <td class="myfont text-center">{{ $patient->street }}</td>
                                    <td>
                                        <form action="{{route('add.former.patient.reservation' , ['id' => $patient->id]) }}" method="get">@csrf<button type="submit" class="btn btn-primary">حجز</button></form>
                                    </td>
                                    <td>
                                        <form action="{{route('visit.page' , ['id' => $patient->id]) }}" method="get">@csrf<button type="submit" class="btn btn-primary">زيارة</button></form>
                                    </td>
                                    <td>
                                        <form action="{{ route('delete.patient' , ['id' => $patient->id]) }}" method="post">@csrf<button type="submit" class="btn btn-danger myfont text-center">حذف</button></form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div dir="ltr">{{ $patients->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </section>
</main>

@endsection
