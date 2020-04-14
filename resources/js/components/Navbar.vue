<template>
    <div id="spheader">
        <div class="header_title">
            <ul>
                <li>
                    <RouterLink class="nav" to="/">
                        <span class="menu" id="title_menu"><i class="fas fa-bezier-curve"></i>  Okinawa Quiz</span>
                    </RouterLink>
                </li>
            </ul>
        </div>
        <!-- ハンバーガーメニュー -->
        <div id="barger">
            <header class="barger">
                <div class="barger__menu">
                    <div class="barger__menu__line" @click="naviOpen" :class="{'is-active': active}">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </header>
            <transition name="navi">
                <nav class="navi" v-show="navi">
                    <ul class="navi__wrap">
                        <li>
                            <RouterLink to="/">
                                <span @click="naviOpen1">Home</span>
                            </RouterLink>
                        </li>
                        <li>
                            <a href="/quiz">
                                <span @click="naviOpen1">Quiz</span>
                            </a>
                        </li>
                        <li>
                            <RouterLink to="/admin">
                                <span @click="naviOpen1">{{ username }}</span>
                            </RouterLink>
                        </li>
                        <li>
                            <div v-if="isLogin" class="navbar__item">
                                <RouterLink to="/admin">
                                    <span @click="naviOpen1">admin</span>
                                </RouterLink>
                            </div>
                        </li>
                    </ul>
                </nav>
            </transition>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            active: false,
            navi: false,
        }
    },
    computed: {
        isLogin () {
            return this.$store.getters['auth/check']
        },
        username () {
            return this.$store.getters['auth/username']
        }
    },
    methods: {
        // ハンバーガーバーアクション
        naviOpen: function() {
            this.active = !this.active;
            this.navi = !this.navi;
        },
        // ハンバーガーないメニューアクション
        naviOpen1: function() {
            this.active = !this.active;
            this.navi = !this.navi;
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            })
        },
        scrollTop: function(){
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }
    }
}
</script>



<style scoped>
    .header_title {
        display: none;
    }
    /* ハンバーガーメニュー */
    .barger {
        width: 100%;
        background: #fff;
    }
    .barger__menu {
        width: 60px;
        height: 60px;
        position: fixed;
        z-index: 200;
        top: 15px;
        right: 0;
    }
    .barger__menu__line {
        width: 36px;
        height: 30px;
        margin-top: 15px;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        cursor: pointer;
    }
    .barger__menu__line span {
        width: 100%;
        height: 2px;
        background: #000;
        display: block;
        transition: .6s;
        position: absolute;
    }
    .barger__menu__line span:first-child {
        top: 0;
    }
    .barger__menu__line span:nth-child(2) {
        top: 14px;
    }
    .barger__menu__line span:last-child {
        bottom: 0;
    }
    .barger__menu__line.is-active span {
        transition: .6s;
    }
    .barger__menu__line.is-active span:first-child {
        transform: rotate(45deg);
        top: 50%;
    }
    .barger__menu__line.is-active span:nth-child(2) {
        opacity: 0;
    }
    .barger__menu__line.is-active span:last-child {
        transform: rotate(-45deg);
        top: 50%;
    }
    .navi {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #000;
        position: fixed;
        z-index: 100;

    }
    .navi__wrap {
        list-style-type: none;
        text-align: center;
        padding-left: 0;
        background: #fff;
        padding: 60px;
        width: 100%;
        height: 100%;
    }
    .navi__wrap li a {
        font-size: 30px;
        text-decoration: none;
        color: #000;
        display: block;
        padding: 10px 100px;
    }
    .navi__wrap li a:nth-child(1) {
        margin-top: 10%;
    }
    .navi-enter, .navi-leave-to {
        opacity: 0;
    }
    .navi-enter-to, .navi-leave {
        opacity: 1;
    }
    .navi-enter-active, .navi-leave-active {
        transition: .6s;
    }

    @media screen and (max-width: 1024px) {
        .navi__wrap li a {
            height: 200px;
        }
        .header_title {
            display: block;
            height: 10%;
            width: 100%;
            position: fixed;
            z-index: 10;
            background-color: #fff;
        }
        .menu {
            virtical-align: middle;
            height: 20px;
            font-size: 1.5rem;
        }
        .header_title li {
           list-style: none;
            height: 20px;
        }
        .header_title li a {
            text-decoration: none;
            color: rgb(251, 26, 21);
        }
    }
</style>
