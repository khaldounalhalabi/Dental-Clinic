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
        <a href="{{ route('index.expenses') }}"><h1 class="myfont text-center">سجل المصاريف</h1></a>
    </div>
    <!-- End Page Title -->

    @include('include.DateFilter')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active myfont" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview" style="margin-bottom: 10px">جدول المصاريف</button>
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

                                @foreach($expenses as $expense)

                                <tr>
                                    <td calss="myfont  text-center">{{ $expense->id }}</td>
                                    <td class="myfont  text-center">{{ $expense->description }}</td>
                                    <td class="myfont  text-center" dir="ltr">{{ $expense->cost }}</td>
                                    <td class="myfont  text-center" dir="ltr">{{ date('Y/m/d' , strtotime($expense->date)) }}</td>
                                    <td class="myfont  text-center" dir="ltr">{{ date('H:i:s a' , strtotime($expense->time)) }}</td>
                                    <td>
                                        <form action="{{route('edit.expense.page' , ['id' => $expense->id ]) }}"
                                            method="get">@csrf<button type="submit"
                                                class="btn btn-primary">تعديل</button></form>
                                    </td>
                                    <td>
                                        <form action="{{route('delete.expense' , ['id' => $expense->id]) }}"
                                            method="post">@csrf<button type="submit"
                                                class="btn btn-danger myfont  text-center">حذف</button></form>
                                    </td>
                                </tr>

                                @endforeach


                            </tbody>

                        </table>
                        <div dir="ltr">{{ $expenses->render() }}</div>
                        @include('include.total')
                    </div>

                </div>
            </div>
        </div>
        {{-- @endif --}}

    </section>
</main>

@endsection
