<template>
    <div>
        <input type="text"
               placeholder="What Are You Dekte chan?"
               class="form-control" v-on:keyup="searcJob" v-model="keyword">

        <div class="card-footer" v-if="results.length">
            <ul class="list-group" v-for="result in results">
                <li class="list-group-item">
                    <a style="color:black" :href=" '/jobs/'+result.id+'/'+result.slug+'/' ">
                        {{result.title}}<br>
                        <small class="badge badge-warning">{{result.position}}</small>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                keyword:'',
                results:[]
            }
        },
        methods:{
            searcJob(){
                this.results =[];
                if(this.keyword.length > 1){
                    axios.get('/jobs/search',{params:{keyword: this.keyword}})
                        .then(response=>{
                           this.results = response.data
                        });
                }
            }
        }
    }

















</script>
