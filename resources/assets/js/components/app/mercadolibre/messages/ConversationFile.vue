<template>
    <div>

    </div>
</template>

<script>
    export default {
        
    }
</script>

<style  scoped>
.messenger-welcome {
  -webkit-animation-duration: 1s;
       -o-animation-duration: 1s;
          animation-duration: 1s;
  -webkit-animation-fill-mode: both;
       -o-animation-fill-mode: both;
          animation-fill-mode: both;
  -webkit-animation-name: fadeInRight;
       -o-animation-name: fadeInRight;
          animation-name: fadeInRight;
  display: none;
  text-align: center;
}
.messenger-welcome-body {
  display: table;
  height: 100%;
  table-layout: fixed;
  width: 100%;
}
.messenger-welcome-inner {
  display: table-cell;
  height: 100%;
  padding-bottom: 45px;
  padding-top: 45px;
  vertical-align: middle;
  width: 100%;
}
.messenger-welcome {
    bottom: 0;
    display: block;
    left: 280px;
    overflow-x: hidden;
    overflow-y: auto;
    position: absolute;
    right: 0;
    top: 0;
  }
  .messenger-content.active ~ .messenger-welcome {
    display: none;
  }
</style>