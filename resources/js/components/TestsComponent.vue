<template>
    <div class="container-fluid big_box">
        <div class="row text-center">
            <div class="col-10 mx-auto mb-2">  
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p><b>คำชี้แจง</b> ข้อสอบมีทั้งหมด 10 ข้อ จงเลือกคำตอบที่ถูกต้องเพียงหนึ่งข้อ เวลาในการทำ 10 นาที</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-10 mx-auto">  
                <div class="progress mb-2">
                    <div id="percent" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width:40%;" aria-valuemax="100">40%</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['topic'],
    data() {
        return {DataCredits:[]}
    },
    mounted(){
        if(this.topic) {
            axios.get('/api/tests/'+this.topic).then(response=>{
                this.DataCredits = response.data;
                console.log(this.DataCredits)
            });
        }else {
            window.location.href='/setup';
        }
    }
}
</script>

<style>

</style>
