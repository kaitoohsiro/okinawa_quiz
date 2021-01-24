<template>
  <div id="quiz">
    <div class="heighta"></div>
    <!--問題-->
    <div class="quiz_card">
      <div class="question_title_card">
        <div class="question_title">
          <div class="box14" v-if="!endMsg">
            <p>
              <span>QUESTION {{ questionCount }}. {{ quiz[questionCount - 1].question }}</span>
            </p>
          </div>
        </div>
      </div>
      <!--選択肢-->

      <div v-if="showQuestion">
          <p><img v-if="image" class="img" :src="quiz[questionCount - 1].image_name"></p>
        <ul class="choice_card">
          <li class="choice" v-for="choice in choices" @click="checkAnswer(choice)">{{ choice }}</li>
        </ul>
      </div>
    </div>
    <!--解説-->
    <div class="explain" v-if="showExplain">
      <span v-if="matchAnswer">
        <i class="far fa-circle"></i>
        <span class="result correct">正解！</span>
      </span>
      <span v-else>
        <i class="fas fa-times"></i>
        <span class="result bad">不正解</span>
      </span>
      <br />
      <p class="explain_main">
        <span class="explain_title">解説</span>
        : {{ quiz[questionCount - 1].explain_sentence }}
      </p>
      <div class="next btn" @click="next">
        <span>次へ</span>
      </div>
    </div>
    <!--クイズ終了-->
    <div v-if="endMsg">
      <div class="end_card">
        <p>結果</p>
        <p>{{ totalAnswer }} 問正解</p>
        <ul>
          <li class="btn end" @click="top">
            <a href="#">TOPへ</a>
          </li>
          <br />
          <li class="btn end" @click="tweet">
            <a href="#">
              <i class="fab fa-twitter"></i>ツイート
            </a>
          </li>
          <br />
          <li class="btn end" @click="retry">
            <a href="#">リトライ</a>
          </li>
        </ul>
        <!--                <p>Twitterで共有</p>-->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      quiz: null,
      totalAnswer: 0,
      totalCount: 0,
      questionCount: 1,
      choices: [],
        image: false,
      showQuestion: true,
      showExplain: false,
      matchAnswer: false,
      endMsg: false
    };
  },
  created() {
    this.getQuiz();
  },
  methods: {
    getQuiz: function() {
      let categoryId = {
        id: this.$route.params.value
      };
      axios.post("/api/quiz", categoryId).then(response => {
        this.quiz = response.data;
        this.totalCount = this.quiz.length;
          this.imageDisplay(this.questionCount - 1);
        this.showAnswer(this.questionCount - 1);
      });
    },
      imageDisplay: function(index) {
        if (this.quiz[index].image_name) {
            this.image = true;
        } else {
            this.image = false;
        }
      },
    showAnswer: function(index) {
      this.choices.push(
        this.quiz[index].correct,
        this.quiz[index].choice1,
        this.quiz[index].choice2
      );
    },
    checkAnswer: function(choice) {
      this.showQuestion = false;
      this.showExplain = true;
      let answer = this.quiz[this.questionCount - 1].correct;
      if (answer === choice) {
        this.totalAnswer++;
        this.matchAnswer = true;
      } else {
        this.matchAnswer = false;
      }
    },
    next: function() {
      if (this.questionCount < this.totalCount) {
        this.showQuestion = true;
        this.showExplain = false;
        this.questionCount++;
        this.choices = [];
        this.choices.push(
          this.quiz[this.questionCount - 1].correct,
          this.quiz[this.questionCount - 1].choice1,
          this.quiz[this.questionCount - 1].choice2
        );
        for (var i = this.choices.length - 1; i > 0; i--) {
          var r = Math.floor(Math.random() * (i + 1));
          var tmp = this.choices[i];
          this.choices[i] = this.choices[r];
          this.choices[r] = tmp;
        }
          if (this.quiz[this.questionCount - 1].image_name) {
              this.image = true;
          } else {
              this.image = false;
          }
      } else {
        this.showQuestion = false;
        this.showExplain = false;
        this.matchanswer = false;
        this.endMsg = true;
      }
    },
      top: function() {
          window.location.href = "/";
      },
      retry: function() {
          window.location.href = "/category";
      },
    tweet: function() {
      if (this.totalAnswer > 0) {
        open(
          "https://twitter.com/intent/tweet?text=" +
            this.totalAnswer +
            "%E5%95%8F%E6%AD%A3%E8%A7%A3%E3%81%97%E3%81%BE%E3%81%97%E3%81%9F%EF%BC%81%0A%0A&url=https%3A%2F%2Fok-okinawa-quiz.herokuapp.com++%23%E6%B2%96%E7%B8%84+%23%E6%B2%96%E7%B8%84%E3%82%AF%E3%82%A4%E3%82%BA+%23%E3%81%AA%E3%82%93%E3%81%8F%E3%82%8B%E3%81%AA%E3%81%84%E3%81%95%E3%83%BC",
          "_blank"
        );
      } else {
        open(
          "https://twitter.com/intent/tweet?text=" +
            "%E3%81%82%E3%81%AA%E3%81%9F%E3%81%AF%E4%BD%95%E5%95%8F%E8%A7%A3%E3%81%91%E3%82%8B%3F%0D%0A&url=https%3A%2F%2Fok-okinawa-quiz.herokuapp.com++%23%E6%B2%96%E7%B8%84+%23%E6%B2%96%E7%B8%84%E3%82%AF%E3%82%A4%E3%82%BA+%23%E3%81%AA%E3%82%93%E3%81%8F%E3%82%8B%E3%81%AA%E3%81%84%E3%81%95%E3%83%BC",
          "_blank"
        );
      }
    },

  }
};
</script>


