<template>
  <div class="text-center">
    <form ref="mercadopago_payment_button" action="/api/mercadopago_callback" method="POST"></form>
  </div>
</template>
<script>
import collect from "collect.js";
import { mapGetters } from "vuex";
export default {
    props: ["ammount"],

    computed: {
        ...mapGetters(["Products", "Cart", "ShippingAmountGetter"]),

        ToArray() {
            return collect(this.Products).toJson();
        },
        
    },

    mounted() {
        
           let script = document.createElement("script");
            script.setAttribute(
                "src",
                "https://www.mercadopago.com.ar/integrations/v1/web-tokenize-checkout.js"
            );
            script.setAttribute("data-button-label", "FINALIZAR COMPRA");
            script.setAttribute(
                "data-public-key",
                "TEST-85428b54-d385-4eef-a8e0-130d809dc871"
            );
            script.setAttribute("data-summary-product", this.ammount);
            script.setAttribute("data-summary-shipping", this.ShippingAmountGetter);
            script.setAttribute(
                "data-transaction-amount",
                this.ammount + this.ShippingAmountGetter
            );

            let input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", "cart");
            input.setAttribute("value", JSON.stringify(this.Cart));

            this.$refs.mercadopago_payment_button.appendChild(input);
            this.$refs.mercadopago_payment_button.appendChild(script);
    
        /* var nodes = document.getElementById("www").getElementsByTagName('*');
            for(var i = 0; i < nodes.length; i++){
                nodes[i].disabled = true;
            } */
    }
};
</script>
<style>
    button.mercadopago-button {
      color: #fff;
      background-color: #007bff;
      border-color: #007bff;
      padding: 0.5rem 1rem;
      font-size: 1rem;
      line-height: 1.5;
      border-radius: 0.3rem;
    }
    button.mercadopago-button:hover {
      color: #fff;
      background-color: #0069d9;
      border-color: #0062cc;
    }
    button.mercadopago-button:focus,
    button.mercadopago-button.focus {
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
    }
    button.mercadopago-button.disabled,
    button.mercadopago-button:disabled {
      color: #fff;
      background-color: #007bff;
      border-color: #007bff;
    }
</style>