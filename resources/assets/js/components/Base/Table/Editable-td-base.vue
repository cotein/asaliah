<template>
    <span>
        <span @click="editable(true)" v-if="!isEditable">
            <a>{{value}}</a>
        </span>
        <span v-if="isEditable" class="td-flex">
            <input type="text" 
                v-model="new_value" 
                @focus="$event.target.select()"
            >
            <button type="button" 
                class="btn btn-primary btn-xs" 
                :class="{'spinner spinner-inverse spinner-sm' : spinner}"
                @click="update_value()"
            >
            OK</button>
            <button type="button" 
                class="btn btn-danger btn-xs"
                @click="cancel"
            >
            NO</button>
        </span> 
    </span>
</template>