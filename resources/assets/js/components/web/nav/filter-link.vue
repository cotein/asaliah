<template>
  <li v-if="filter.show">
    <a @click.stop="apply_filter()" href="#">{{filter.value_name}}</a>
  </li>
</template>

<script>
import { mapGetters } from "vuex";
import { collect } from "collect.js";
import HandlerAttributeCombinations from "./../../../src/HandlerAttributeCombinations";
export default {
  props: ["filter"],
  data() {
    return {};
  },

  methods: {
    apply_filter() {
      this.$store.commit("ADD_FILTER", this.filter);

      this.filter.show = false;

      this.$store.commit("FORCE_INIT_PAGINATION");

      setTimeout(() => {
        this.$store
          .dispatch("filtered_data")
          .then(result => {
            this.$store.commit("CLEAR_PUBLICATIONS");

            this.$store.commit(
              "SET_PUBLICATIONS_WEB_WITH_PAGINATION",
              result.data.data
            );

            this.$store.commit("SET_PAGINATION", result.data.pagination);
          })
          .catch(err => {});
      }, 150);
    }
  },

  computed: {
    ...mapGetters(["PublicationsWeb"])
  },

  mounted() {
    /*  console.log('sssssssssssssssssssssssssssssssssssssssssssssssssssss');
        setTimeout(() => {
            console.log(this.filter);
        }, 150); */
  }
};
</script>
<style scoped>
</style>
    