<template>
    <div class="container-fluid">
            <div class="row" id="predict">
                <div class="col-sm-12 col-md-12 text-center"> 
                    <div class="card bg-light mb-3 mx-auto" style="max-width: 45rem;">
                        <div class="card-header"><span>กำลังเสี่ยงทาย</span></div>
                        <div class="card-body text-secondary">
                            <p style="font-size:18px; color:#82528b" class="card-title"></p>
                            <i class="fa fa-spinner fa-spin" style="font-size:35px"></i>
                            <p class="card-text text-left" style="color:gray; font-weight: 300; font-size:18px">
                                <input type="text" v-model="result">
                            </p>
                            <p style="font-size:12px; color:gray;" class="text-right ref"><u>ที่มา</u> วัดหนองบัว จังหวัดอุบลราชธานี</p>
                        </div>
                    </div>
                </div>         
            </div>
        </div>
</template>

<script>
export default {
    mounted() {
        setTimeout(function () {
            var number = Math.floor((Math.random() * 28) + 1);
            axios.get('/api/predicts/'+number)
            .then(response=>{
                var data = response.data;
                this.id = data.id;
                this.result = data.result;
            });
        }, 3000);
    },
    data() {
        return {id:'',result:''}
    }
}
</script>

<style>

</style>
