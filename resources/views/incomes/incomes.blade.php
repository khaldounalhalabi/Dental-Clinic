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
        <a href="{{ route('index.incomes') }}">
            <h1 class="myfont text-center">سجل دخل العيادة</h1>
        </a>
    </div><!-- End Page Title -->


    @include('include.DateFilter')


    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active myfont" data-bs-toggle="tab" data-bs-target="#profile-overview" style="margin-bottom: 10px">جدول دخل العيادة</button>
                            </li>
                        </ul>
                        <table class="table table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="lol" class="myfont text-center"> </th>
                                    <th scope="lol" class="myfont text-center">ID</th>
                                    <th scope="col" class="myfont text-center">البيان</th>
                                    <th scope="col" class="myfont text-center">القيمة</th>
                                    <th scope="col" class="myfont text-center">التاريخ</th>
                                    <th scope="col" class="myfont text-center">الوقت</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($incomes as $income)
                                <tr>
                                    @if($income->visit_id)
                                    <td class="myfont text-center"><a href="{{ URL::route('show.visit' , ['id' => $income->visit_id]) }}"><button type="submit" class="btn btn-primary">الزيارة</button></a></td>
                                    @else
                                    <td class="myfont text-center"></td>
                                    @endif
                                    <td calss="myfont text-center">{{ $income->id }}</td>
                                    <td class="myfont text-center">{{ $income->description }}</td>
                                    <td class="myfont text-center" dir="ltr">{{ $income->value }}</td>
                                    <td class="myfont text-center" dir="ltr">{{ date('Y/m/d' , strtotime($income->date)) }}</td>
                                    <td class="myfont text-center" dir="ltr">{{ date('H:i:s a' , strtotime($income->time)) }}</td>
                                    <td>
                                        <form action="{{URL::route('edit.income.page' ,
                                        [
                                            'id' => $income->id ,
                                            'description' => $income->description ,
                                            'cost' => $income->value ,
                                            'date' => $income->date ,
                                            'time' => $income->time ,
                                            ]) }}" method="get">@csrf<button type="submit" class="btn btn-primary">تعديل</button></form>
                                    </td>
                                    <td>
                                        <form action="{{route('delete.income' , ['id' => $income->id]) }}" method="post">@csrf<button type="submit" class="btn btn-danger myfont text-center">حذف</button></form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div dir="ltr">{{ $incomes->links() }}</div>
                        @include('include.total')
                    </div>
                </div>
            </div>
        </div>
        {{-- @endif --}}

    </section>
</main>

@endsection