<style scoped>
#quiz {
  text-align: center;
  height: 100vh;
}
.heighta {
  height: 10vh;
}
.quiz_card {
  text-align: center;
  margin: auto 20%;
}
.choice_card {
  padding-left: 0;
}
.img {
    width: 70%;
    height: 50%;
}
.choice_card .choice {
  list-style: none;
  padding: 0.8em 0.5em;
  cursor: pointer;
  background-color: #eaeaea;
  width: 100%;
  margin: 30px auto;
  border-radius: 8px;
  transition: transform ease 0.6s;
}
.choice_card .choice:active {
  transform: translateY(5px);
}
/* 文字サイズ */
.result,
.fa-circle,
.fa-times {
  font-size: 2.2rem;
}
/* いろ */
.fa-circle,
.correct {
  color: red;
}
.fa-times,
.bad {
  color: blue;
}
/* 太さ */
.result {
  font-weight: bold;
}
.end_card a {
  text-decoration: none;
  color: #000;
  font-weight: bold;
}
.box14 {
  padding: 1.5em 0.5em;
  margin: 2em 0;
  color: #565656;
  background: #ffeaea;
  box-shadow: 0px 0px 0px 10px #ffeaea;
  border: dashed 2px #ffc3c3;
  border-radius: 8px;
}
.box14 p {
  font-size: 1.3rem;
  margin: 0;
  padding: 0;
}
.explain {
  border: 3px solid #999;
  margin: auto 20%;
  padding: 0.8em 0.5em;
  border-radius: 8px;
}
.explain p {
  font-size: 1.3rem;
}
.explain_main {
  text-align: left;
}
.explain_title {
  font-weight: bold;
  font-size: 1.3rem;
}
.btn {
  margin: 0.8em 3em;
  border: 1px solid #fff;
  background-color: rgba(250, 207, 76, 0.97);
  box-shadow: 0 4px rgba(189, 156, 57, 0.97);
  border-radius: 100px;
  transition: transform ease 0.4s;
  height: 50px;
  cursor: pointer;
}
.btn:active {
  transform: translateY(4px);
}
.btn span {
  padding: auto;
  color: #fff;
  font-size: 1.5rem;
}
.end_card {
  border: 3px solid #999;
  margin: auto 20%;
  padding: 0.8em 0.5em;
  border-radius: 8px;
}
.end_card p {
  font-size: 2rem;
}
.end_card ul {
  padding-left: 0;
}
.end {
  list-style: none;
}
.btn a {
  padding: auto;
  color: #fff;
  font-size: 1.5rem;
}

@media screen and (max-width: 414px) {
  .explain {
    margin: auto 0;
  }
  .quiz_card {
    margin: auto 10px;
  }
  .choice_card .choice {
    width: 95%;
  }
  .end {
    margin: auto 0;
  }
}
</style>
