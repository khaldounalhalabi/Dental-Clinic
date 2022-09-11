@extends('layout')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1 class="myfont">إضافة حجز</h1>
    </div><!-- End Page Title -->


    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- add reservation -->
                        <form action="{{ route('add.reservation') }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <label for="first_name" class="col-md-4 col-lg-3 col-form-label myfont">الاسم
                                    الأول</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="first_name" type="text" class="form-control" id="first_name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="last_name" class="col-md-4 col-lg-3 col-form-label myfont">الاسم
                                    الأخير</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="last_name" type="last_name" class="form-control" id="last_name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="date" class="col-md-4 col-lg-3 col-form-label myfont">التاريخ</label>
                                <div class="col-md-8 col-lg-3">
                                    <input name="date" type="date" class="form-control" id="date"
                                        value="{{ Carbon\Carbon::now('Asia/Damascus')->format('Y-m-d') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="time" class="col-md-4 col-lg-3 col-form-label myfont">الوقت</label>
                                <div class="col-md-8 col-lg-3">
                                    <input type="time" class="form-control" id="time" name="time"
                                        value="{{ Carbon\Carbon::now('Asia/Damascus')->format('h:i') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="home_number" class="col-md-4 col-lg-3 col-form-label myfont">رقم
                                    الهاتف</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="home_number" type="text" class="form-control" id="home_number">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone_number" class="col-md-4 col-lg-3 col-form-label myfont">رقم
                                    الجوال</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="phone_number" type="text" class="form-control" id="phone_number">
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="reason" class="col-md-4 col-lg-3 col-form-label myfont">السبب</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="reason" type="text" class="form-control" id="reason">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="notes" class="col-md-4 col-lg-3 col-form-label myfont">الملاحظات</label>
                                <div class="col-md-8 col-lg-9">
                                    <textarea name="notes" class="form-control" id="notes"
                                        style="height: 100px"></textarea>
                                </div>
                            </div>




                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                        </form><!-- End add reservation -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


@endsection
