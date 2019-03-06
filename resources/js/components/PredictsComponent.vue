
<template>
    <div class="container-fluid big_box">
        <div class="row text-center">
            <div class="col-12">   
                <p class="topicTop">ให้เซียมซีทำนายกัน</p>
            </div>
        </div>
        <div class="row text-center" id="main">
            <div class="col-12">
                <p class="text-center">
                    <i class="material-icons" style="font-size:80px; color:#fe6161">device_unknown</i>
                </p>
                <p style="color:#fe6161">ตั้งจิตอธิษฐาน</p>
                <span><mark>เขย่าโทรศัพท์เสี่ยงทายจนกว่าจะรู้ผล</mark></span>
                <p style="font-size:12px; color:gray; margin-top:5px;">ใช้บราวเซอร์ Google Chrome ผู้ที่ใช้คอมพิวเตอร์ <a href="#" id="btn_oncom">คลิกที่นี่</a></p>
            </div>
        </div>

        <div id="predict">
            <div class="row">
                <div class="col-sm-12 col-md-12 text-center"> 
                    <div class="card bg-light mb-3 mx-auto" style="max-width: 45rem;">
                        <div class="card-header"><span id="showing">กำลังเสี่ยงทาย</span></div>
                        <div class="card-body text-secondary">
                            <p style="font-size:18px; color:#82528b" class="card-title"></p>
                            <i class="fa fa-spinner fa-spin" style="font-size:35px" id="animate"></i>
                            <p class="card-text text-left" style="color:gray; font-weight: 300; font-size:18px" id="result"></p>
                            <p style="font-size:12px; color:gray;" class="text-right ref" id="ref"><u>ที่มา</u> วัดหนองบัว จังหวัดอุบลราชธานี</p>
                        </div>
                    </div>
                </div>         
            </div>
        </div>
    </div>
</template>

<script>
$(document).ready(function(){
    $('#predict').hide();
    // shake
    var shakeEvent = new Shake({threshold: 15});
    shakeEvent.start();
    var count=1;
    window.addEventListener('shake', function(){
        count+=1;
        if(count==2) {
            stopShake(); // หยุดการสั่นเมื่อได้ผลลัพธ์
            predict_fn(); // ทำงานฟังก์ชันทำนาย
        }
    }, false);

    function stopShake(){
        shakeEvent.stop();
    }
    
    function predict_fn(){
        $('#predict').show();
        $('#ref,#main').hide();

        setTimeout(function () {
            var number = Math.floor((Math.random() * 28) + 1);
            axios.get('/api/predicts/'+number)
            .then(response=>{
                var data = response.data;
                var result = data.result;
                var number = data.id;
                $('#animate').hide();
                $('#ref').show();
                $('#showing').html('คุณได้เซียมซีใบที่ '+number);
                $('#result').html(result);
            });
        }, 3000);
    }

    $('#btn_oncom').click(function(){
        predict_fn();
    });
});
export default {

}
</script>
<style>
    mark{
        background-color:#7e6296;
        color:#ffffff;
        opacity:0.8;
    }
</style>
