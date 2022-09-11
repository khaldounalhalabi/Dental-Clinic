@extends('layout')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <a href="{{ route('index.reservation') }}"><h1 class="myfont text-center">سجل المواعيد</h1></a>
    </div><!-- End Page Title -->


    {{-- search --}}
    <div class="card" dir="rtl">
        <div class="card-body">
            <h5 class="card-title">بحث</h5>
            <form class="row g-3" action="{{ route('search.reservation') }}" method="POST">
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
                                <button class="nav-link active myfont text-center" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview" style="margin-bottom: 10px">جدول المواعيد</button>
                            </li>
                        </ul>
                        <!-- start of reservations table -->
                        <table class="table table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col" class="myfont text-center">ID</th>
                                    <th scope="col" class="myfont text-center">الاسم</th>
                                    <th scope="col" class="myfont text-center">التاريخ</th>
                                    <th scope="col" class="myfont text-center">الوقت</th>
                                    <th scope="col" class="myfont text-center">رقم الهاتف</th>
                                    <th scope="col" class="myfont text-center">رقم الجوال</th>
                                    <th scope="col" class="myfont text-center">حالة الموعد</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservations as $re)
                                <tr>
                                    <th scope="row"><a
                                            href="{{ URL::route('show.reservation' , ['id' => $re->id]) }}">{{
                                            $re->id }}</a> </th>
                                    @if($re->patient_id)
                                    <td class="myfont text-center"><a
                                            href="{{ URL::route('patient' , ['id' => $re->patient_id]) }}">{{
                                            $re->first_name }} {{ $re->last_name }}</a></td>
                                    @else
                                    <td class="myfont text-center">{{$re->first_name }} {{ $re->last_name }}</td>
                                    @endif
                                    <td class="myfont text-center" dir="ltr">{{ date('Y/m/d' , strtotime($re->date)) }}</td>
                                    <td class="myfont text-center" dir="ltr">{{ date('h:i:s a' , strtotime($re->time)) }}</td>
                                    <td class="myfont text-center" dir="ltr">{{ $re->phone_number }}</td>
                                    <td class="myfont text-center" dir="ltr">{{ $re->home_number }}</td>
                                    <td class="myfont text-center">{{ $re->status }}</td>
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
                                    <td><form action="{{ route('delete.reservation' , ['id' => $re->id]) }}" method="post">@csrf<button type="submit" class="btn btn-danger myfont text-center">حذف</button></form></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div dir="ltr">{{ $reservations->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection
