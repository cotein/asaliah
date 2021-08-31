<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card"   
                :class="{'card-collapsed' : collapse}"
                :aria-expanded="(!collapse)?'true':'false'"
                v-if="data.attributes.length > 0 ">
                <div class="card-header" >
                    Attributos
                    <span class="pull-right">
                        <strong>{{data.title}}</strong>
                    </span>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="col-md-3" v-for="(attr, index) in data.attributes" :key="index">
                            <div v-if="attr.value_name != null"
                                class="panel text-center" 
                                style="height: 71px;"
                                >
                                <h5>{{attr.name}}</h5>
                                <span class="label label-default">{{attr.value_name}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import auth from './../../../../../mixins/auth';
    import toast_mixin from './../../../../../mixins/toast-mixin';
    export default {
        props: ['data'],
        mixins : [auth, toast_mixin],
        data() {
            return {
                collapse : false
            }
        },
       
    }
</script>
