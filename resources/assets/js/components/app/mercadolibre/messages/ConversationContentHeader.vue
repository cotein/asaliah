<template>
    <div class="messenger-content-header-inner">
        <div class="messenger-toolbar">
            <div class="messenger-toolbar-tools pull-xs-left">
                <div class="btn-group hidden-md hidden-lg">
                <button class="btn btn-link link-muted" title="Back to Contacts" data-target="#contacts" data-toggle="tab" type="button" aria-expanded="true">
                    <span class="icon icon-caret-left icon-lg icon-fw"></span>
                    Contacts
                </button>
                </div>
                <div class="btn-group hidden-xs hidden-sm">
                <button class="btn btn-link link-muted" title="" data-container="body" data-trigger="hover" data-placement="bottom" data-toggle="tooltip" type="button" data-original-title="Start group with Sophia Evans">
                    <span class="icon icon-users icon-lg icon-fw"></span>
                    Sophia Evans
                </button>
                </div>
            </div>
            <div class="messenger-toolbar-tools pull-xs-right">
                <div class="btn-group">
                <button class="btn btn-link link-muted" type="button">
                    <span class="icon icon-phone icon-lg icon-fw"></span>
                    <span class="visible-lg-inline">Start a voice call</span>
                </button>
                <button class="btn btn-link link-muted" type="button">
                    <span class="icon icon-video-camera icon-lg icon-fw"></span>
                    <span class="visible-lg-inline">Start a video call</span>
                </button>
                <div class="btn-group dropdown">
                    <button class="btn btn-link link-muted" aria-haspopup="true" data-toggle="dropdown" type="button" aria-expanded="false">
                    <span class="icon icon-cog icon-lg icon-fw"></span>
                    <span class="visible-lg-inline">Settings</span>
                    <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#">Mute Notifications</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Mark as Unread</a></li>
                    <li><a href="#">Mark as Spam</a></li>
                    </ul>
                </div>
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
.messenger-content-header-inner {
  display: table-cell;
  height: 0;
  width: 100%;
}
.messenger-toolbar {
  background-color: #fff;
  border-bottom: 1px solid #e7e7ec;
}
.messenger-toolbar:before,
.messenger-toolbar:after {
  content: " ";
  display: table;
}
.messenger-toolbar:after {
  clear: both;
}
.messenger-toolbar-tools {
  float: right;
}
</style>