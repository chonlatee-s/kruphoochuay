<template>
    <div>
        <div class="container">
            <div class="row text-center">
                <div class="col-12">   
                    <p class="topicTop">สรุปผลการสอบ</p>
                </div>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-header" style="font-size:16px;"><b>คะแนน</b></div>
            <div class="card-body">
                <div style="font-size:60px; font-weight:500; color:#fe6161;">{{score}} / 10</div>
                <div style="font-size:16px">{{showText}}</div>
            </div>
        </div>
        <br/>
        <div class="card">
            <div class="card-header text-center" style="font-size:16px;"><b>เฉลยข้อสอบ</b></div>
            <div class="card-body">
                <div v-for="(item, index) in answer" :key="item.id">
                    <div style="font-size:16px;"><b>ข้อ {{index+1}} &nbsp;{{item.question}}</b></div>
                    <div style="padding-top:0px; padding-bottom:0px; font-size:14px;"><b><u>ตอบ</u></b> {{item.choice}}</div>
                    <div style="color:#ff3300; font-size:14px;" v-if="item.check==false"><b><u>เฉลย</u></b> {{item.choice_correct}}</div>
                    <div style="font-size:12px; float:right; color:#0077b3; padding-bottom:5px;" v-if="item.ref!='no'">
                        <span v-if="item.check==true">&#10003;</span>
                        <span v-else>&#10007;</span>
                        <a v-bind:href="item.ref" target="_blank">อ้างอิง</a>
                    </div>
                    <div style="font-size:12px; float:right; padding-bottom:5px;" v-else>
                        <span v-if="item.check==true">&#10003;</span>
                        <span v-else>&#10007;</span>
                        <del>อ้างอิง</del>
                    </div>
                    <hr/>
                </div>
                <span style="font-size:12px;">หมายเหตุ จะมีเฉลยข้อที่ผิดเท่านั้น</span>
            </div>
        </div>
    </div>
  
</template>

<script>
export default {
    props:['score','answer','showText']
}
</script>

<style>

</style>
