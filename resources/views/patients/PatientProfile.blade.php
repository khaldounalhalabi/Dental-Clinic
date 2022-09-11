@extends('layout')
@section('content')

<style>
    .wholecard {
        width: 120%;
    }

    .mymargin {
        margin-top: 10px;
    }
</style>
<main id="main" class="main wholecard">

    <div class="pagetitle">
        <h1 class="myfont"> معلومات المريض</h1>
        <h2>{{ $patient->first_name }} {{ $patient->last_name }}</h2>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">


            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active myfont" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">الإضبارة</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link myfont" data-bs-toggle="tab"
                                    data-bs-target="#profile-edit">تعديل الإضبارة</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">
                            <h5 class="card-title myfont">معلومات المريض</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label myfont">الاسم الكامل</div>
                                <div class="col-lg-9 col-md-8 myfont">{{ $patient->first_name }} {{ $patient->last_name
                                    }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label myfont">تاريخ الميلاد</div>
                                <div class="col-lg-9 col-md-8 myfont">{{ date('Y/m/d' , strtotime($patient->birth_date))
                                    }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label myfont">العمر</div>
                                <div class="col-lg-9 col-md-8 myfont">{{ $age }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label myfont">رقم الهاتف</div>
                                <div class="col-lg-9 col-md-8 myfont">{{ $patient->home_number }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label myfont">رقم الجوال</div>
                                <div class="col-lg-9 col-md-8 myfont">{{ $patient->phone_number }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label myfont">العنوان</div>
                                <div class="col-lg-9 col-md-8 myfont">{{ $patient->city }} - {{ $patient->street }}
                                </div>
                            </div>

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title myfont">ملاحظات</h5>
                                <p class="small fst-italic myfont">{{ $patient->notes }}</p>
                            </div>
                            <div class="text-center">
                                <form action="{{ route('delete.patient' , ['id' => $patient->id , 'page' => 1]) }}"
                                    method="post">@csrf<button type="submit"
                                        class="btn btn-danger myfont mymargin">حذف</button></form>
                            </div>
                            <div class="text-center">
                                <form action="{{route('visit.page' , ['id' => $patient->id]) }}" method="get">
                                    @csrf<button type="submit" class="btn btn-primary myfont mymargin">زيارة</button>
                                </form>
                            </div>
                            <div class="text-center">
                                <form action="{{route('patient.visits' , ['id' => $patient->id]) }}" method="get">
                                    @csrf<button type="submit" class="btn btn-primary myfont mymargin">الزيارات</button>
                                </form>
                            </div>
                            <div class="text-center">
                                <form action="{{route('patient.reservations' , ['id' => $patient->id]) }}" method="get">
                                    @csrf<button type="submit" class="btn btn-primary myfont mymargin">الحجوزات</button>
                                </form>
                            </div>
                            @foreach($patient->images as $img)

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label myfont">الصور</div>
                                <img src="{{ url('/storage') }}/{{ $img->image }}" class="img-fluid">
                            </div>

                            @endforeach



                            @include('include.error')


                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{ route('edit.patient' , ['id' => $patient->id]) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="first_name" class="col-md-4 col-lg-3 col-form-label myfont">الاسم
                                            الأول</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="first_name" type="text" class="form-control myfont"
                                                id="first_name" value="{{ $patient->first_name }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="last_name" class="col-md-4 col-lg-3 col-form-label myfont">الاسم
                                            الأخير</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="last_name" type="text" class="form-control" id="last_name"
                                                value="{{ $patient->last_name }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="notes"
                                            class="col-md-4 col-lg-3 col-form-label myfont">ملاحظات</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="notes" class="form-control myfont" id="notes"
                                                style="height: 100px">{{ $patient->notes }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="birth_date"
                                            class="col-md-4 col-lg-3 col-form-label myfont">التاريخ</label>
                                        <div class="col-md-8 col-lg-3">
                                            <input name="birth_date" type="date" class="form-control" id="birth_date"
                                                value="{{ date('Y/m/d' , strtotime($patient->birth_date)) }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="home_number" class="col-md-4 col-lg-3 col-form-label myfont">رقم
                                            الهاتف</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="home_number" type="text" class="form-control myfont"
                                                id="home_number" value="{{ $patient->home_number }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="phone_number" class="col-md-4 col-lg-3 col-form-label myfont">رقم
                                            الجوال</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone_number" type="text" class="form-control myfont"
                                                id="phone_number" value="{{ $patient->phone_number }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="city"
                                            class="col-md-4 col-lg-3 col-form-label myfont">المدينة</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="city" type="text" class="form-control myfont" id="city"
                                                value="{{ $patient->city }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="street"
                                            class="col-md-4 col-lg-3 col-form-label myfont">الشارع</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="street" type="text" class="form-control myfont" id="street"
                                                value="{{ $patient->street }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="image" class="col-md-4 col-lg-3 col-form-label myfont">تحميل
                                            صورة</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input id="image" name="image" class="form-control" type="file">
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
