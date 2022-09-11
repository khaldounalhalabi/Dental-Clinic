@extends('layout')
@section('content')

<main id="main" class="main">
    <div class="pagetitle">
        <h1 class="myfont">إضافة مريض</h1>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">

                        <!-- Profile Edit Form -->
                        <form action="{{ route('add.patient') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="first_name" class="col-md-4 col-lg-3 col-form-label myfont">الاسم الأول</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="first_name" type="text" class="form-control" id="first_name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="last_name" class="col-md-4 col-lg-3 col-form-label myfont">الاسم الأخير</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="last_name" type="last_name" class="form-control" id="last_name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="birth_date" class="col-md-4 col-lg-3 col-form-label myfont">تاريخ الميلاد</label>
                                <div class="col-md-8 col-lg-3">
                                    <input name="birth_date" type="date" class="form-control" id="birth_date">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="home_number" class="col-md-4 col-lg-3 col-form-label myfont">رقم الهاتف</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="home_number" type="text" class="form-control" id="home_number">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone_number" class="col-md-4 col-lg-3 col-form-label myfont">رقم الجوال</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="phone_number" type="text" class="form-control" id="phone_number">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="city" class="col-md-4 col-lg-3 col-form-label myfont">المدينة</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="city" type="text" class="form-control" id="city">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="street" class="col-md-4 col-lg-3 col-form-label myfont">الشارع</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="street" type="text" class="form-control" id="street">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="notes" class="col-md-4 col-lg-3 col-form-label myfont">الملاحظات</label>
                                <div class="col-md-8 col-lg-9">
                                    <textarea name="notes" class="form-control" id="notes" style="height: 100px"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-lg-3 col-form-label myfont">تحميل صورة</label>
                                <div class="col-md-8 col-lg-9">
                                    <input id="image" name="image" class="form-control" type="file">
                                </div>
                            </div>


                            @include('include.error')


                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                            </div>
                        </form><!-- End Profile Edit Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


@endsection
