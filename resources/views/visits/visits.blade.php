@extends('layout')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <a href="{{ route('index.visit') }}"><h1 class="myfont text-center">سجل الزيارات</h1></a>
    </div><!-- End Page Title -->


    @include('include.DateFilter')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active myfont text-center" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview" style="margin-bottom: 10px">سجل الزيارات</button>
                            </li>
                        </ul>
                        <table class="table table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col" class="myfont text-center">ID</th>
                                    <th scope="col" class="myfont text-center">الاسم</th>
                                    <th scope="col" class="myfont text-center">التاريخ</th>
                                    <th scope="col" class="myfont text-center">الوقت</th>
                                    <th scope="col" class="myfont text-center">نوع الزيارة</th>
                                    <th scope="col" class="myfont text-center">الكلفة</th>
                                    <th scope="col" class="myfont text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($visits))
                                @foreach($visits as $visit)
                                <tr>
                                    <th scope="row" class="text-center"><a href="{{ URL::route('show.visit' , ['id' => $visit->id]) }}">{{
                                            $visit->id }}</a> </th>
                                    <td class="myfont text-center"><a
                                            href="{{ URL::route('patient' , ['id' => $visit->patient_id]) }}">{{
                                            $visit->patient->first_name }} {{ $visit->patient->last_name }}</a></td>
                                    <td class="myfont text-center" dir="ltr">{{ date('Y/m/d' , strtotime($visit->date)) }}</td>
                                    <td class="myfont text-center" dir="ltr">{{ date('h:i:s a' , strtotime($visit->time)) }}</td>
                                    <td class="myfont text-center">{{ $visit->type }}</td>
                                    <td class="myfont text-center" dir="ltr">{{ $visit->cost }}</td>
                                    <td><form action="{{ route('delete.visit' , ['id' => $visit->id]) }}" method="post">@csrf<button type="submit" class="btn btn-danger myfont text-center">حذف</button></form></td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>


                        </table>
                        <div dir="ltr">{{ $visits->render() }}</div>
                        @include('include.total')
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection
