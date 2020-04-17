<template>
    <div id="quizHome">
        <div class="container">



            <div class="content">
                <!--サイドメニュ-->
                <div class="side">
                    <div class="product_day">
                        <p class="border">制作</p>
                        <p class="year">2020年</p>
                    </div>
                    <img class="okinawa_icon" src="./../../../images/haib.png">
                    <br/>
                    <p class="quiz_title">Okinawa</p>

                    <div class="quiz_menu">
                        <ul>
                            <li class="quiz_nav">
                                <span><a href="#item-center">クイズへ</a></span>
                            </li>
                            <li class="quiz_nav">
                                <span><a href="#item_site">サイトの説明</a></span>
                            </li>
                            <li class="quiz_nav">
                                <span><a href="#item_info">お知らせ</a></span>
                            </li>
                        </ul>
                    </div>
                    <div class="fotter_sns">
                        <i class="fas fa-share-alt"></i>
                        <a href="https://www.facebook.com/sharer.php?src=http://ok-okinawa-quiz.herokuapp.com/&t=沖縄クイズ" title="Facebookでシェア" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=600');return false;">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=http://ok-okinawa-quiz.herokuapp.com/&text=沖縄クイズ" target="blank_">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>


                <!--メイン画面-->
                <div class="main">
                    <!--メイン画像-->
                    <div class="slider-outer">
                        <div class="main_text">
                            <ul>
                                <li class="pc">沖縄を世界へ</li>
                                <li class="tel">脳のシワがふえる旅とは、面白い</li>
                            </ul>
                        </div>
                        <transition name="fade">
                        <div class="slider-inner" :key="idx" v-for="(slide, idx) in slides" v-if="current_slide == idx">
                            <img class="slide-img" v-bind:src="slides[idx].img" :key="slides[idx].img">
                        </div>
                        </transition>
                    </div>

                    <!--クイズスタート画面-->
                    <div id="item-center"></div>
                    <div class="item-center">
                        <ul>
                            <li>
                                <span>あなたがまだ見ぬ<br>沖縄をクイズで<br>体感せよ</span>
                                <div class="quiz_start">
                                    <Router-Link class="arrow_btn" to="quiz">
                                        スタート<storong><i class="fas fa-arrow-circle-right fa-fw"></i></storong>
                                    </Router-Link>
                                </div>
                            </li>
                            <li>
                                <img src="./../../../images/sisa1.png">
                            </li>
                        </ul>
                    </div>

                    <!--サイトの説明-->
                    <div id="item_site"></div>
                    <div class="item_bottom">
                        <h1 class="title-border">サイトの説明</h1>
                        <div>
                            <p>
                                初めましてこのサイトを制作したものです。
                                当サイトはクイズ形式で沖縄の魅力を伝えていくために制作しました。
                                現在、新型の感染病の影響で数々の行動が制限されているかと思います。
                                私にはどうすることもできません。なので、この感染病を乗り越えたら、
                                沖縄に足を運びたくなるようなサイトを作りたいと思い作らさせていただきました。
                                皆様にお使いいただけると嬉しいです。
                            </p>
                        </div>
                    </div>
                    <!--お知らせ-->
                    <div id="item_info"></div>
                    <div class="item_bottom">
                        <h1 class="title-border">お知らせ</h1>
                        <div>
                            <p class="info">1. 現在カテゴリー別でクイズ出題できるように製作中です.</p>
                            <p class="info">2. 何か問題の誤りまたは、不具合等ありましたらお知らせください.</p>
                            <p class="info">3. 現在クイズ制作中ですので、何かある方は教えてくれると助かります.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<style scoped>
    .content {
        display: flex;
        font-family: 'Lustria','Ryumin Light KL',serif;
    }

    .main {
        /*flex: 1 0 auto;*/
        /*display: flex;*/
        /*align-items: center;*/
        /*justify-content: center;*/
        height: auto;
        background: #fff;
    }
    /* サイドメニュー */
    .side {
        align-items: center;
        justify-content: center;
        text-align: center;
        position: -webkit-sticky;
        position: sticky;
        top: 0px;
        width: 35vw;
        height: 100vh;
        color: #999;
        background: #fff;
    }
    /* ヘッダーの制作日 */
    .side .product_day {
        opacity: 0.5;
        margin: 5px auto;
        margin-top: 10%;
        margin-bottom: 15%;
    }
    .side .product_day .year {
        margin-top: 10px;
    }
    .side .border {
        width: 10%;
        border-bottom: 1px solid #999;
        margin: 1px auto;
    }
    .side .okinawa_icon {
        width: 40%;
        height: 20%;
    }
    .side .quiz_title {
        font-family: 'Lustria','Ryumin Light KL',serif;
        font-size: 300%;
        margin: 10px;
        color: #000;
    }

    .side .quiz_menu {
        text-align: left;
        -ms-writing-mode: tb-rl;
        writing-mode: vertical-rl;
        margin: auto;
        margin-top: 0px;
    }
    /* サイドヘッダーのメニュー */
    .side .quiz_nav {
        list-style: none;
        margin: auto 50%;
        width: 20%;
        cursor: pointer;
    }
    .side .quiz_nav a {
        color: #999;
        text-decoration: none;
    }
    .fotter_sns i {
        margin: 8% 5%;
        margin-top: 25%;
        color: #999;
        font-size: 1.3rem;
        transition: 1.5s;
    }
    .fotter_sns .fa-facebook-f:hover {
        -webkit-transform: rotateX(360deg);
        transform: rotateX(360deg);
        color: #4966a0;
    }
    .fotter_sns .fa-twitter:hover {
        -webkit-transform: rotateX(360deg);
        transform: rotateX(360deg);
        color: #1da1f3;
    }

    /* main画像スライド */
    .slider-outer {
        position: relative;
        width: 65vw;
        height: 100vh;
        overflow: hidden;
        background-color: #000;
        /*margin: auto;*/

    }
    .slider-inner {
        position: absolute;
        top: 0;
        width: 65vw;
        height: 100vh;
    }
    .slider-outer .main_text {
        -ms-writing-mode: tb-rl;
        writing-mode: vertical-rl;
        align-items: center;
        justify-content: center;
    }
    .slider-outer ul li {
        position: absolute;
        margin: auto;
        top: 30%;
        left: 50%;
        color: #fff;
        z-index: 10;
        list-style: none;
        font-size: 300%;
    }
    .slide-img {
        top: 0;
        width: 75vw;
        height: 810px;
        object-fit: cover;
        opacity: 0.9;
        z-index: 1;
    }
    .fade-enter-active, .fade-leave-active {
        transition: all 3s ease;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }

    /* クイズスタート画面 */
    .item-center ul {
        align-items: center;
        justify-content: center;
    }
    .item-center ul li {
        margin-top: 5%;
        margin-bottom: 10%;
        display: inline-block;
        vertical-align: middle;
        width: 25vw;
    }
    .item-center ul li:nth-child(1) {
        margin-left: 40px;
    }
    .item-center ul li:nth-child(2) {
        /*text-align: right;*/
        width: 30vw;
        margin-left: 40px;
    }
    .item-center ul li span {
        font-size: 2rem;
        font-weight: lighter;
    }
    .item-center ul li img {
        opacity: 0.9;
        width: 30vw;
        height: 60vh;
    }

    .arrow_btn {
        display: inline-block;
        position: relative;
        margin-top: 10%;
        width: 200px;
        padding: 0.8em;
        text-align: center;
        text-decoration: none;
        color: #1B1B1B;
        background: #fff;
        border-radius: 30px;
        font-size: 1em;
        border:1px solid #1B1B1B;
        transition: transform ease .3s;
    }
    .arrow_btn:hover {
        cursor: pointer;
        text-decoration: none;
    }
    .arrow_btn storong {
        display: inline-block;
        text-decoration: none;
        transition: transform ease .3s;
    }
    .arrow_btn:hover storong {
        cursor: pointer;
        text-decoration: none;
        transform: translateX(6px);
    }

    /*  サイト説明画面  */
    .item_bottom {
        color: #999;
        margin: auto;
        text-align: center;
        height: 50vh;
        width: 65vw;
    }
    .item_bottom div {
        margin-top: 10%;
    }
    .item_bottom p {
        width: 70%;
        margin: auto;
        line-height: 2rem;
    }
    .title-border {
        color: #444;
        display: flex;
        align-items: center;
    }
    .title-border:before,
    .title-border:after {
        content: "";
        flex-grow: 1;
        height: 1px;
        display: block;
    }
    .title-border:before {
        margin-right: 0.3em;
        background: linear-gradient(-90deg, #888, transparent);
    }
    .title-border:after {
        margin-left: 0.4em;
        background: linear-gradient(90deg, #888, transparent);
    }
    .item_bottom .info {
        align-items: center;
        text-align: left;
    }
    .tel {
        display: none;
    }

    @media screen and (max-width: 1024px) {
        .side {
            display: none;
        }
        .item_bottom,
        .slide-img,
        .slider-inner,
        .slider-outer
        {
            width: 100vw;
            height: 100vh;
        }
        .item_bottom {
            height: 25vh;
        }
        .item-center ul li {
            width: 40%;
        }
        .pc {
            display: none;
        }
        .tel {
            display: block;
        }
    }

    @media screen and (max-width: 768px) {
        .item_bottom {
            height: 25%;
        }
        .item_bottom
        {
            height: 50vh;
        }
    }

    @media screen and (max-width: 375px) {
        .item-center ul {
            padding-left: 0px;
        }
        .item-center ul li {
            margin-top: 10%;
            display: block;
            text-align: center;
            width: 100%;
        }
        .item-center ul li:nth-child(1) {
            margin-left: 0px;
            margin-right: 0px;
        }
        .item-center ul li span {
            font-size: 2rem;
        }
        .item-center ul li:nth-child(2) {
            display: none;
        }
        .item_bottom {
            height: 30%;
        }
    }
</style>


<script>
    export default {
        data: function() {
            return {
                current_slide: 0,
                slides: [
                    {img: './../../../images/okinawa1.jpg'},
                    {img: './../../../images/okinawa2.jpg'},
                    {img: './../../../images/okinawa3.jpg'},
                    {img: './../../../images/okinawa4.jpg'},
                    {img: './../../../images/okinawa5.jpg'},

                    {img: './../../../images/okinawa7.jpg'},
                    {img: './../../../images/okinawa8.jpg'},
                    {img: './../../../images/okinawa9.jpg'},
                    {img: './../../../images/okinawa10.jpg'},
                    {img: './../../../images/okinawa11.jpg'},

                    {img: './../../../images/okinawa13.jpg'}

                ]
            }
        },
        mounted() {
            setInterval(() => {
                this.current_slide = this.current_slide < this.slides.length -1 ? this.current_slide +1 : 0
            }, 4000)
        },
    }
</script>
