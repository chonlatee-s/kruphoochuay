@extends('main')
@section('content')
    @if(\Session::get('topic')!='0')
        <tests-component topic="{{ \Session::get('topic') }}"></tests-component>
    @else
        <div class="alert alert-danger text-center">ไม่สามารถเข้าใช้งานได้ กรุณาเลือกหัวข้อที่ต้องการทดสอบ</div>
    @endif
@endsection