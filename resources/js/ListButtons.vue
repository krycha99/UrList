<template>
    
    <button class="btn btn-secondary mt-2 mb-2 mr-2"  type="button" aria-haspopup="true" aria-expanded="false" @click="epDim" >-</button>  
                    <div class="d-flex mt-3 mr-1">
                        <div class="text-xl font-bold mb-4" v-text="epWText"></div>
                        <p>/</p>
                        <div class="text-xl font-bold mb-4" v-text="epText"></div>
                    </div>
                <button class="btn btn-secondary mt-2 mb-2 mr-2"  type="button" aria-haspopup="true" aria-expanded="false" @click="epAdd" >+</button>  
                <button class="btn btn-secondary dropdown-toggle mt-2 mb-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-text="lstatusText" >
                </button><span class="caret"></span>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" @click="watchBtn">Watching</a></li>
                  <li><a class="dropdown-item" @click="comBtn">Completed</a></li>
                  <li><a class="dropdown-item"  @click="dropM">Drop</a></li>
                  <li><a class="dropdown-item"  @click="PlanBtn">Plan to watch</a></li>
                
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
            dropM(){
              axios.post('/list/' + this.movieId + '/drop').then(response => {
                    console.log(response.data);
                    window.location.reload();
                  })
                
                
          },
          watchBtn(){
            axios.post('/list/' + this.movieId + '/watching').then(response => {
                    console.log(response.data);
                    window.location.reload();
                  });
          },

          comBtn(){
            axios.post('/list/' + this.movieId + '/completed').then(response => {
                    console.log(response.data);
                    window.location.reload();
                  });
          },

          PlanBtn(){
            axios.post('/list/' + this.movieId + '/plan').then(response => {
                    console.log(response.data);
                    window.location.reload();
                  });
          },
          epAdd(){
            if(parseInt(this.episodesWatched) < parseInt(this.episodes))
            {
              
              axios.post('/list/' + this.movieId + '/ep').then(response => {
                    console.log(response.data);
                    window.location.reload();
                  });
            }else {
                comBtn();
              console.log(this.episodesWatched + ' ' + this.episodes);
              console.log('tutaj schowac przycisk');
            }
          
          },

          epDim(){
            if((parseInt(this.episodesWatched) > 0) && (parseInt(this.episodesWatched) <= parseInt(this.episodes)))
            {
              
              axios.post('/list/' + this.movieId + '/epDim').then(response => {
                    console.log(response.data);
                    window.location.reload();
                  });
            }else {
              console.log(this.episodesWatched + ' ' + this.episodes);
              console.log('tutaj schowac przycisk');
            }
          
          }

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
