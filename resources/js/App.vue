<template>
    <div id="app">
            <header>
                <Navbar />
            </header>
        <main>
            <div class="container">
                <RouterView />
            </div>
        </main>
    </div>
</template>

<script>
import Navbar from './components/Navbar.vue'
export default {
    components: {
        Navbar
    }
}
</script>

<style>
    body {
        margin-top: 0px;
    }
    #app {
        margin: auto -8px;
        height: 90vh;
        width: 100vw;
    }
</style>
