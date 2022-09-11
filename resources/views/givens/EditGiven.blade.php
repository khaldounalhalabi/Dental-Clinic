@extends('layout')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1 class="myfont">تعديل بيانات سند دفع</h1>
    </div><!-- End Page Title -->
    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- add reservation -->
                        @if(isset($id)&&isset($value)&&isset($description)&&isset($date)&&isset($time))
                        <form action="{{ URL::route('edit.given' , ['id'=>$id]) }}" method="post">
                            @csrf
                            <div class="row mb-3">
                                <label for="value" class="col-md-4 col-lg-3 col-form-label myfont">القيمة</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="value" type="text" class="form-control myfont" id="value"
                                        value="{{ $value }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-lg-3 col-form-label myfont">البيان</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="description" type="text" class="form-control" id="description"
                                        value="{{ $description }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="date" class="col-md-4 col-lg-3 col-form-label myfont">التاريخ</label>
                                <div class="col-md-8 col-lg-3">
                                    <input name="date" type="date" class="form-control" id="date" value="{{ $date }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="time" class="col-md-4 col-lg-3 col-form-label myfont">الوقت</label>
                                <div class="col-md-8 col-lg-3">
                                    <input type="time" class="form-control" id="time" name="time" value="{{ $time }}">
                                </div
                            </div>



                            <div class="text-center">
                                <button type="submit" class="btn btn-primary myfont">حفظ التغييرات</button>
                            </div>
                        </form>
                        @endif
                        @include('include.error')
                        <!-- End add reservation -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


@endsection
