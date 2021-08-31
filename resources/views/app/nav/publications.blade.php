<li class="sidenav-item has-subnav open active">
    <a href="#" >
        <span class="sidenav-icon icon icon-works">g</span>
        <span class="sidenav-label">Publicar</span>
    </a>
    <ul class="sidenav level-2 collapse">
        <li :class="{active:$store.state.app.selected}" @click="$store.state.app.selected = true"><a href= {{ route('publication.create') }} >Crear publicación nueva</a></li>
        <li :class="{active:$store.state.app.selected}" @click="$store.state.app.selected = true"><a href= {{ route('publication.create') }} >Crear  nueva</a></li>
        <li :class="{active:$store.state.app.selected}" @click="$store.state.app.selected = true"><a href= {{ route('publication.create') }} > nueva</a></li>
    </ul>
</li>