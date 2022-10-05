<template>
    
    <button class="btn btn-secondary mt-2 mb-2 mr-2"  type="button" aria-haspopup="true" aria-expanded="false" >-</button>  
                    <div class="d-flex mt-3 mr-1">
                        <div class="text-xl font-bold mb-4" v-text="epWText"></div>
                        <p>/</p>
                        <div class="text-xl font-bold mb-4" v-text="epText"></div>
                    </div>
                <button class="btn btn-secondary mt-2 mb-2 mr-2"  type="button" aria-haspopup="true" aria-expanded="false" >+</button>  
                <button class="btn btn-secondary dropdown-toggle mt-2 mb-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-text="lstatusText" >
                </button><span class="caret"></span>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" >Watching</a></li>
                  <li><a class="dropdown-item" >Completed</a></li>
                  <li><a class="dropdown-item"  >Drop</a></li>
                  <li><a class="dropdown-item"  href="/user/urlist/{{ $movie->id }}/plan">Plan to watch</a></li>
                
                </div>
            
</template>

<script>
    export default {
        props: ['movieId', 'episodes', 'lstatus', 'ewatch'],

        mounted() {
            console.log('list button Component mounted.')
        },

        data: function () {
          return {
            episodesWatched: this.ewatch
          }
        },

        methods: {

        },

        computed: {

            epText() {
            return this.episodes;
          },

          lstatusText() {
            return this.lstatus;
          },

          epWText() {
            return this.episodesWatched;
          },
        }
    }
</script>
