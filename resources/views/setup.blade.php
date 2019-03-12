@extends('main')
@section('content')
    {{-- <setup-component></setup-component> --}}
    <div class="container-fluid big_box">
        <div>
            <div class="row text-center">
                <div class="col-12">
                    <h2 class="topicTop">ฝึกทำข้อสอบ</h2>
                </div>
            </div>
        </div>
        <div>
            <form method="POST" action="{{url('tests')}}">
                {{ csrf_field() }}
                <div class="row mb-2">
                    <div class="col-md-6 mx-auto">
                    <p class="text-center"></p> 
                        <div class="form-group">            
                            <select class="custom-select mb-3 text-center" name="topic" id="topic">
                                <option value="0">กรุณาเลือกหัวข้อที่ต้องการทดสอบ</option>
                                <option value="1">หมวดวิชาภาค ก</option>
                                <option value="2">หมวดวิชาภาค ข</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6 mx-auto">
                        <button class="btn btn-primary button">
                            เริ่มทำแบบทดสอบ
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
