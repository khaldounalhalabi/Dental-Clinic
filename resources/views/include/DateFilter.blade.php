@if(isset($route))
<div class="card" dir="rtl">
        <div class="card-body">
            <h5 class="card-title">بحث</h5>
            <form class="row g-3" action="{{ route($route) }}" method="POST">
                @csrf
                <div class="col-md-4">
                    <label for="start_date" class="form-label myfont">تاريخ البدء</label>
                    <input type="date" id="start_date" name="start_date" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="end_date" class="form-label">تاريخ الانتهاء</label>
                    <input name="end_date" type="date" class="form-control" id="end_date">
                </div>
                <div class="col-md-4" style="margin-top: 5%">
                    <button class="btn btn-primary" type="submit">بحث</button>
                </div>
            </form>
            @include('include.error')
        </div>
    </div>
@endif