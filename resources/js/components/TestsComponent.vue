<template>
    <div class="container-fluid big_box">
        <div class="row text-center">
            <div class="col-md-10 col-sm-12 mx-auto mb-2">  
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p><b><u>คำชี้แจง</u></b> ข้อสอบมีทั้งหมด 10 ข้อ เวลาในการทำ 10 นาที จงเลือกคำตอบที่ถูกต้องเพียงหนึ่งข้อ </p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-sm-12 mx-auto"> 
                <div class="progress mb-2">
                    <div id="percent" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width:40%;" aria-valuemax="100">{{percent}}</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-sm-12 mx-auto">
                <div class="card text-white " style="background-color:#6699cc">
                    <div class="card-header text-center xzyTime">เริ่มจับเวลา</div>
                    <div class="card-body" style="background-color:#3399cc">
                        <table>
                            <tr><td>{{DataCredits[arr].question}}</td></tr>
                            <tr><td><input type="radio" name="choice" v-bind:value="DataCredits[arr].id+'|1'" v-model="answer" @change="pushAnswer()"> {{DataCredits[arr].ch1}}</td></tr>
                            <tr><td><input type="radio" name="choice" v-bind:value="DataCredits[arr].id+'|2'" v-model="answer" @change="pushAnswer()"> {{DataCredits[arr].ch2}}</td></tr>
                            <tr><td><input type="radio" name="choice" v-bind:value="DataCredits[arr].id+'|3'" v-model="answer" @change="pushAnswer()"> {{DataCredits[arr].ch3}}</td></tr>
                            <tr><td><input type="radio" name="choice" v-bind:value="DataCredits[arr].id+'|4'" v-model="answer" @change="pushAnswer()"> {{DataCredits[arr].ch4}}</td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-10 col-sm-12 mx-auto">
                <!-- <button type="button" class="btn btn_ btn-outline-info btn-sm" v-on:click="prev()"><i class="material-icons">keyboard_arrow_left</i></button>
                <button type="button" class="btn btn_ btn-outline-info btn-sm" v-on:click="next()"><i class="material-icons">keyboard_arrow_right</i></button> -->
                <!-- <div class="row">
                    <div class="col-4 text-left"><button type="button" class="btn btn_ btn-outline-info btn-sm" v-on:click="prev()">&laquo;</button></div>
                    <div class="col-4 text-center"><p style="color:gray; font-size:12px; font-weight:200; margin-right:0px;">หมวดวิชาภาค ก</p></div>
                    <div class="col-4 text-right"><button type="button" class="btn btn_ btn-outline-info btn-sm" v-on:click="next()">&raquo;</button></div>
                </div> -->
                <!-- <p class="text-right" style="color:gray; font-size:12px; font-weight:200; margin-right:0px;">หมวดวิชาภาค ก</p> -->

         
                    <ul class="pagination pagination-sm justify-content-center">
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous" v-on:click="prev()">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">หมวดวิชาภาค ก</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next" v-on:click="next()">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                        </li>
                    </ul>
               
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
            percent:50,
            dataAll:[{ arr:0, answer:'', id:'', answerTure:'' }]
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
    },
    methods: {
        next() {
            this.arr++;
            if(!this.dataAll[this.arr]) {
                if(document.querySelector('input[name="choice"]:checked')){
                    document.querySelector('input[name="choice"]:checked').checked = false;
                    this.percent += 10;
                }
                // this.answer=false;
            }
            else {
                this.answer=this.dataAll[this.arr].answer;
            }
        },
        prev() {
            this.arr--;
            this.answer=this.dataAll[this.arr].answer;
        },
        pushAnswer() {
            var theAnswerTrue = this.answer.split('|');
            if(!this.dataAll[this.arr]) {
                this.dataAll.push({ arr:this.arr, answer:this.answer, id:theAnswerTrue[0], answerTure:theAnswerTrue[1] })
            }
            else {
                this.dataAll.splice(this.arr, 1, {arr:this.arr, answer:this.answer, id:theAnswerTrue[0], answerTure:theAnswerTrue[1]})
            }
            this.next();
        }
    }
}
</script>

<style>
    .btn_{
        padding-top:0px;
        padding-bottom:0px;
    }
</style>
