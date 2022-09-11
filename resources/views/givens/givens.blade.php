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

@include('include.DateFilter')

    <div class="pagetitle">
        <a href="{{ route('index.givens') }}"><h1 class="myfont text-center">سجل سندات الدفع</h1></a>
    </div>
    <!-- End Page Title -->


    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active myfont" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview" style="margin-bottom: 10px">جدول سندات الدفع</button>
                            </li>
                        </ul>


                        <!-- start of expenses table -->
                        <table class="table table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="lol" class="myfont  text-center">ID</th>
                                    <th scope="col" class="myfont  text-center">البيان</th>
                                    <th scope="col" class="myfont  text-center">القيمة</th>
                                    <th scope="col" class="myfont  text-center">التاريخ</th>
                                    <th scope="col" class="myfont  text-center">الوقت</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($givens as $given)

                                <tr>
                                    <td calss="myfont  text-center">{{ $given->id }}</td>
                                    <td class="myfont  text-center">{{ $given->description }}</td>
                                    <td class="myfont  text-center" dir="ltr">{{ $given->value }}</td>
                                    <td class="myfont  text-center" dir="ltr">{{ date('Y/m/d' , strtotime($given->date)) }}</td>
                                    <td class="myfont  text-center" dir="ltr">{{ date('H:i:s a' , strtotime($given->time)) }}</td>
                                    <td>
                                        <form action="{{route('edit.given.page' , ['id' => $given->id ]) }}"
                                            method="get">@csrf<button type="submit"
                                                class="btn btn-primary">تعديل</button></form>
                                    </td>
                                    <td>
                                        <form action="{{route('delete.given' , ['id' => $given->id]) }}"
                                            method="post">@csrf<button type="submit"
                                                class="btn btn-danger myfont  text-center">حذف</button></form>
                                    </td>
                                </tr>

                                @endforeach


                            </tbody>

                        </table>
                        <div dir="ltr">{{ $givens->render() }}</div>
                        @include('include.total')
                    </div>

                </div>
            </div>
        </div>
        {{-- @endif --}}

    </section>
</main>

@endsection
