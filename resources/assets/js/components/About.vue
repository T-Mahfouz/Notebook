<template>
    <div class="container">
        <section class="section">
        <div class="container">
            <h1 class="title">Section</h1>
            <h2 class="subtitle">
                A simple container to divide your page into <strong>sections</strong>, like the one you're currently reading
            </h2>
        </div>
    </section>
    </div>
</template>

<script>
export default {
    data(){
        return {
            instruction:'Ex: lat: -33.890542, lng: 151.274856',
        }
    },
    methods:{
        greeting(){
            return alert('hi');
        },
    },
    created(){
        console.log("e");
    },
    mounted() {
        console.log('Component asd.')
    },

}
</script>


<style scoped>
p{
    color: green;
    font-size: 24px;
    font-weight: bold;
}
    
</style>