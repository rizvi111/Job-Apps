<template>
    <div>

    <button v-if="show" @click.prevent="unsave()" class="btn btn-warning">Unsave</button>
    <button v-else @click.prevent="save()" class="btn btn-warning">Save</button>

    </div>
</template>

<script>
    export default {
        props:['jobid','faborited'],
        mounted() {
            this.show = this.faborited ? true:false
        },
        data(){
            return{
                'show':true
            }
        },
        methods:{
            save(){
                axios.post('/save/'+this.jobid)
                    .then(response=>this.show=true)
                    .catch(error=>alert('Error Hoise'))
            },
            unsave(){
                axios.post('/unsave/'+this.jobid)
                    .then(response=>this.show=false)
                    .catch(error=>alert('Error Hoise'))
            }
        }
    }
</script>
