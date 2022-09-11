@extends('layout')
@section('content')
<main id="main" class="main">
    <style>
        .buttonfont {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 100%;
            color: aliceblue;
        }

        .warning {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 115%;
            color: navy;
        }

        .danger {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 115%;
            color: red;
        }

        .bonds{
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 115%;
            color: orange;
        }
        .delete_bond{
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 115%;
            color: olivedrab;
        }

    </style>

    <div class="pagetitle">
        <a href="{{ route('index.balance') }}"><h1 class="myfont text-center">الصندوق</h1></a>
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
                                <button class="nav-link active myfont text-center" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview" style="margin-bottom: 10px">الصندوق</button>
                            </li>
                        </ul>
                        <table class="table table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col" class="myfont text-center">القيمة</th>
                                    <th scope="col" class="myfont text-center">التاريخ</th>
                                    <th scope="col" class="myfont text-center">ملاحظات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($wallets as $wallet)
                                <tr>
                                    <td class="myfont text-center" dir="ltr">{{ $wallet->balance }}</td>
                                    <td class="myfont text-center" dir="ltr">{{ date('Y/m/d' , strtotime($wallet->date)) }}</td>
                                    @if($wallet->notes == 'لقد حذفت سجل زيارة سابق' || $wallet->notes == 'لقد حذفت قيمة دخل
                                    سابق' || $wallet->notes == 'لقد حذفت سجل صرف سابق')
                                    <td class="danger text-center">{{ $wallet->notes }}</td>
                                    @elseif($wallet->notes == 'لقد قمت بالتعديل على سجل صرف سابق' || $wallet->notes ==
                                    'لقد قمت بالتعديل على سجل دخل سابق' || $wallet->notes == 'لقد قمت بالتعديل على سجل زيارة سابق')
                                    <td class="warning text-center">{{ $wallet->notes }}</td>
                                    @elseif($wallet->notes == 'لقد قمت بالتعديل على سند قبض سابق' || $wallet->notes ==
                                    'لقد قمت بالتعديل على سند دفع سابق')
                                    <td class="bonds text-center">{{ $wallet->notes }}</td>
                                    @elseif($wallet->notes == 'لقد حذفت قيمة سند قبض سابق' || $wallet->notes ==
                                    'لقد حذفت سند دفع سابق')
                                    <td class="delete_bond text-center">{{ $wallet->notes }}</td>
                                    @else
                                    <td class="myfont text-center">{{ $wallet->notes }}</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div dir="ltr">{{ $wallets->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @endif --}}

    </section>
</main>

@endsection
