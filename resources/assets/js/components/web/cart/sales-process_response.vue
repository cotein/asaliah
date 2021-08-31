<template>
  <div class="container container-fluid-custom-mobile-padding">
    <h1 class="tt-title-subpages">COMPRA EXITOSA</h1>
    <h2 class="tt-base-color tt-title-subpages small">ORDEN: {{order_object.code}}</h2>
    <h2 class="tt-base-color small">INFORMACIÓN DEL PAGO</h2>
    <div class="tt-box-faq-listing">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <div class="tt-box-faq">
            <ul>
              <li>
                <h5 class="tt-title">ESTADO DEL PAGO: {{Status}}</h5>
              </li>
              <li>
                <h5 class="tt-title">Productos: {{order_object.transaction_amount | currency}}</h5>
              </li>
              <li>
                <h5 class="tt-title">Envío: {{order_object.shipping_amount | currency}}</h5>
              </li>
              <li>
                <h5
                  class="tt-title"
                >Importe total de la operación: {{order_object.total_amount | currency}}</h5>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-12 col-md-6">
          <div class="tt-box-faq">
            <ul>
              <li>
                <h5 class="tt-title">TARJETA: {{order_object.payment_method_id}}</h5>
              </li>
              <li>
                <h5 class="tt-title">NÚMERO: {{order_object.card.number}}</h5>
              </li>
              <li>
                <h5 class="tt-title">AÑO DE EXPIRACIÓN: {{order_object.card.expiration_year}}</h5>
              </li>
              <li>
                <h5 class="tt-title">CUOTAS: {{order_object.installments}}</h5>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <hr class="hr-01" />
    <h2 class="tt-base-color small">LUGAR DE ENTREGA</h2>
    <div class="tt-box-faq-listing">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <div class="tt-box-faq">
            <ul>
              <li>
                <h5 class="tt-title">PAÍS: {{order_object.shipping_location.country}}</h5>
              </li>
              <li>
                <h5 class="tt-title">PROVINCIA: {{order_object.shipping_location.province}}</h5>
              </li>
              <li>
                <h5 class="tt-title">LOCALIDAD: {{order_object.shipping_location.city}}</h5>
              </li>
              <li>
                <h5 class="tt-title">CÓDIGO POSTAL: {{order_object.shipping_location.cp}}</h5>
              </li>
              <li>
                <h5 class="tt-title">CALLE: {{order_object.shipping_location.street_name}}</h5>
              </li>
              <li>
                <h5 class="tt-title">NÚMERO: {{order_object.shipping_location.street_number}}</h5>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-12 col-md-6">
          <div class="tt-box-faq" v-if="order_object.shipping_location.message">
            <h6 class="tt-title">
              <a href="#">NOTA</a>
            </h6>
            {{order_object.shipping_location.message}}
          </div>
        </div>
      </div>
    </div>
    <hr class="hr-01" />
    <h2 class="tt-base-color small">Productos</h2>
    <div class="tt-box-faq-listing">
      <div class="row">
        <div class="col-md-12">
          <div class="tt-shopcart-table-02">
            <table>
              <tbody>
                <tr v-for="(item, index) in order_object.cart_products" :key="index">
                  <td>
                    <div class="tt-product-img">
                      <img
                        :src="item.url"
                        :alt="item.name"
                        class="loaded"
                        data-was-processed="true"
                      />
                    </div>
                  </td>
                  <td>
                    <h2 class="tt-title">
                      <p>{{item.name}}</p>
                    </h2>
                  </td>
                  <td>
                    <div class="tt-price">{{item.quantity}}</div>
                  </td>
                  <td>
                    <div class="tt-price">{{item.price | currency}}</div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["order"],

  data() {
    return {
      order_object: null
    };
  },

  computed: {
    Status() {
      switch (this.order_object.status) {
        case "approved":
          return "APROBADO";
        default:
          break;
      }
    }
  },

  beforeMount() {
    this.order_object = JSON.parse(this.order);
  },

  mounted() {
    if (this.order_object.status == "approved") {
      this.$store.commit("CART_INITIAL_STATUS");
    }
  }
};
</script>