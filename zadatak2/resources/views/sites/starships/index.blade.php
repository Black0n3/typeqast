@extends('layouts.app')

@section('content')
<div id="app">
    <h2>
        Search for starships
        <div class="float-right">
            <input type="text" class="form-control" placeholder="search ..." v-model="search">
        </div>
    </h2>
    <div class="card">
        <div class="card-body">
            Zbog toga što swapi šalje samo 10 rezultata po stranici, a ne sve rezultate u jednom zahtjevu nisam u mogućnosti filtirati rezultate po datumu ili nekom drugom upitu.
            Mogao bi napraviti petlju da ukoliko next_link nije null da dohvati rezultate sa slijedeće stranice pa ih spremiti sve u poseban niz "starship" pa onda manipulirati s njima ali
            mislim da nema smisla jer bi bilo za jedan upit previše upita na api ovisno o broju pageva. <br> Zato sam kreirao običnu tražilicu no ukoliko je potreba mogu kreirati kod kao što sam bio i naveo.
            
        </div>
    </div>
    <table id="table" class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Model</th>
                <th>Crew</th>
                <th>Passengers</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in info.data.results">
                <th>@{{ item.name }}</th>
                <td>@{{ item.model }}</td>
                <td>@{{ item.crew }}</td>
                <td>@{{ item.passengers }}</td>
            </tr>
        </tbody>
    </table>
    <div class="text-center">@{{ status }}</div>
</div>
@endsection


@section('js')

<script>
new Vue({
        el: '#app',
        data() {
            return {
                search: '',
                status: 'Start typing to show you the starship...',
                info: {
                    count: 0,
                    next: null,
                    previous: null,
                    data: {
                        results: []
                    }
                }
            }
        },
        watch: {
            search(value) {
                
                this.doSearch(value);
            }
        },
        methods: {
            doSearch(value) {
                this.status = 'Searching ...';
                axios
                    .get('{{ route("api.starship.search") }}?search=' + this.search)
                    .then(response => (this.info = response))
                if(this.info.count==0){
                   this.status = 'No results';
                }
                this.status = '';
            }
        }
    })
    Vue.config.devtools = true
</script>
@endsection
