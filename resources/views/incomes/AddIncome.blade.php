@extends('layout')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1 class="myfont">إضافة مدخول</h1>
    </div><!-- End Page Title -->


    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- add reservation -->
                        <form action="{{ route('add.income') }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <label for="cost" class="col-md-4 col-lg-3 col-form-label myfont">القيمة</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="cost" type="text" class="form-control myfont" id="cost">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-lg-3 col-form-label myfont">البيان</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="description" type="text" class="form-control" id="description">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="date" class="col-md-4 col-lg-3 col-form-label myfont">التاريخ</label>
                                <div class="col-md-8 col-lg-3">
                                    <input name="date" type="date" class="form-control" id="date" value="{{ Carbon\Carbon::now('Asia/Damascus')->format('Y-m-d') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="time" class="col-md-4 col-lg-3 col-form-label myfont">الوقت</label>
                                <div class="col-md-8 col-lg-3">
                                    <input type="time" class="form-control" id="time" name="time" value="{{ Carbon\Carbon::now('Asia/Damascus')->format('h:i') }}">
                                </div>
                            </div>

                            @include('include.error')

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary myfont">حفظ التغييرات</button>
                            </div>
                        </form>
                        <!-- End add reservation -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


@endsection
