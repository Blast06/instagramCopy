<template>
    <div>
        <button class="btn btn-primary ml-4" @click="followUser()" v-text="buttonText"></button>
    </div>
</template>

<script>

    import axios from 'axios';
    export default {
        props: ['userId','follows'],
        mounted() {
            console.log('Component mounted.')
        },
        data: function () {
          return {
              status: this.follows,
          }
        },
        methods: {
            followUser(){
                console.log(this.userId);
                axios.post('/follow/' + this.userId)
                    .then( response =>{
                        console.log("estado: ", this.status);
                        this.status = ! this.status;
                        console.log(response.data);
                    })
                    .catch(error =>{
                        if (error.response.status == 401){
                            window.location('/login');
                        }
                    });
            }
        },
        computed: {
            buttonText(){
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }
    }

</script>
