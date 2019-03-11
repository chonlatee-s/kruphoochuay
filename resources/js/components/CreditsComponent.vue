<template>
<div class="container-fluid big_box">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">   
                <p class="topicTop">รายชื่อผู้ร่วมแบ่งปันความรู้</p>
            </div>
        </div>
    </div>

    <div class="">
        <div class="row">
            <div class="col-md-10 col-sm-12 mx-auto">   
                <table id="myTable" class="table table-bordered table-striped table-sm">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>สถานที่เรียน / ทำงาน</th>
                        </tr>
                    </thead>
                    <tbody class="bodytable">
                        <tr v-for="credit in DataCredits" :key="credit.id">
                            <td class="text-center" v-if="credit.id != 0">{{credit.id}}</td>
                            <td v-else>ไม่พบข้อมูล</td>
                            <td>{{credit.name}}</td>
                            <td>{{credit.place}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-10 mx-auto">
                <p>หากต้องการร่วมสร้างสังคมแห่งการแบ่งปัน ติดต่อผู้ดูแลเว็บไซต์ได้ที่อีเมล <a href="mailto:kruphoochuay@gmail.com?Subject=สวัสดี" target="_top">kruphoochuay@gmail.com</a></p>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            DataCredits:[{id:0, name:'', place:''}] 
        }
    },
    mounted() {
        axios.get('/api/credits/').then(response=>{
            this.DataCredits = response.data;
        });
    }
}
</script>
<style>

</style>
