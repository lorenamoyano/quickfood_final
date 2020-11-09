<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <form>
              <div class="input-group mb-3">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Search"
                  v-model="seatch_input"
                  aria-describedby="basic-addon2"
                />
                <div class="input-group-append">
                  <button type="submit" class="input-group-text" id="basic-addon2">Search</button>
                </div>
              </div>
            </form>
            <div :style="resultDiv">
              <ul>
                <li v-for="search_result in search_results" :key="search_result.id">
                  <a href>{{search_result.title}}</a>
                </li>
              </ul>
              <span v-if="!search_results.length" style="color:red;font-size:18px">Result not found!</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  <div class="row pt-3">
    <div v-for="post in posts" :key="post.id">
    <div class="col-md-4">
      <img :src="post.image" class="img-fluid" alt="post image">
    </div>
    <div class="col-md-8">
      <h2>{{post.nombre}}</h2>
      <p>{{post.precio}}</p>
    </div>
    </div>
  </div>
    <infinite-loading @infinite="infiniteHandler"></infinite-loading>
  </div>
</template>

<script>
export default {
  data() {
    return {
      seatch_input: "",
      search_results: "",
      resultDiv: {
        display: "none"
      },
      posts:[],
      page:1,
    };
  },
  methods: {
    getdata(val) {
        var app=this;
      axios
        .get("/search/"+val)
        .then(function(response) {
          app.search_results=response.data;
        });
    },
    infiniteHandler($state){
      axios.get('/getposts/?page='+this.page).
      then(responce => {
        if (responce.data.data.length) {
          this.page += 1;
          this.posts.push(...responce.data.data);
          $state.loaded();
        } else {
          $state.complete();
        }
      });
    }
  },
  watch: {
    seatch_input: function(val) {
        this.getdata(val);
        if(!this.seatch_input){
            this.resultDiv.display="none";
        }else{
           this.resultDiv.display="block"; 
        }
    }
  }
};
</script>