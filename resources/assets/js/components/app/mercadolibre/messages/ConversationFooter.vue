<template>
    <div class="messenger-content-footer">
        <div class="messenger-content-footer-inner">
            <div class="messenger-compose">
            <div class="messenger-compose-actions">
                <div class="messenger-compose-action">
                <label class="btn btn-link link-muted file-upload-btn">
                    <span class="icon icon-picture-o icon-lg"></span>
                    <input class="file-upload-input" type="file" name="messenger_compose_file">
                </label>
                </div>
                <div class="messenger-compose-action">
                <button class="btn btn-link link-muted" type="button">
                    <span class="icon icon-smile-o icon-lg"></span>
                </button>
                </div>
                <div class="messenger-compose-action">
                <button class="btn btn-link" type="button">Send</button>
                </div>
            </div>
            <div class="messenger-compose-message">
                <textarea class="messenger-compose-input" name="messenger_compose_message" placeholder="Type a message..."></textarea>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style scoped>
.messenger-content-footer {
  border-collapse: collapse;
  display: table-row;
}
.messenger-content-footer-inner {
  display: table-cell;
  height: 0;
  width: 100%;
}
.messenger-compose {
  background-color: #fff;
  border-top: 1px solid #e7e7ec;
  padding: 10px 15px;
}
.messenger-compose-actions {
  float: right;
  margin-left: 15px;
}
.messenger-compose-action {
  float: left;
}
.messenger-compose-message {
  overflow: hidden;
}
.messenger-compose-input {
  background-color: #fff;
  background-image: none;
  border: none;
  color: #7d7d8e;
  display: block;
  font-size: 13px;
  line-height: 1.538462;
  max-height: 100px;
  min-height: 40px;
  outline: none;
  padding: 0;
  width: 100%;
}
</style>