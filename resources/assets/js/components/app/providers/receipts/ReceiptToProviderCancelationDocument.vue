<template>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-default">
                        <strong>DOCUMENTOS DE PAGO </strong>
                        <button 
                            class="btn btn-primary btn-sm pull-right" 
                            type="button"
                            @click="add_cancelation_document"
                            >Agregar documento</button>
                    </div>
                    <div class="card-body">
                        <ReceiptToProviderCancelationDocumentRow v-for="(document, index) in ReceiptToProvidersCancelationDocumentsGetters" :key="index" :number="index" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import ReceiptToProviderCancelationDocumentRow from './ReceiptToProviderCancelationDocumentRow';
    export default {
        props : ['number'],
        components : {ReceiptToProviderCancelationDocumentRow},

        methods : {

            add_cancelation_document()
            {
                this.$store.commit('RECEIPT_TO_PROVIDERS_ADD_CANCELATION_DOCUMENT');
            }
        },

        computed : {

            ...mapGetters(
                [
                    'ReceiptToProvidersCancelationDocumentsGetters'
                ]
            )
        }
    }
</script>

<style lang="scss" scoped>
    .center--vertical {
        vertical-align: middle;
    }
</style>