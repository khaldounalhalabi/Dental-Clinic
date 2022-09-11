@extends('layout')
@section('content')

<style>
    .wholecard {
        width: 120%;
    }

</style>
<main id="main" class="main wholecard">
    <div class="pagetitle">
        <h1 class="myfont">موعد </h1>
        <h2>{{ $reservation->first_name }} {{ $reservation->last_name }}</h2>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active myfont" data-bs-toggle="tab" data-bs-target="#profile-overview">الموعد</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link myfont" data-bs-toggle="tab" data-bs-target="#profile-edit">تعديل الموعد</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">
                            <h5 class="card-title myfont">معلومات الموعد</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label myfont">الاسم الكامل</div>
                                <div class="col-lg-9 col-md-8 myfont">{{ $reservation->first_name }} {{ $reservation->last_name }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label myfont">التاريخ</div>
                                <div class="col-lg-9 col-md-8 myfont">{{ date('Y/m/d' , strtotime($reservation->date)) }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label myfont">الوقت</div>
                                <div class="col-lg-9 col-md-8 myfont">{{ date('h:i:s a' , strtotime($reservation->time)) }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label myfont">رقم الهاتف</div>
                                <div class="col-lg-9 col-md-8 myfont">{{ $reservation->home_number }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label myfont">رقم الجوال</div>
                                <div class="col-lg-9 col-md-8 myfont">{{ $reservation->phone_number }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label myfont">السبب</div>
                                <div class="col-lg-9 col-md-8 myfont">{{ $reservation->reason }}
                                </div>
                            </div>

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title myfont">ملاحظات</h5>
                                <p class="small fst-italic myfont">{{ $reservation->notes }}</p>

                            </div>
                            <div class="text-center">
                                <form action="{{ route('delete.reservation' , ['id' => $reservation->id , 'page' => 1]) }}" method="post">@csrf<button type="submit" class="btn btn-danger myfont mymargin">حذف</button></form>
                            </div>

                            @include('include.error')
                            @include('include.ServerError')
                            @include('include.message')


                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{ route('edit.reservation' , ['id' => $reservation->id]) }}" method="post">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="first_name" class="col-md-4 col-lg-3 col-form-label myfont">الاسم الأول</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="first_name" type="text" class="form-control myfont" id="first_name" value="{{ $reservation->first_name }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="last_name" class="col-md-4 col-lg-3 col-form-label myfont">الاسم الأخير</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="last_name" type="text" class="form-control" id="last_name" value="{{ $reservation->last_name }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="date" class="col-md-4 col-lg-3 col-form-label myfont">التاريخ</label>
                                        <div class="col-md-8 col-lg-3">
                                            <input name="date" type="date" class="form-control" id="date" value="{{ $reservation->date }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="time" class="col-md-4 col-lg-3 col-form-label myfont">الوقت</label>
                                        <div class="col-md-8 col-lg-3">
                                            <input type="time" class="form-control" id="time" name="time" value="{{ $reservation->time }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="home_number" class="col-md-4 col-lg-3 col-form-label myfont">رقم الهاتف</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="home_number" type="text" class="form-control myfont" id="home_number" value="{{ $reservation->home_number }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="phone_number" class="col-md-4 col-lg-3 col-form-label myfont">رقم الجوال</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone_number" type="text" class="form-control myfont" id="phone_number" value="{{ $reservation->phone_number }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="reason" class="col-md-4 col-lg-3 col-form-label myfont">السبب</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="reason" type="text" class="form-control myfont" id="reason" value="{{ $reservation->reason }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="notes" class="col-md-4 col-lg-3 col-form-label myfont">الملاحظات</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="notes" type="text" class="form-control myfont" id="notes" value="{{ $reservation->notes }}">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary myfont">حفظ التغييرات</button>
                                    </div>
                                </form>
                                <!-- End Profile Edit Form -->

                            </div>
                        </div>
                    </div>

                </div><!-- End Bordered Tabs -->

            </div>
        </div>

        </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection
