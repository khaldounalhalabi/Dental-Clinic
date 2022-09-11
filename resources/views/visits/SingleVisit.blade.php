@extends('layout')
@section('content')

<style>
    .wholecard {
        width: 120%;
    }

</style>
<main id="main" class="main wholecard">

    <div class="pagetitle">
      <h1 class="myfont">زيارة</h1>
      <h2>{{  $visit->patient->first_name }} {{ $visit->patient->last_name }}</h2>
    </div><!-- End Page Title -->


    <section class="section profile">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active myfont" data-bs-toggle="tab" data-bs-target="#profile-overview">الزيارة</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link myfont" data-bs-toggle="tab" data-bs-target="#profile-edit">تعديل الزيارة</button>
                            </li>

                        </ul>

                        <div class="tab-content pt-2">
                            <h5 class="card-title myfont">معلومات الزيارة</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label myfont">نوع الزيارة</div>
                                <div class="col-lg-9 col-md-8 myfont">{{ $visit->type }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label myfont">الاسم الكامل</div>
                                <div class="col-lg-9 col-md-8 myfont"><a href="{{ route('patient' , ['id'=>$visit->patient_id]) }}"> {{  $visit->patient->first_name }} {{
                                    $visit->patient->last_name }}</a></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label myfont">التاريخ</div>
                                <div class="col-lg-9 col-md-8 myfont">{{ date('Y/m/d' , strtotime($visit->date)) }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label myfont">الوقت</div>
                                <div class="col-lg-9 col-md-8 myfont">{{ date('h:i a' , strtotime($visit->time)) }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label myfont">الوصفة</div>
                                <div class="col-lg-9 col-md-8 myfont">{{ $visit->prescription }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label myfont">الإجراء</div>
                                <div class="col-lg-9 col-md-8 myfont">{{ $visit->procedure }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label myfont">الوصف</div>
                                <div class="col-lg-9 col-md-8 myfont">{{ $visit->description }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label myfont">الكلفة</div>
                                <div class="col-lg-9 col-md-8 myfont">{{ $visit->cost }}
                                </div>
                            </div>



                            @include('include.error')
                            @include('include.ServerError')
                            @include('include.message')





                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{ route('edit.visit' , ['id' => $visit->id]) }}" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="type" class="col-md-4 col-lg-3 col-form-label myfont">النوع</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="type" type="text" class="form-control myfont" id="type" value="{{ $visit->type }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="description" class="col-md-4 col-lg-3 col-form-label myfont">الوصف</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="description" type="text" class="form-control" id="description" value="{{ $visit->description }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="prescription" class="col-md-4 col-lg-3 col-form-label myfont">الوصفة</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="prescription" class="form-control myfont" id="prescription" style="height: 100px">{{ $visit->prescription }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="procedure" class="col-md-4 col-lg-3 col-form-label myfont">الإجراء</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="procedure" type="text" class="form-control myfont" id="procedure" value="{{ $visit->procedure }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="cost" class="col-md-4 col-lg-3 col-form-label myfont">الكلفة</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="cost" type="text" class="form-control myfont" id="cost" value="{{ $visit->cost }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="date" class="col-md-4 col-lg-3 col-form-label myfont">التاريخ</label>
                                        <div class="col-md-8 col-lg-3">
                                            <input name="date" type="date" class="form-control" id="date" value="{{ $visit->date }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="time" class="col-md-4 col-lg-3 col-form-label myfont">الوقت</label>
                                        <div class="col-md-8 col-lg-3">
                                            <input type="time" class="form-control" id="time" name="time" value="{{ $visit->time }}">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary myfont ">حفظ التغييرات</button>
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
