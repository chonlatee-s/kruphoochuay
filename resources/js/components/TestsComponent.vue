<template>
    <div class="container-fluid big_box">
        <div class="row text-center">
            <div class="col-md-10 col-sm-12 mx-auto mb-2">  
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p><b><u>คำชี้แจง</u></b> ข้อสอบมีทั้งหมด 10 ข้อ เวลาในการทำ 10 นาที จงเลือกคำตอบที่ถูกต้องเพียงข้อเดียว </p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-sm-12 mx-auto"> 
                <div class="progress mb-2">
                    <div id="percent" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width:0%;" aria-valuemax="100">{{percent}}</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-sm-12 mx-auto">
                <div class="card text-white " style="background-color:#336699">
                    <div class="card-header text-center clock">เริ่มจับเวลา</div>
                    <div class="card-body" style="background-color:#3973ac">
                        <table>
                            <tr><td class="question">ข้อ {{arr+1}} &nbsp;{{DataCredits[arr].question}}</td></tr>
                            <tr><td class="choice"><input type="radio" name="choice" v-bind:value="DataCredits[arr].id+'|1'" v-model="answer" @change="pushData()"> <span class="choice_sub"> &nbsp;&nbsp;{{DataCredits[arr].ch1}}</span></td></tr>
                            <tr><td class="choice"><input type="radio" name="choice" v-bind:value="DataCredits[arr].id+'|2'" v-model="answer" @change="pushData()"> <span class="choice_sub"> &nbsp;&nbsp;{{DataCredits[arr].ch2}}</span></td></tr>
                            <tr><td class="choice"><input type="radio" name="choice" v-bind:value="DataCredits[arr].id+'|3'" v-model="answer" @change="pushData()"> <span class="choice_sub"> &nbsp;&nbsp;{{DataCredits[arr].ch3}}</span></td></tr>
                            <tr><td class="choice"><input type="radio" name="choice" v-bind:value="DataCredits[arr].id+'|4'" v-model="answer" @change="pushData()"> <span class="choice_sub"> &nbsp;&nbsp;{{DataCredits[arr].ch4}}</span></td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-10 col-sm-12 mx-auto">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-sm justify-content-center">
                        <li class="page-item disabled" v-if="arr==0">
                            <a class="page-link" href="#" aria-label="Previous" v-on:click="prev()">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item" v-else>
                            <a class="page-link" href="#" aria-label="Previous" v-on:click="prev()">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        
                        <li class="page-item"><a class="page-link" href="#">หมวดวิชาภาค ก</a></li>

                        <li class="page-item disabled" v-if="arr==9">
                            <a class="page-link" href="#" aria-label="Next" v-on:click="next()">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                        <li class="page-item" v-else>
                            <a class="page-link" href="#" aria-label="Next" v-on:click="next()">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    props:['topic'],
    data() {
        return {
            DataCredits:[{id:'', question:'', ch1:'', ch2:'', ch3:'', ch4:''}],
            arr:0,
            answer:'',
            percent:0,
            dataAll:[{ arr:'', id:'', answerTure:'', answer:'' }]
        }
    },
    mounted(){
        if(this.topic) {
            axios.get('/api/tests/'+this.topic).then(response=>{
                this.DataCredits = response.data;
            });
        }else {
            // window.location.href='/setup';
        }
        this.setTimeX();
    },
    methods: {
        pushData() {
            var theAnswerTrue = this.answer.split('|');
            this.dataAll.splice(this.arr, 1, {arr:this.arr, id:theAnswerTrue[0], answerTure:theAnswerTrue[1], answer:this.answer })
            this.percent = this.dataAll.length * 10;
            this.checkPercent();
            this.next();
        },
        checkPercent(){
            if(this.percent==10){$("#percent").removeClass("progress-bar").addClass("progress-bar progress-bar-striped progress-bar-animated bg-danger"); }
            if(this.percent==40){$("#percent").removeClass("bg-danger").addClass("progress-bar progress-bar-striped progress-bar-animated bg-bg-info"); }
            if(this.percent==80){$("#percent").removeClass("bg-bg-info").addClass("progress-bar progress-bar-striped progress-bar-animated bg-success"); }
            $("#percent").css("width", this.percent+"%");
            $("#percent").html(this.percent+"%");
        },
        next() {
             if(this.arr+1 != 10) this.arr++; // เช็คว่าถึงตำแหน่งสุดท้ายของอาร์เรย์หรือยัง ถ้าครบแล้วไม่ต้องบวกเพิ่ม
             if(this.arr<=9){
                if(!this.dataAll[this.arr]){ // ถ้าไม่มีข้อมูลในอาเรย์ตำแหน่งนี้หรือยัง
                    this.dataAll.push({arr:this.arr, id:'', answerTure:'', answer:''})
                    this.clearRario();
                }else{
                    if(this.dataAll[this.arr].answer) this.answer = this.dataAll[this.arr].answer;
                    else this.clearRario();
                }
            }
        },
        
        prev() {
            this.arr--;
            if(this.arr>=0){
                if(this.dataAll[this.arr].answer){ // ถ้าตำแหน่งนี้มีการป้อนค่าแล้วค่อยนำมาแสดง
                    this.answer=this.dataAll[this.arr].answer;
                }
            }
        },
        clearRario(){
            if(document.querySelector('input[name="choice"]:checked')){
                document.querySelector('input[name="choice"]:checked').checked = false;
            }
        },
        /////////////////////////////////////////// time
        setTimeX(){
        	var myVar = setInterval(myTimer, 1000);
            var m = 9, sec = 60;
            function myTimer() {
                if (sec != 0) sec = sec - 1;
                else {
                    if (m == 0) { 
                        myStopFunction(); 
                        // if(xxx==100){ sendAnswer(); alert('หมดเวลาในการทำแบบทดสอบ'); } ใช้ตอนกดปุ่ม เดี๋ยวค่อยดู
                    }
                    m = m - 1; sec = 60;
                }
                if(m== (-1) ) $(".clock").html("หมดเวลาในการทำแบบทดสอบ");
                else {
                    if(m==0) $(".clock").html('เหลือเวลา '+sec+" วินาที");
                    else $(".clock").html('เหลือเวลา '+m+" นาที "+sec+" วินาที");
                }
            }

            function myStopFunction() {
                clearInterval(myVar);
            }
        }
    }
}
</script>

<style>
    .btn_{padding-top:0px;padding-bottom:0px;}
    .question{font-size: 18px;padding-bottom:10px;}
    .choice{font-size: 16px;padding-left:10px;}
    .clock{font-size: 24px;}
    .choice_sub{padding-left: 10px;}
    input[type='radio'] { transform: scale(1.5); }
</style>
