@extends('layout')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <a href="{{ route('earnings') }}">
            <h1 class="myfont text-center">حساب الأرباح</h1>
        </a>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12" dir="rtl">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <form action="{{ route('calculate.earnings') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="start_date" class="col-sm-2 col-form-label">تاريخ البدء</label>
                                <div class="col-sm-10">
                                    <input type="date" id="start_date" name="start_date" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="end_date" class="col-sm-2 col-form-label">تاريخ النهاية</label>
                                <div class="col-sm-10">
                                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ Carbon\Carbon::now('Asia/Damascus') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">حساب</button>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->
                        @include('include.error')
                    </div>
                </div>

            </div>
        </div>
        </div>

        </div>

    </section>
    @if(isset($earnings))
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <!-- Start The Current Balance -->
                <div class="card">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title myfont" style="font-size: 120%">الأرباح</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i style="size: 120%"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class="myfont" dir="rtl" style="margin-right:10px">{{ $earnings }} ل.س</h6>
                                </div>
                            </div>
                            <h5 class="card-title myfont" style="font-size: 120%">إجمالي المصاريف</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i style="size: 120%"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class="myfont" dir="rtl" style="margin-right:10px">{{ $totalExpenses }} ل.س</h6>
                                </div>
                            </div>
                            <h5 class="card-title myfont" style="font-size: 120%">إجمالي الدخل</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i style="size: 120%"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class="myfont" dir="rtl" style="margin-right:10px">{{ $totalIncomes }} ل.س</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    @endif


</main>


@endsection
