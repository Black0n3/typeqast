@extends('layouts.app')

@section('content')
<div id="app">
    <h2>
        Search for your favorite SW charachter
        <div class="float-right">
            <input type="text" class="form-control" placeholder="search ..." v-model="search">
        </div>
    </h2>
    <table id="table" class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Films</th>
                <th>Info</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in info.data.results">
                <td>@{{ item.name }}</td>
                <td>@{{ item.gender }}</td>
                <td>@{{ item.films }}</td>
                <td><a v-bind:href="item.url_films">Show all films</a></td>
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
                status: 'Start typing to show you the characters...',
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
                    .get('{{ route("api.characters.search") }}?search=' + this.search)
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
