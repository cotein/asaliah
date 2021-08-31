<template>
            
            <li class="conversation-item">
                <div class="conversation-self">
                    <div class="conversation-avatar">
                        <img class="circle" width="36" height="36" src="img/0180441436.jpg" alt="Teddy Wilson">
                    </div>
                    <div class="conversation-messages">
                        <div class="conversation-message">Sed a tellus egestas, venenatis ligula ut, tincidunt lorem.</div>
                        <div class="conversation-message">Mauris eget sem rhoncus, ultrices neque eu, rutrum augue.</div>
                        <div class="conversation-timestamp">10:38:36 PM</div>
                    </div>
                </div>
            </li>
            
            <!-- <li class="conversation-item">
                <div class="conversation-self">
                    <div class="conversation-avatar">
                    <img class="circle" width="36" height="36" src="img/0180441436.jpg" alt="Teddy Wilson">
                    </div>
                    <div class="conversation-messages">
                    <div class="conversation-message">Nulla a sagittis tortor, id imperdiet leo. Vestibulum lacinia et velit sed ultricies. Mauris pulvinar ac mi a consectetur. Sed tempor fermentum felis. Integer ultrices imperdiet magna.</div>
                    <div class="conversation-message">Donec vel sem quis nunc dignissim facilisis id at quam.</div>
                    <div class="conversation-message">Integer scelerisque mauris.</div>
                    <div class="conversation-timestamp">04:25:07 PM</div>
                    <div class="conversation-files">
                        <ul class="file-list">
                        <li class="file">
                            <a class="file-link" href="img/7943544458.jpg" title="7943544458.jpg" download="7943544458.jpg">
                            <div class="file-thumbnail" style="background-image: url(img/7943544458.jpg)"></div>
                            <div class="file-info">
                                <span class="file-ext">jpg</span>
                                <span class="file-name">7943544458.</span>
                            </div>
                            </a>
                        </li>
                        <li class="file">
                            <a class="file-link" href="img/8077136002.jpg" title="8077136002.jpg" download="8077136002.jpg">
                            <div class="file-thumbnail" style="background-image: url(img/8077136002.jpg)"></div>
                            <div class="file-info">
                                <span class="file-ext">jpg</span>
                                <span class="file-name">8077136002.</span>
                            </div>
                            </a>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
            </li> -->
            <!-- <li class="conversation-item">
            <div class="conversation-other">
                <div class="conversation-avatar">
                <img class="circle" width="36" height="36" src="img/0601274412.jpg" alt="Sophia Evans">
                </div>
                <div class="conversation-messages">
                <div class="conversation-message">Phasellus eget tempor turpis. Morbi vitae justo tempor, molestie tellus ultricies rhoncus tortor phasellus vulputate dolor orci.</div>
                <div class="conversation-message">Phasellus fermentum felis rhoncus suscipit vulputate.</div>
                <div class="conversation-message">Curabitur vel mi ante.</div>
                <div class="conversation-timestamp">04:27:55 PM</div>
                </div>
            </div>
            </li> -->
</template>

<script>
    export default {
        
    }
</script>

<style scoped>

.conversation-item {
  display: block;
  margin-bottom: 15px;
  position: relative;
}
.conversation-messages {
  overflow: hidden;
}
.conversation-message {
  border-radius: 4px;
  margin-bottom: 1px;
  margin-top: 1px;
  padding: 6px 12px;
  position: relative;
  word-wrap: break-word;
}
.conversation-message:first-child:after {
  border-color: transparent;
  border-style: solid;
  border-width: 6px;
  content: " ";
  height: 0;
  pointer-events: none;
  position: absolute;
  width: 0;
}
.conversation-timestamp {
  color: #cbcbd2;
  font-size: 11px;
  margin-top: 5px;
}
.conversation-files {
  margin-top: 5px;
}
.conversation-self .conversation-avatar {
  float: left;
}
.conversation-self .conversation-messages {
  padding-left: 15px;
}
.conversation-self .conversation-message {
  background-color: #f5f5f5;
  clear: left;
  color: #3f3f44;
  float: left;
}
.conversation-self .conversation-message:after {
  border-right-color: #f5f5f5;
  right: 100%;
  top: 10px;
}
.conversation-self .conversation-timestamp {
  clear: left;
  float: left;
}
.conversation-self .conversation-files {
  clear: left;
  float: left;
}
.conversation-other .conversation-avatar {
  float: right;
}
.conversation-other .conversation-messages {
  padding-right: 15px;
}
.conversation-other .conversation-message {
  background-color: #1c90fb;
  clear: right;
  color: #fff;
  float: right;
}
.conversation-other .conversation-message:after {
  border-left-color: #1c90fb;
  left: 100%;
  top: 10px;
}
.conversation-other .conversation-timestamp {
  clear: right;
  float: right;
}
.conversation-other .conversation-files {
  clear: right;
  float: right;
}
</style>