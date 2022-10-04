<template>
    <div >
      <div v-if="addBtnvalue"><button id="addBtn" @click="listM" v-text="buttonText" ></button></div>
        <div id="dropd" class="dropdown" v-if="dropvalue">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-text="dropText">
                </button><span class="caret"></span>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" @click="watchBtn">Watching</a></li>
                  <li><a class="dropdown-item" @click="comBtn">Completed</a></li>
                  <li><a class="dropdown-item"  @click="dropM">Drop</a></li>
                  <li><a class="dropdown-item" @click="PlanBtn">Plan to watch</a></li>
                </div>
                
              </div>
              <div class="d-flex mt-2 " v-if="epvalue" >
                <button class="btn btn-secondary mt-2 mb-2 mr-2" v-if="dimvalue" type="button" @click="epDim" aria-haspopup="true" aria-expanded="false" value="test" >-</button>  
              <div class="d-flex mt-3 ">
                <label for="cos2" v-text="epWText"></label>
                <p>/</p>
                <label for="cos" v-text="epText"></label>
              </div>
              <button class="btn btn-secondary mt-2 mb-2 ml-2" v-if="addvalue" type="button" @click="epAdd" aria-haspopup="true" aria-expanded="false" value="test" >+</button>  
              </div>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
      props: ['movieId', 'liststatus', 'lstatus', 'episodes', 'ewatch'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function () {
          return {
            status: this.liststatus,
            episodesWatched: this.ewatch,
            dropvalue: false,
            addvalue: false,
            dimvalue: false,
            epvalue: false,
            addBtnvalue: true,
          }
        },

        methods: {

          listM(){
            if(this.status == false){
              axios.post('/list/' + this.movieId ).then(response => {
                this.status = true;
                console.log(this.status);
                    console.log(response.data);
                   
                    //window.location.reload();
                  })
                  //window.location.reload();
                  //this.dropvalue = false;
              addBtn.style.display  = 'none';
                } 
                
                
          },
          dropM(){
            if(this.status == true){
              axios.post('/list/' + this.movieId + '/drop').then(response => {
                this.status = false;
                console.log(this.status);
                    console.log(response.data);
                    window.location.reload();
                  })
              //dropd.style.display = 'none';
              //addBtn.style.display  = 'initial';
                } 

                // else {
                //   axios.post('/list/' + this.movieId + '/drop').then(response => {
                //     this.status = ! this.status;
                //     console.log(response.data);
                //     console.log(this.status);
                //   })
                //   //dropd.style.display = 'initial';
                //   //addBtn.style.display = 'none';
                // }
                
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
          buttonText() {
            if(this.status == true){
              this.addBtnvalue = false;
              this.dropvalue = true;
              return 'Remove';
            }else {
              this.addBtnvalue = true;
             // this.dropvalue = false;
              return 'Add to list';
            }
            
          },

          dropText() {
            if(this.status == true){
              
              console.log(this.lstatus);
                  if(this.lstatus == "Watching")
                  {
                    this.epvalue = true;
                    this.addvalue = true; this.dimvalue = true;
                    return "Watching";
                  }else if(this.lstatus == "Completed") 
                  {
                    return "Completed";
                  }else 
                  {
                    return "Plan to watch";
                  }
                  
            }else 
            {
              this.dropvalue = false;
            }
           
          },

          epText() {
            console.log("odcinki:");
            console.log(this.episodes);
            return this.episodes;
          },
          epWText() {
            if(parseInt(this.episodesWatched) < parseInt(this.episodes))
            { this.addvalue = true; this.dimvalue = true; } else { this.addvalue = false; axios.post('/list/' + this.movieId + '/completed').then(response => {
                    console.log(response.data);
                  });}
            
            console.log("odcinki ogladniete:");
            console.log(this.episodesWatched);
            return this.episodesWatched;
          }
        }
    }
</script>
